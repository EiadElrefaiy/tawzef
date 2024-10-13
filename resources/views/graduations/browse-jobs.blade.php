@extends('graduations.layouts.app')

@section('content')
 
    <style>
        .disabled-link {
        pointer-events: none; /* Prevents click actions */
        color: #ccc; /* Adjusts color to indicate disabled state */
        cursor: not-allowed; /* Changes cursor to indicate non-interactive */
        }

        .disabled a {
            opacity: 0.5; /* Makes the disabled arrow appear faded */
            color: #ccc; /* Adjust color for disabled links */
        }

    </style>


    <!-- End Navigation -->
    <div class="clearfix"></div>

			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url({{URL::asset('assets/site/assets/img/bn2.jpg')}});">
				<div class="container">
					<h1> بحث عن وظيفة</h1>
				</div>
			</section>

			<!-- ========== Begin: Brows job ===============  -->
			<section>
				<div class="container">
					<!-- Company Searrch Filter Start -->
					<div class="row extra-mrg">
						<div class="wrap-search-filter">
                        <form method="GET" action="{{ route('graduation.browse.jobs') }}">
                            <div class="col-md-4 col-sm-4">
                                <input type="text" name="job_name" class="form-control" placeholder="الوظيفة, مثال: محاسب" value="{{ request('job_name') }}">
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <select class="form-control" name="state">
                                    <option value="">المحافظة</option>
                                    <option value="1" {{ request('state') == '1' ? 'selected' : '' }}>القاهرة</option>
                                    <option value="2" {{ request('state') == '2' ? 'selected' : '' }}>الجيزة</option>
                                    <option value="3" {{ request('state') == '3' ? 'selected' : '' }}>الإسكندرية</option>
                                    <option value="4" {{ request('state') == '4' ? 'selected' : '' }}>السويس</option>
                                    <option value="5" {{ request('state') == '5' ? 'selected' : '' }}>بورسعيد</option>
                                    <option value="6" {{ request('state') == '6' ? 'selected' : '' }}>دمياط</option>
                                    <option value="7" {{ request('state') == '7' ? 'selected' : '' }}>الدقهلية</option>
                                    <option value="8" {{ request('state') == '8' ? 'selected' : '' }}>كفر الشيخ</option>
                                    <option value="9" {{ request('state') == '9' ? 'selected' : '' }}>الغربية</option>
                                    <option value="10" {{ request('state') == '10' ? 'selected' : '' }}>المنوفية</option>
                                    <option value="11" {{ request('state') == '11' ? 'selected' : '' }}>الشرقية</option>
                                    <option value="12" {{ request('state') == '12' ? 'selected' : '' }}>شمال سيناء</option>
                                    <option value="13" {{ request('state') == '13' ? 'selected' : '' }}>جنوب سيناء</option>
                                    <option value="14" {{ request('state') == '14' ? 'selected' : '' }}>البحر الأحمر</option>
                                    <option value="15" {{ request('state') == '15' ? 'selected' : '' }}>أسيوط</option>
                                    <option value="16" {{ request('state') == '16' ? 'selected' : '' }}>سوهاج</option>
                                    <option value="17" {{ request('state') == '17' ? 'selected' : '' }}>قنا</option>
                                    <option value="18" {{ request('state') == '18' ? 'selected' : '' }}>الأقصر</option>
                                    <option value="19" {{ request('state') == '19' ? 'selected' : '' }}>أسوان</option>
                                    <option value="20" {{ request('state') == '20' ? 'selected' : '' }}>الوادى الجديد</option>
                                    <option value="21" {{ request('state') == '21' ? 'selected' : '' }}>مطروح</option>
                                    <option value="22" {{ request('state') == '22' ? 'selected' : '' }}>البحيرة</option>
                                    <option value="23" {{ request('state') == '23' ? 'selected' : '' }}>المنيا</option>
                                    <option value="24" {{ request('state') == '24' ? 'selected' : '' }}>الفيوم</option>
                                    <option value="25" {{ request('state') == '25' ? 'selected' : '' }}>بني سويف</option>
                                </select>
                            </div>
                            
                            <div class="col-md-3 col-sm-3">
                                <select name="field_id" class="form-control">
                                    <option value="">مجال العمل</option>
                                    @foreach($fields as $field)
                                        <option value="{{ $field->id }}" 
                                            {{ request('field_id') == $field->id ? 'selected' : '' }}>
                                            {{ $field->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <button type="submit" class="btn btn-primary full-width">بحث</button>
                            </div>
                        </form>
						</div>
					</div>
					<!-- Company Searrch Filter End -->
					
					
				
            <div class="item-click">
                @foreach ($jobs as $job)
                    <article>
                        <div class="brows-job-list">
                            <div class="col-md-6 col-sm-6">
                                <div class="item-fl-box">

                                <div class="brows-job-company-img">
                                    <a href="job-detail.html">
                                        <div class="company-image">
                                            <img src="{{ $job->company->image ? asset($job->company->image) : asset('assets/img/default-company.jpg') }}" class="img-responsive" alt="" style="border-radius:50px;"/>
                                        </div>
                                    </a>
                                </div>
                                
                                    <div class="brows-job-position">
                                        <h3><a href="job-detail.html">{{ $job->name }}</a></h3>
                                        <p>
                                            <span>الشركة : {{ $job->company->name }}</span>
                                        </p>
                                        <p>
                                            <span>مجال الوظيفة : {{ $job->field->name }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="brows-job-location">
                                    <p><i class="fa fa-map-marker"></i>{{ $job->location }}</p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="brows-job-link">
                                    <a href="job-detail.html" class="btn btn-default">تقدم للوظيفة</a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!--/.row-->
            <div class="row">
                <div class="col-md-12">
                    <ul class="pagination justify-content-center">
                        <!-- Previous Page Link -->
                        @if ($jobs->onFirstPage())
                            <li class="disabled"><a href="#" aria-disabled="true" class="disabled-link"><i class="ti-arrow-left"></i></a></li>
                        @else
                            <li><a href="{{ $jobs->previousPageUrl() }}"><i class="ti-arrow-left"></i></a></li>
                        @endif

                        <!-- Pagination Elements -->
                        @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                            @if ($page == $jobs->currentPage())
                                <li class="active"><a href="#">{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($jobs->hasMorePages())
                            <li><a href="{{ $jobs->nextPageUrl() }}"><i class="ti-arrow-right"></i></a></li>
                        @else
                            <li class="disabled"><a href="#" aria-disabled="true" class="disabled-link"><i class="ti-arrow-right"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>

		</section>
@endsection