        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-fixed navbar-light white bootsnav">

            <div class="container">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{URL::asset('assets/site/assets/img/tanta-logo.png')}}" class="logo logo-scrolled" alt="">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">

                        <li><a href="graduate-home.html">لوحة التحكم</a></li>
                        <li><a href="{{route('graduation.browse.jobs')}}">بحث الوظائف</a></li>
                        <li><a href="field-jobs.html">وظائف تناسب مجالاتك</a></li>
                        <li><a href="graduate-cv.html">الملف الشخصي</a></li>
                    </ul>

                    <div class="user-pan pull-left">
                        <div class="btn-group">
                            <button type='button' class='btn btn-default dropdown-toggle ' data-toggle='dropdown'>
                                    <span class="user-name">{{auth('graduations')->user()->name}}</span>
                                    <i class="fa fa-cog"></i> 
                                </button>
                            <ul class='dropdown-menu'>
                                <li>
                                    <a href="{{route('graduation.profile')}}"> <i class="fa fa-cogs"></i> الملف الشخصي </a>
                                    <a href="{{route('graduation.info')}}"> <i class="fa fa-edit"></i> تعديل بياناتي </a>
                                    <a href="applied-jobs.html"> <i class="fa fa-address-card"></i> الوظائف المقدم عليها </a>
                                    <div class="divider"></div>
                                    <a href="{{ route('graduation.logout') }}"> <i class="fa fa-sign-out"></i> تسجيل الخروج </a>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
                <!-- /.navbar-collapse -->


            </div>
        </nav>
