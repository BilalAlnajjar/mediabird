<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>{{ $title }}</title>

    <!-- Fontfaces CSS-->
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet"></link>
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet"></link>
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet"></link>

    <!-- Bootstrap CSS-->
    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <link href="/MDB-Free_4.19.1/css/mdb.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="/user/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="/user/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
  
  
  
    <!-- Template Main CSS File -->
    <link href="/user/css/style.css" rel="stylesheet">

    <!-- Main CSS-->
    <link href="/css/theme.css" rel="stylesheet" media="all">

    <style>
        body{
            background: {{$color}};
            font-family: Tajawal;
        }
        .formCreat {
            width: 100%;
            display: block;
            margin-top: 11%;
            margin-left: 21%;
            left: 30%;
            top: 0%;
            direction: rtl;
        }

        .form-group {
            position: relative;
            direction: rtl;
            text-align: right;
            width: 60%;
            margin-right: 40%;
            font-family:Lemonada;
            
        }

        .bt {
            margin-right: 20%;
            margin-left: 20%;
            width: 15%;
        }

        .text {
            font-family:Lemonada;
            font-size: 20px;
            font-weight: bold;
            margin-right: 40%;
            text-align: center;
        }
        option{
            text-align: center;
        }

        li{
            font-family:Cairo;
        }
        .shadow-sm{
            width: 30%; 
            min-width:30%;
            margin-right:14px;
            margin-top: 2%;
        }
        .row{
            width:93%;
            margin-right: 89px;
            margin-top:40px;
        }
        a:not([href]):not([tabindex]):hover{
            color:#fff;
        }

        @media only screen and (max-width:992px){

            .shadow-sm{
                width: 80%;
            }

            .header-mobile-inner{
                max-width: 33%;
                transform: translate(89%,0%);
            }

            .row{
                margin-right: 20px;
            }

            .mediaLogo{
                max-width:35%;
                transform: translate(251%,0%);
            }
        }

        @media (min-width: 992px){
        .col-lg-9{

            max-width: 100%
        }

        .logo{

            direction: rtl;
            text-align: right;
        }

        .mediaLogo{
            max-width:35%;
            transform: translate(251%%,0%);
        }
        

    }

    @media (min-width: 992px){
    .col-lg-9 {
        max-width: 100%;
        margin-top: 5%;
        margin-left: 5%;
    }
    }

    @media (max-width: 992px) and (min-width:200px){
        .hamburger {

            position: relative;
            left: 82%;

        }

        .bt{
            width: 41%;
            margin-right: 20%;
            margin-left: 8%;
        }
    }

    @media (min-width: 992px){
    .col-lg-6 {
        -ms-flex: 0 0 50%;
        flex: 0 0 118%;
        max-width: 107%;
        }
    }

    .er{
    text-align: right;
    direction: rtl;
      position: fixed;
      width: 50%;
      transform: translate(70%,10%);
      z-index:4;
      
    }

    .al{
    text-align: right;
    direction: rtl;
      position: fixed;
      width: 50%;
      transform: translate(32%,-114%);
      z-index: 4;
    }

    .mess{
        background: rgb(224, 229, 230);
        width: 70%;
        height: 30%;
        margin-left: 0%;
        margin-right: 0%;
        margin-top: 4%;
    }

    .ul{
        width: 100%;
        height: 100%;
        margin-left: 12%;
        margin-right: 0%;
        margin-top: 13%;
    }

    .col-lg-6{
        margin-top: 7%;
        text-align: right;
    }

    .m{
        font-size: 15px;
        font-family: 'Courier New', Courier, monospace;
    }

    .scrollt{
        color: #555555;
    }

    .get-started-btn:hover {
     border-color:none; 
     color: #555555; 
    }

    </style>

</head>

<body class="animsition">
    <div class="page-wrapper" style="padding-bottom: 0%">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                    <a class="logo" href="{{route('user.home')}}">
                            <img class="mediaLogo" src="/img/photo.png" alt="MediaBird" />
                            <img class="mediaLogo" src="/img/Logo3.png" alt="MediaBird" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">

                        <li>
                            <a href="{{ route('work.dashbord') }}">
                                <i class="fas fa-tachometer-alt"></i>لوحة القيادة </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>الخدمات</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ route('work.Motion') }}"> الفيديو و موشن جرافيكس</a>
                                </li>
                                <li>
                                    <a href="{{ route('work.logo') }}">اللوقو و الهوية البصرية </a>
                                </li>
                                <li>
                                    <a href="{{ route('work.voice') }}">التعليق الصوتي</a>
                                </li>
                                <li>
                                    <a href="{{ route('work.web') }}">خدمات برمجة وتصميم المواقع </a>
                                </li>
                                <li>
                                    <a href="{{ route('work.app') }}">برمجة وتصميم التطبيقات </a>
                                </li>
                            </ul>
                        </li>
                        <li>

                        <a href="{{route('work.create')}}">
                            <i class="fas fa-share-alt"></i>انشاء عمل جديد</a>

                            <a href="{{route('notification')}}">
                                <i class="fas fa-dolly"></i>الطلبات</a>

                                <a href="{{route('Message')}}">
                                    <i class="fas fa-envelope"></i>الرسائل</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="js-arrow">
                                @csrf
                                <i class="fa fa-mail-reply-all"></i>
    
                                <button href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" style="background:none;"
                                    class="scrollt get-started-btn">
                                    {{ __('تسجيل الخروج') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->



        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{route('user.home')}}">
                    <img class="mediaLogo" src="/img/photo.png" alt="MediaBird" />
                    <img class="mediaLogo" src="/img/Logo3.png" alt="MediaBird" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{ route('work.dashbord') }}">
                                <i class="fas fa-tachometer-alt"></i>لوحة القيادة</a>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>الخدمات</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('work.Motion') }}"> الفيديو و موشن جرافيكس</a>
                                </li>
                                <li>
                                    <a href="{{ route('work.logo') }}">اللوقو و الهوية البصرية </a>
                                </li>
                                <li>
                                    <a href="{{ route('work.voice') }}">التعليق الصوتي</a>
                                </li>
                                <li>
                                    <a href="{{ route('work.web') }}">خدمات برمجة وتصميم المواقع </a>
                                </li>
                                <li>
                                    <a href="{{ route('work.app') }}">برمجة وتصميم التطبيقات </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                        <a href="{{route('work.create')}}">
                                <i class="fas fa-share-alt"></i>انشاء عمل جديد</a>
                        </li>

                        <li>

                        <a href="{{route('notification')}}">
                            <i class="fas fa-dolly"></i>الطلبات</a>
                    </li>

                    <li>
                    <a href="{{route('work.indexMessage')}}">
                        <i class="fas fa-envelope"></i>الرسائل</a>
                </li>

                            </ul>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="js-arrow">
                            @csrf
                            <i class="fa fa-mail-reply-all"></i>

                            <button href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" style="background:none"
                                class="get-started-btn scrollt">
                                {{ __('تسجيل الخروج') }}
                            </button>
                        </form>

                        </li>
                    </ul>
                </nav>
            </div>
        </aside>


        <div class="page-container">
            <!-- HEADER DESKTOP-->

            @php 

            $arr = [];
            $count = 0;
            $countM = 0;
            foreach ($users as $user) {
                $arr[$user->id] = $user->notifications;
                if($user->unreadNotifications->count() != 0){
                    $count = $count + 1;
                };
            }

                foreach ($messages as $message) {
                if($message->unreadNotifications->count() != 0){
                    $countM = $countM + 1;
                };
            }

            @endphp
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        @if($countM != 0)
                                        <span class="quantity">{{$countM}}</span>
                                        @endif
                                        <div class="email-dropdown js-dropdown">
        
                                            @foreach($messages as $message)
                                            @foreach($message->unreadNotifications as $unread)
                                            <div class="email__item">
                                                <div class="content">
                                                    <p>{{$unread->data['message']}}</p>
                                                    <span>{{$unread->created_at}}</span>
                                                </div>
                                            </div>

                                            @endforeach
                                            @endforeach
                                
                                            <div class="email__footer">
                                                <a href="#">مشاهدة كل الرسائل</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>

                                        @if($count != 0)
                                        <span class="quantity">{{$count}}</span>
                                        @endif
                                        <div class="notifi-dropdown js-dropdown">

                                        @foreach ($users as $user)
                                            @foreach($user->unreadNotifications as $unread) 
                                    
                                            <a href="{{route('notification')}}" class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>{{$unread->data['message']}}</p>
                                                    <span class="date">{{$unread->created_at}}</span>
                                                </div>
                                                </a>
                                                @endforeach
                                            @endforeach
                                            <div class="notifi__footer">
                                            <a href="{{route('notification')}}">مشاهدة كل الطلبات</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
        @yield('content')
    <!-- Jquery JS-->
    <script src="/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/vendor/slick/slick.min.js">
    </script>
    <script src="/vendor/wow/wow.min.js"></script>
    <script src="/vendor/animsition/animsition.min.js"></script>
    <script src="/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/js/main.js"></script>
    
    <script>

        var m = document.getElementById('image');
        var vi = document.getElementById('video');
        var l = document.getElementById('link');
        var vo = document.getElementById('voice');
        var la = document.getElementById('lang');
        var po = document.getElementById('poster');

        var mm = document.getElementById('img');
        var vid = document.getElementById('vid');
        var li = document.getElementById('lin');
        var voi = document.getElementById('voi');
        var lan = document.getElementById('lan');
        var pos = document.getElementById('post');

        m.style.display = "block";
        vi.style.display = "none";
        l.style.display = "none";
        vo.style.display = "none";
        la.style.display = "none";
        po.style.display = "none";

       function myfunction(){
           
         var x = document.getElementById('serviceType').value;
           
           if(x == 1){
            vi.style.display = "block";
            po.style.display = "block";
            m.style.display = "none";
            l.style.display = "none";
            vo.style.display = "none";
            la.style.display = "none";

            vid.setAttribute("name","video");
            pos.setAttribute("name","poster");
            li.removeAttribute("name");
            mm.removeAttribute("name");
            voi.removeAttribute("name");
            lan.removeAttribute("name");
            }
            else if( x == 2 || x == 3 ){
                m.style.display = "block"; 
                vi.style.display = "none";
                l.style.display = "none";
                vo.style.display = "none";
                la.style.display = "none";
                po.style.display = "none";

                mm.setAttribute("name","image[]");
                li.removeAttribute("name");
                vid.removeAttribute("name");
                voi.removeAttribute("name");
                lan.removeAttribute('name');
                pos.removeAttribute('name');

            }
            else if( x == 4 ){
                vo.style.display = "block";
                vi.style.display = "block";
                po.style.display = "block";
                la.style.display = "block";
                m.style.display = "none";
                l.style.display = "none";

                voi.setAttribute("name","voice");
                vid.setAttribute("name","video");
                pos.setAttribute("name","poster");
                li.removeAttribute("name");
                mm.removeAttribute("name");
                lan.setAttribute("name","lang");
                
            }
            else if(x == 5 || x == 6 || x == 7 || x == 8){
                m.style.display = "block";
                l.style.display = "block";
                vo.style.display = "none";
                vi.style.display = "none";
                la.style.display = "none";
                po.style.display = "none";

                mm.setAttribute("name","image[]");
                li.setAttribute("name","link");
                vi.removeAttribute("name");
                vo.removeAttribute("name");
                lan.removeAttribute('name');
                pos.removeAttribute('name');
            }


       }

      
        
    </script>

</body>

</html>
<!-- end document-->