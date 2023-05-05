<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check:Admin');
    }

    public function index(){
        $users = User::get();
        $orders = Order::get();


        return view('Admin.works.orders',[

            
            $title = "جميع الطلبات",
            $color = '#fff',

            'users' => $users, 
            'orders' => $orders,
            'messages' => Message::get(),
        ]);
    }


    public function indexMessage(){
        $messages = Message::get();
        $users = User::get();
        return view('Admin.works.indexMessage',[
            $title = "جميع الطلبات",
            $color = '#fff',
            'messages' => $messages,
            'users' => $users,
        ]);
    }
}
