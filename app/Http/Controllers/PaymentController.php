<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;


use PayPal\Api\Item;
use PayPal\Api\Plan;
use App\Models\Order;
use PayPal\Api\Patch;
use PayPal\Api\Payer;

use PayPal\Api\Amount;

// Used to process plans
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\Currency;
use PayPal\Api\ItemList;
use PayPal\Api\ChargeModel;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\PatchRequest;
use PayPal\Api\RedirectUrls;
use PayPal\Common\PayPalModel;
use PayPal\Api\PaymentExecution;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\MerchantPreferences;
use Illuminate\Support\Facades\Auth;
use PayPal\Auth\OAuthTokenCredential;

class PaymentController extends Controller
{
    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;
    private $order;
    private $bill;
    
    // Create a new instance with our paypal credentials
    public function __construct()
    {
        // Detect if we are running in live mode or sandbox
        if(config('paypal.settings.mode') == 'live'){
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
        }
        
        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(array(config('paypal.settings')));
    }

    public function index(){
        return view('paypal');
    }


    public function payWithPaypal(Request $request){

        $user = Auth::user();


        //return array_sum( array($a));

        if(count($user->orders) == '0'){
           return redirect()->route('user.home')->with('orderMess','ليس لديك طلبات حاليا  
            ');
        }


        foreach($user->orders as $ord){
            if($ord->bill != '0'){
                $this->order = $ord;
        }
    }

        if(!$this->order){
            return redirect()->route('user.home')->with('messageOrder','ليس لديك دفع حاليا !!');
        }


        $name = $user->name;

        $this->bill = $this->order->bill;

        //set payer 

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        //item
        $item = new Item();
        $item->setName($this->order->name)
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setDescription("this is items description")
        ->setSku("123123") // Similar to `item_number` in Classic API
        ->setPrice($this->bill);

        $itemList = new ItemList();

        $itemList->setItems([$item]);

        //Amount 

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($this->bill);

        
        //Transaction

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Buying something from your site");

        
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl('http://127.0.0.1:8000/status')
            ->setCancelUrl("http://127.0.0.1:8000");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));


    try{
        $payment->create($this->apiContext);

    }catch(Exception $ex){

        die($ex);
    }

        $paymentLink = $payment->getApprovalLink();

        return redirect( $paymentLink);


    }

    public function status(Request $request){

        $user = Auth::user();


        //return array_sum( array($a));

        if(count($user->orders) == '0'){
            return redirect()->route('user.home')->with('orderMess','ليس لديك طلبات حاليا  
            ');
        }


        foreach($user->orders as $ord){
            if($ord->bill != '0'){
                $this->order = $ord;
        }
    }

     $this->bill = $this->order->bill;

        if(empty($request->input('PayerID')) || empty($request->input('token'))){
            die('Payment Filed');
        }

        $paymentId = $request->get('paymentId');

        $payment = Payment::get($paymentId,$this->apiContext);
        
        $execution  = new PaymentExecution();

        $execution->setPayerId($request->input('PayerID'));

        $result = $payment->execute($execution,$this->apiContext);

        if($result->getState() == 'approved'){

            $user = Auth::user();


            $this->order->update([
                'payments' => $this->order->getOriginal('payments') +  $this->bill,
            ]);

            $this->order->update([
                'bill' => 0,
            ]);

            if($this->order->payments == $this->order->orderpriceOrder){
                $this->order->update([
                    'status' => 'مكتمل',
                ]); 
            }


            $a = $user->orders()->sum('payments');

            User::where('id',$user->id)->update([
                'allPaymentsOnSite' => $a,
            ]);

            return redirect()->route('user.home')->with('sacssesChechout','تمت عملية الدفع بنجاح نشكرك على ثقتك بنا');



        }else{
            echo 'payment Faild';
            die($result);
        }

    }


}
