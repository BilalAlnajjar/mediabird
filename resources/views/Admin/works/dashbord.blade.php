@extends('layouts.admin')
@section('content')
@php
$title ="الصفحة الرئسية";
$color = '#fff';
@endphp

<!-- PAGE CONTAINER-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">نظرة عامة</h2>
                                    <a href="{{route('work.create')}}" class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>اضافة عمل جديد</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                            <h2>{{$online_visitor}}</h2>
                                                <span>عدد زوار الموقع</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$orders_count}}</h2>
                                                <span>عدد الطلبات</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                            <h2>{{$works_count}}</h2>
                                                <span>عدد الأعمال المرفوعة على الموقع</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2>$1,060,386</h2>
                                                <span>المدفوعات على الموقع</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <th>اسم الشخص الذي قام بارسال الطلب</th>
                                                <th>طريقة التواصل المفضلة للمستخدم</th>
                                                <th>عنوان التواصل الخاص بالمستخدم</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                                @php
                                                    $user = $users->where('id',$order->user_id)->first(); 
                                                @endphp
                                
                                            <tr>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{ $order->id}}</td>
                                                <td>{{ $order->name}}</td>
                                                <td><p>{{ $order->description}}</p></td>
                                                <td class="text-right">{{ $order->price}}$</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$order->contact}}</td>
                                                <td>{{$order->link}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
            </div>
@endsection
