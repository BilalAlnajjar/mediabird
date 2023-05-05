@extends('layouts.admin')

@php
$title = "جميع الرسائل";
$color = '#E5E5E5';
@endphp

@section('content')

<div class="col-lg-6">
    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
        <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
            <div class="bg-overlay bg-overlay--blue"></div>
            <h3>
                <i class="zmdi zmdi-comment-text"></i>عرض الرسائل</h3>
        </div>

               
                

                    @foreach($messages as $message)
                    @foreach($message->notifications as $no)

                    @php
                    $no->markAsRead();
                    @endphp

                    @endforeach
                        <div class="au-message__item-inner">
                            <h5 class="hMess" style="font-family: Tajawal">{{$message->name}}</h5>
                            <p class="pMess" style="font-family: Tajawal">{{$message->message}}</p>
                            <span class="sMess" style="font-family: Tajawal">{{$message->created_at}}</span>
                    </div>
                    @endforeach


            </div>
            </div>
        </div>
    </div>

@endsection