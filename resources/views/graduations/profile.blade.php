@extends('graduations.layouts.app')

@section('content')

<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url({{URL::asset('assets/site/assets/img/bn2.jpg')}});">
			</section>

			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- Candidate Detail Start -->
			<section class="detail-desc">
				<div class="container">
				
					<div class="ur-detail-wrap top-lay" style="display: block;">
						
						@include('graduations.components.detials-section');

                       <br>
                       <br>

	            		<div class="row no-padd">
						<div class="detail pannel-footer">
							<div class="col-md-5 col-sm-5">
							<ul class="detail-footer-social">
                                    <li><a href="{{auth('graduations')->user()->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{auth('graduations')->user()->google}}"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="{{auth('graduations')->user()->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
							</div>

							<div class="col-md-7 col-sm-7">
								<div class="detail-pannel-footer-btn pull-left">
									<a href="{{ asset('resumes/' . auth('graduations')->user()->resume) }}" class="footer-btn blu-btn" download title="Download Resume">
										<i class="ti-download mrg-r-5"></i> Download CV
									</a>
								</div>
							</div>
							
						</div>
					</div>
						
					</div>

					
				</div>
			</section>
			<!-- Candidate Detail End -->
			
			<!-- Candidate full detail Start -->
			<section class="full-detail-description full-detail">
				<div class="container">
					<div class="row">
						
						<div class="col-md-12">
							
							<div class="row-bottom">
								<h2 class="detail-title">بيانات الاتصال </h2>
								
								<ul class="trim-edu-list">
								
                                    <li><i class="fa fa-map-marker"></i> العنــوان :  {{auth('graduations')->user()->address}}</li>
									<li><i class="fa fa-envelope"></i> البــريد الالكتــروني : {{auth('graduations')->user()->email}}</li>
                                    <li><i class="fa fa-phone"></i> الهاتف :  {{auth('graduations')->user()->phone}} </li>
									
								</ul>
							</div>
							
							<div class="row-bottom">
								<h2 class="detail-title">التعليم</h2>
								
								<ul class="trim-edu-list">

								@foreach(auth('graduations')->user()->educations as $education)
								<li>
									<div class="trim-edu">
										<h4 class="trim-edu-title" style="margin-bottom: 10px;">{{$education->faculty->name}}</h4>
										<strong style="margin-bottom: 10px; display: block;">الدرجة العلمية :  {{$education->degree->name}}</strong>
										<h4 class="trim-edu-title" style="margin-bottom: 10px;">
											<span class="title-est" style="margin-right: -0px;">فترة الدراسة : 
												{{ \Carbon\Carbon::parse($education->from)->format('m/Y') }} - 
												{{ \Carbon\Carbon::parse($education->to)->format('m/Y') }}
											</span>
										</h4>
									</div>
								</li>
								@endforeach

								</ul>
							</div>
							
							<div class="row-bottom">
								<h2 class="detail-title">الخبرة العملية </h2>
								<ul class="trim-edu-list">
								@foreach(auth('graduations')->user()->experiences as $experience)
								<li>
									<div class="trim-edu">
										<h4 class="trim-edu-title" style="margin-bottom: 10px;">الشركة : {{$experience->company}}</h4>
										<strong style="margin-bottom: 10px; display: block;">الوظيفة :  {{$experience->job}}</strong>
										<h4 class="trim-edu-title" style="margin-bottom: 10px;">
											<span class="title-est" style="margin-right: -0px;">فترة العمل : 
												{{ \Carbon\Carbon::parse($experience->from)->format('m/Y') }} - 
												{{ \Carbon\Carbon::parse($experience->to)->format('m/Y') }}
											</span>
										</h4>
									</div>
								</li>
								@endforeach									
								</ul>
							</div>
							
							<div class="row-bottom">
								<h2 class="detail-title">المهارات</h2>
								<div class="ext-mrg row third-progress">

								@foreach(auth('graduations')->user()->skills as $skill)
									<div class="col-md-6 col-sm-6">
										<div class="panel-body">
											<h3 class="progressbar-title">{{$skill->name}}</h3>
											<div class="progress">
												<div class="progress-bar" style="width: 90%; background: #26a9e1;">
													<span class="progress-icon fa fa-plus" style="border-color:#26a9e1; color:#26a9e1;"></span>
													<div class="progress-value">{{$skill->degree}}</div>
												</div>
											</div>
										</div>
									</div>
									@endforeach									

											
										</div>
									</div>
								</div>
							</div>
							
						</div>
						
						
					
					</div>
				</div>
			</section>
			<!-- company full detail End -->


@endsection
