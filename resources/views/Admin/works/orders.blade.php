@extends('layouts.admin')
@section('content')

@php
    $title = "جميع الطلبات";
    $color = '#fff';
@endphp

@if(session('stuteEr'))
<div class="alert alert-danger al" style="transform: translate(26%,-32%);">{{ session('stuteEr') }} </div>
@endif

<div class="row">
    <div class="col-lg-9">
        <h2 class="title-1 m-b-25">جدول الطلبات</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>تاريخ الطلب</th>
                        <th>الرقم الخاص بالطلب</th>
                        <th>اسم الطلب</th>
                        <th>وصف الخدمة المطلوبة </th>
                        <th>ميزانية الطلب</th>
                        <th>سعر الطلب</th>
                        <th>المدفوعات</th>
                        <th>الباقي من سعر الطلب</th>
                        <th>قيمة الدفعة الحالية</th>
                        <th>اسم الشخص الذي قام بارسال الطلب</th>
                        <th>طريقة التواصل المفضلة للمستخدم</th>
                        <th>عنوان التواصل الخاص بالمستخدم</th>
                        <th>حالة الطلب</th>
                        <th>  تحديد سعر الطلب</th>
                        <th>تحديد قيمة الفاتورة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)

                    @php
                    $user = $users->where('id',$order->user_id)->first();
                    @endphp
                    @foreach($user->notifications as $no)

                    @php
                    $no->markAsRead();
                    @endphp
                        
                    @endforeach
                    <tr>
                        <td>{{$order->created_at}}</td>
                        <td>{{ $order->id}}</td>
                        <td>{{ $order->name}}</td>
                        <td style="  white-space:unset;">{{ $order->description}}</td>
                        <td class="text-right">{{ $order->price}}$</td>
                        <td class="text-right">{{ $order->priceOrder}}$</td>
                        <td class="text-right">{{ $order->payments}}$</td>
                        <td class="text-right">{{$order->priceOrder - $order->payments}}$</td>
                        <td class="text-right">{{$order->bill}}$</td>
                        <td>{{$user->name}}</td>
                        <td>{{$order->contact}}</td>
                        <td>{{$order->link}}</td>

                        <td>
                            @if($order->status == 'مكتمل')
                            <div class="p-3 mb-2 bg-success text-white">{{$order->status}}<div>
                            @endif

                            @if($order->status == 'غير مكتمل')
                            <div class="p-3 mb-2 bg-warning text-white">{{$order->status}}<div>
                            @endif

                            </td>

                        <td><form method="POST" action="{{route('user.priceOrder',[$order->id])}}">
                            @csrf
                            <label>ادخل سعر الطلب</label>
                            <input type="number" name="priceOrder" class="form-control au-input au-input--full">
                            <button class="btn btn-dark-green" style="display: inline-block">ارسال</button>
                        </form>
                        </td>

                        <td><form method="POST" action="{{route('user.ball',[$order->id])}}">
                            @csrf
                            <label>ادخل قيمة الفاتورة التي تريد ان يدفعها المستخدم</label>
                            <input type="number" name="bill" class="form-control au-input au-input--full">
                            <button class="btn btn-dark-green" style="display: inline-block">ارسال</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection