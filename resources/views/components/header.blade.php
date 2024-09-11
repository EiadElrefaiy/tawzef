        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-fixed navbar-light white bootsnav">

            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <img src="{{URL::asset('assets/site/assets/img/tanta-logo.png')}}" class="logo logo-scrolled" alt="">
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">

                    <!--li><a class="btn-1" href="index.html">الرئيسية </a></li-->

                </ul>



                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu" style="overflow: hidden;">

                    <ul class="nav nav-1 navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">

                        <li class="left-br"><a href="{{route('get-comapny.login')}}" style="left: 48rem;" class="signin color-1">تسجيل دخول شركة</a></li>
                        <li class="left-br"><a href="login-graduate.html" style="left: 48rem;" class="signin">تسجيل دخول خريج </a></li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
