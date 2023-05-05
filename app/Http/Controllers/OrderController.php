<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use App\Models\Order;
use App\Events\newOrder;
use App\Models\OraderUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\newOrderNotification;

class OrderController extends Controller 
{
 
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user = User::get();
        $order = Order::get();


        return view('admin.works.orders',[
            'users' => $user,
            'orders' => $order,

        ]);
    }

    public function create(){
        return view('user.orderCreate');
    }

    public function store(Request $request){


        $request->validate(
            [
                    'serviceType' => 'required|integer',
                    'description' => 'required|min:10',
                    'name' => 'required|string|max:255|min:3',
                    'facebook' => 'required_if:contact,1|url',
                    'email' => 'required_if:contact,2|email',
                    'whatsup' => 'required_if:contact,3|regex:/[0-9]/',
                    'telagram' => 'required_if:contact,4',
                    'price' => 'integer',
                    'contact' =>'required|int',
            ],
            [
                    'name.required' => 'هذا الحقل مطلوب',
                    'description.required' => 'هذا الحقل مطلوب',
                    'name.min' => 'هذا الاسم اقل من :min احرف',
                    'description.min' => 'هذا الوصف اقل من :min احرف',
                    'max:250' => 'الاسم طويل يجب ان لا يزيدعن :max حرف',
                    'int' => 'يجب ان تختار احدا الخيارات المتاحة',
                    'facebook.required_if' => 'رابط حساب الفيس بوك مطلبوب',
                    'email.required_if' => 'حقل عنوان البريد الالكتروني مطلوب',
                    'whatsup.required_if' => 'رقم حساب الوتس اب الخاص بك مطلوب',
                    'telegram.required_if' => 'معرف حساب البتلجرام مطلوب ',
                    'url' => 'يرجى ادخال رابط صحيح',
                    'regex' => 'يجب ان يكون المدخل أعداد',
                    'price.integer' => '  يرجا ادخل ميزانية صحيحة بالأرقام ',
                    'contact.integer' => ' يرجا اختيار طريقة التواصل ',
                    'serviceType.integer' =>' يرجا اختيار نوع الخدمة ',

            ]
    );

        $user = Auth::user();


        DB::beginTransaction();

        try {

        $link = '';

        if($request->contact == 1 ){
            $link = $request->facebook;
    
        }

        if($request->contact == 2){

            $link = $request->email;
        }

        if($request->contact == 3){

            $link = $request->whatsup;
        }

        if($request->contact == 4){

            $link = $request->telgram;
        }
        $order = $user->orders()->create([
            'name'=>$request->name,
            'serviceType'=>$request->serviceType,
            'description'=>$request->description,
            'contact'=>$request->contact,
            'link'=>$link,
            'price'=>$request->price
            ]);

        OraderUser::create([
            'order_id' => $order->id,
            'user_id' =>$user->id,
        ]);

            DB::commit();
            Auth::user()->notify(new newOrderNotification($order,$user));

        } catch (Throwable $e) {

            DB::rollBack();
            return $e->getMessage();
        }

        return redirect()->route('user.home')->with('sccessOrder','تم ارسال طلبك بنجاح ةسيتم التواصل معك في اقرب وقت 
        شكرا لثقتك بنا 
        ');
    }

}
