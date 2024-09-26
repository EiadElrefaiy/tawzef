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
							
							<li><a href="company-home.html">لوحة التحكم</a></li>
                            <li><a href="{{route('jobs.company')}}">وظائفي</a></li>
							<li><a href="{{route('jobs.add')}}">اضافة وظيفة</a></li>
							<li><a href="{{route('company.profile')}}">الملف الشخصي</a></li>
						</ul>
						
                        <div class="user-pan pull-left">
                            <div class="btn-group">
                                <button type='button' class='btn btn-default dropdown-toggle ' data-toggle='dropdown'>
                                    <span class="user-name">{{auth('companies')->user()->name}}</span>
                                    <i class="fa fa-cog"></i> 
                                </button>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <a href="company-profile.html"> <i class="fa fa-cogs"></i> الملف الشخصي </a>
										<a href="company-edit-info.html"> <i class="fa fa-edit"></i> تعديل بياناتي </a>
										<div class="divider"></div>
                                        <a href="{{ route('company.logout') }}"> <i class="fa fa-sign-out"></i> تسجيل الخروج </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        
					</div><!-- /.navbar-collapse -->
                    
                    
				</div>   
			</nav>
			<!-- End Navigation -->
