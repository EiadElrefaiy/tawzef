@extends('companies.layouts.app')

@section('content')

			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url({{URL::asset('assets/site/assets/img/bn2.jpg')}});">
				
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
		
			<!-- Candidate Profile Start -->
        	<section class="detail-desc">
				<div class="container">
				
					<div class="ur-detail-wrap top-lay" style="display: block;">
						
						<div class="row bottom-mrg2">

			                <div class="col-xs-12 col-md-2 skills-section done">

			                    <img src="{{$company->image ? URL::asset($company->image) : URL::asset('assets/site/assets/img/com-4.jpg')}}" class="img-thumbnail center-block" style="width: 100%">

			                </div>

                            <div class="col-xs-12 col-md-10">
                                <h3>{{ $company->name }}</h3>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="main-info">
                                            <li><i class="fa fa-university"></i> مجال الشركة: {{ $company->commercial_index }}</li>
                                            <li><i class="fa fa-map-marker"></i> عنوان الشركة : {{ $company->address }} - {{ $company->city }} </li>
                                            <li><i class="fa fa-envelope"></i> البريد الإلكتروني: {{ $company->email }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
			               

	            		</div>
	            		<div class="row no-padd">
						<div class="detail pannel-footer">
							<div class="col-md-5 col-sm-5">
								<ul class="detail-footer-social">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
							
						</div>
					</div>
						
					</div>

					
				</div>
			</section>
		
        <!-- ========== Begin: Brows job ===============  -->
			<section class="pt-0">
				<div class="container">
					<!-- Company Searrch Filter Start -->
					<div class="row">
						<div class="main-heading">
	                        <h2>وظائف خالية في الشركة </h2>
	                    </div>
					</div>
					<!-- Company Searrch Filter End -->
					
					<div class="row-bottom">
                        

                        <!--Browse Job In Grid-->
                        <div class="row extra-mrg">

                        @foreach($company->jobs as $job)
					<div class="col-md-4 col-sm-6" data-id="{{ $job->id }}">
                            
                            <div class="grid-view brows-job-list">
                                <div class="pull-right">
									<div class="btn-group action-btn">
										<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
											<i class="fa fa-ellipsis-v"></i>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><a href="{{route('jobs.edit' , ['id'=>$job->id])}}">تعديل</a>
											</li>
											<!-- Delete Button -->
											<li><a href="#" class="delete-job-btn" data-id="{{ $job->id }}" data-toggle="modal" data-target="#deleteModal">حذف</a></li>
										</ul>
									</div>
								</div>

                                <div class="brows-job-company-img">
                                    <img src="{{$job->company->image ? URL::asset($job->company->image) : URL::asset('assets/site/assets/img/com-4.jpg')}}" class="img-responsive" alt="" />
                                </div>

                                <div class="brows-job-position">
                                    <h3><a href="job-detail.html">{{$job->name}} </a></h3>
                                    <p><span>{{$job->company->name}}</span></p>
                                </div>
                                <div class="job-position">
                                    <span class="job-num">{{$job->number}} أماكن شاغرة</span>
                                </div>
                               
                                <ul class="grid-view-caption">
                                    <li>
                                        <div class="brows-job-location">
                                            <p><i class="fa fa-map-marker"></i> {{$job->location}}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <p><span class="brows-job-sallery"><i class="fa fa-money"></i> {{$job->salary}} جنيه </span></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach



                        </div>
                        <!--/.Browse Job In Grid-->

                    </div>
					
				</div>
			</section>
			<!-- ========== Begin: Brows job End ===============  -->


            <!-- Delete Confirmation Modal -->
				<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="deleteModalLabel">تأكيد الحذف</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>هل أنت متأكد أنك تريد حذف هذه الوظيفة؟ لا يمكن التراجع عن هذا الإجراء.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
								<button type="button" class="btn btn-danger" id="confirmDeleteBtn">حذف</button>
							</div>
						</div>
					</div>
				</div>



				<script>
					$(document).ready(function() {
						let jobId;

						// When the delete button is clicked, get the job ID
						$('.delete-job-btn').click(function() {
							jobId = $(this).data('id');
						});

						// Confirm delete button action
						$('#confirmDeleteBtn').click(function() {
							$.ajax({
								url: '{{ route("jobs.delete") }}',  // Your delete route
								type: 'DELETE',
								data: {
									"_token": "{{ csrf_token() }}",  // CSRF token for security
									"id": jobId
								},
								success: function(response) {
									if(response.success) {
										// If job is successfully deleted, hide the modal and remove the job element
										$('#deleteModal').modal('hide');
										$('div[data-id="'+jobId+'"]').remove();
										alert('تم حذف الوظيفة بنجاح.');
									} else {
										alert('حدث خطأ أثناء الحذف.');
									}
								},
								error: function(xhr) {
									alert('حدث خطأ أثناء الحذف.');
								}
							});
						});
					});
				</script>


@endsection
