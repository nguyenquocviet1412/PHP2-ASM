<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHi tiết bài viết</title>
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
                                    <div id="weather" class="col-xs-16 col-sm-8 col-lg-9">
                                        Welcome {{ $name }} to my website!
                                    </div>
                                    
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
                    <div class="col-sm-5 col-md-5 wow fadeInUpLeft animated"><a class="navbar-brand" href="{{url()}}">globalnews</a></div>
                    <div class="col-sm-11 col-md-11 hidden-xs text-right"><img src="{{url('src/Views/Client/assets/images/ads/468-60-ad.gif')}}" width="468" height="60" alt="" /></div>
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

        <!-- sticky header end -->
        <!-- bage header Start -->
        <div class="container">
            <div class="page-header">
                <h1>{{ $post['title']}}</h1>
            </div>


            <div id="news">
                <div id="news_image">
                    <img alt="{{ $post['title']}}"
                        src="{{$post['image']}}"
                        class="rounded" width="670">
                </div>
                <div id="news_content">
                    <p>
                        {{ $post['content']}}
                    </p>
                </div>
                <div id="news_more">
                    <h4><a>||</a>Tin liên quan</h4></br>
                    <ul>
                        <li><a href='#'>Những thực phẩm mang lại lợi ích tối đa
                                cho sức khỏe của xương</a></li>
                    </ul>
                </div>
                <div class="well">
                    <h4>Viết bình luận...</h4></br>
                    <form action="view_chitiet_bantin.html" method="POST" role="form">
                        <div class="form-group">
                            <textarea class="form-control" name="content" rows="5"></textarea>
                        </div>
                        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                <div class="news_comments">
                    <h4>Bình luận</h4><br>
                    <table>
                    </table>
                </div>
            </div>


            <!-- bage header End -->

            <!-- Footer Start -->

            <!-- Footer start -->
            <footer>
                <div class="top-sec">
                    <div class="container ">
                        <div class="row match-height-container">
                            <div class="col-sm-6 subscribe-info wow fadeInDown animated" data-wow-delay="1s"
                                data-wow-offset="40">
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
<style>
    #news {
        width: 670px;
        margin-left: 150px;
    }

    p {
        width: 670px;
        margin-top: 30px;
        color: #222;
        letter-spacing: 1px;
        font-size: 13px;
        font-family: Arial, sans-serif;
    }

    #news_more {
        margin-top: 110px;
        margin-bottom: 25px;
    }

    a {
        color: #06c;
    }

    .well {
        margin-top: 75px;
        margin-bottom: 50px;
    }
</style>