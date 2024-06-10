<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập</title>
    <link rel="shortcut icon" href="{{url('src/Views/Client./assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{url('src/Views/Client./assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- bootstrap styles-->
    <link href="{{url('src/Views/Client./assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- google font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
    <!-- ionicons font -->
    <link href="{{url('src/Views/Client./assets/css/ionicons.min.css')}}" rel="stylesheet">
    <!-- animation styles -->
    <link rel="stylesheet" href="{{url('src/Views/Client./assets/css/animate.css')}}" />
    <!-- custom styles -->
    <link href="{{url('src/Views/Client./assets/css/custom-red.css')}}" rel="stylesheet" id="style">
    <!-- owl carousel styles-->
    <link rel="stylesheet" href={{url('src/Views/Client./assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('src/Views/Client./assets/css/owl.transitions.css')}}">
    <!-- magnific popup styles -->
    <link rel="stylesheet" href="{{url('src/Views/Client./assets/css/magnific-popup.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- Latest compiled and minified CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->

</head>

<body>
    <!-- preloader start -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <div class="wrapper">
        <!-- header toolbar start -->
        <div class="header-toolbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-16 text-uppercase">
                        <div class="row">
                            <div class="col-sm-8 col-xs-16">
                                <ul id="inline-popups" class="list-inline">
                                    @if (!isset($_SESSION['user']))
                                    <li><a class="" href="{{ url('login') }}" data-effect="mfp-zoom-in">Đăng nhập</a></li>
                                    @endif
                                    @if (isset($_SESSION['user']))
                                    <li><a class="" href="{{ url('logout') }}" data-effect="mfp-zoom-in">Đăng xuất</a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-xs-16 col-sm-8">
                                <div class="row">
                                    <div id="weather" class="col-xs-16 col-sm-8 col-lg-9"></div>
                                    <div id="time-date" class="col-xs-16 col-sm-8 col-lg-7"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-header">
            <!-- header start -->
            <div class="container header">
                <div class="row">
                    <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="index.html">globalnews</a></div>
                    <div class="col-sm-11 col-md-11 hidden-xs text-right"><img src="./assets/images/ads/468-60-ad.gif" width="468" height="60" alt="" /></div>
                </div>
            </div>
            <!-- header end -->
            <!-- nav and search start -->
            <div class="nav-search-outer">
                <!-- nav start -->

                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-16"> <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                </div>
                                <div class="collapse navbar-collapse" id="navbar-collapse">
                                <ul class="nav navbar-nav text-uppercase main-nav ">
                                        <li class="active"><a href="{{url()}}">Trang chủ</a></li>
                                        @foreach ($categories as $category)
                                            <li><a href ='{{ url('categories/' . $category['id']) }}'>{{ $category['name'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- nav end -->
                    <!-- search start -->

                    <div class="search-container ">
                        <div class="container">
                            <form action="#" method="GET" role="search">
                                <input id="search-bar" placeholder="Nhập từ khóa..." name="txtsearch" autocomplete="off">
                            </form>
                        </div>
                    </div>
                    <!-- search end -->
                </nav>
                <!--nav end-->
            </div>
            <!-- nav and search end-->
        </div> <!-- preloader end -->

        <!-- Giao diện đăng nhập -->
        <div class="container">
            <div class="row">
                <div class="col col-md-6 col-md-offset-3">
                    <div class="panel panel-defaul">
                        <div class="panel-heading">
                            Đăng nhập
                        </div>
                        @if (!empty($_SESSION['error']))
                            <div class="alert alert-warning mt-3 mb-3">
                                {{ $_SESSION['error'] }}
                            </div>

                            @php
                                unset($_SESSION['error']);
                            @endphp
                        @endif
                        <div class="panel-body">
                        <form action="{{ url('handle-login') }}" method="POST" onsubmit="return handeFormSubmit();">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                    name="email" placeholder="Nhập Email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Mật khẩu</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                    name="password" placeholder="Mật khẩu">
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Đăng nhập</button>

                        </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-12 col-md-5" style="height:100px; background-color: red;">

        </div> -->
            </div>
        </div>


        <!-- Footer start -->
        <footer>
            <div class="top-sec">
                <div class="container ">
                    <div class="row match-height-container">
                        <div class="col-sm-6 subscribe-info wow fadeInDown animated" data-wow-delay="1s" data-wow-offset="40">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="btm-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-16">
                            </div>
                        </div>
                    </div>
                </div>
        </footer><!-- jQuery -->
        <script src="{{url('src/Views/Client/assets/js/jquery.min.js')}}"></script>
        <!--jQuery easing-->
        <script src="{{url('src/Views/Client/assets/js/jquery.easing.1.3.js')}}"></script>
        <!-- bootstrab js -->
        <script src="{{url('src/Views/Client/assets/js/bootstrap.js')}}"></script>
        <!--style switcher-->
        <script src="{{url('src/Views/Client/assets/js/style-switcher.js')}}"></script> <!--wow animation-->
        <script src="{{url('src/Views/Client/assets/js/wow.min.js')}}"></script>
        <!-- time and date -->
        <script src="{{url('src/Views/Client/assets/js/moment.min.js')}}"></script>
        <!--news ticker-->
        <script src="{{url('src/Views/Client/assets/js/jquery.ticker.js')}}"></script>
        <!-- owl carousel -->
        <script src="{{url('src/Views/Client/assets/js/owl.carousel.js')}}"></script>
        <!-- magnific popup -->
        <script src="{{url('src/Views/Client/assets/js/jquery.magnific-popup.js')}}"></script>
        <!-- weather -->
        <script src="{{url('src/Views/Client/assets/js/jquery.simpleWeather.min.js')}}"></script>
        <!-- calendar-->
        <script src="{{url('src/Views/Client/assets/js/jquery.pickmeup.js')}}"></script>
        <!-- go to top -->
        <script src="{{url('src/Views/Client/assets/js/jquery.scrollUp.js')}}"></script>
        <!-- scroll bar -->
        <script src="{{url('src/Views/Client/assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{url('src/Views/Client/assets/js/jquery.nicescroll.plus.js')}}"></script>
        <!--masonry-->
        <script src="{{url('src/Views/Client/assets/js/masonry.pkgd.js')}}"></script>
        <!--media queries to js-->
        <script src="{{url('src/Views/Client/assets/js/enquire.js')}}"></script>
        <!--custom functions-->
        <script src="{{url('src/Views/Client/assets/js/custom-fun.js')}}"></script>
</body>

</html>
<script src="{{url('src/Views/Client/assets/js/login.js')}}"></script>