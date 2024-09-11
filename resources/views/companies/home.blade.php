@extends('companies.layouts.app')

@section('content')

		<div class="clearfix"></div>
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url({{URL::asset('assets/site/assets/img/bn2.jpg')}});">
				<div class="container">
					<h1> لوحة التحكم </h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- ========== Begin: Brows Resumes ===============  -->
			<section class="member-card gray">
				<div class="container">
				
					<!-- search filter -->
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="search-filter">
							
								<div class="col-md-4 col-sm-5">
									<div class="filter-form">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="بحث …">
											<span class="input-group-btn">
												<button type="button" class="btn btn-default">بحث</button>
											</span>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<!-- search filter End -->
					
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="manage-cndt">
								<div class="cndt-caption">
									<div class="cndt-pic">
										<img src="{{URL::asset('assets/site/assets/img/client-1.jpg')}}" class="img-responsive" alt="" />
									</div>
									<h4>محمد علي</h4>
									<span>الوظيفة</span>
									<p>بكالوريوس هندسة - 2018</p>
								</div>
								<a href="graduate-cv.html" title="" class="cndt-profile-btn">الملف الشخصي</a>
							</div>
						</div>
                        <div class="col-md-4 col-sm-4">
							<div class="manage-cndt">
								<div class="cndt-caption">
									<div class="cndt-pic">
										<img src="{{URL::asset('assets/site/assets/img/client-1.jpg')}}" class="img-responsive" alt="" />
									</div>
									<h4>محمد علي</h4>
									<span>الوظيفة</span>
									<p>بكالوريوس هندسة - 2018</p>
								</div>
								<a href="graduate-cv.html" title="" class="cndt-profile-btn">الملف الشخصي</a>
							</div>
						</div>
                        <div class="col-md-4 col-sm-4">
							<div class="manage-cndt">
								<div class="cndt-caption">
									<div class="cndt-pic">
										<img src="{{URL::asset('assets/site/assets/img/client-1.jpg')}}" class="img-responsive" alt="" />
									</div>
									<h4>محمد علي</h4>
									<span>الوظيفة</span>
									<p>بكالوريوس هندسة - 2018</p>
								</div>
								<a href="graduate-cv.html" title="" class="cndt-profile-btn">الملف الشخصي</a>
							</div>
						</div>
                        <div class="col-md-4 col-sm-4">
							<div class="manage-cndt">
								<div class="cndt-caption">
									<div class="cndt-pic">
										<img src="{{URL::asset('assets/site/assets/img/client-1.jpg')}}" class="img-responsive" alt="" />
									</div>
									<h4>محمد علي</h4>
									<span>الوظيفة</span>
									<p>بكالوريوس هندسة - 2018</p>
								</div>
								<a href="graduate-cv.html" title="" class="cndt-profile-btn">الملف الشخصي</a>
							</div>
						</div>
                        <div class="col-md-4 col-sm-4">
							<div class="manage-cndt">
								<div class="cndt-caption">
									<div class="cndt-pic">
										<img src="{{URL::asset('assets/site/assets/img/client-1.jpg')}}" class="img-responsive" alt="" />
									</div>
									<h4>محمد علي</h4>
									<span>الوظيفة</span>
									<p>بكالوريوس هندسة - 2018</p>
								</div>
								<a href="graduate-cv.html" title="" class="cndt-profile-btn">الملف الشخصي</a>
							</div>
						</div>
                        <div class="col-md-4 col-sm-4">
							<div class="manage-cndt">
								<div class="cndt-caption">
									<div class="cndt-pic">
										<img src="{{URL::asset('assets/site/assets/img/client-1.jpg')}}" class="img-responsive" alt="" />
									</div>
									<h4>محمد علي</h4>
									<span>الوظيفة</span>
									<p>بكالوريوس هندسة - 2018</p>
								</div>
								<a href="graduate-cv.html" title="" class="cndt-profile-btn">الملف الشخصي</a>
							</div>
						</div>
                        
					</div>
					
					<div class="row">
						<ul class="pagination">
							<li><a href="#">&laquo;</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li> 
							<li><a href="#">4</a></li> 
							<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li> 
							<li><a href="#">&raquo;</a></li> 
						</ul>
					</div>
					
				</div>
			</section>
			<!-- ========== Begin: Brows job End ===============  -->

@endsection
