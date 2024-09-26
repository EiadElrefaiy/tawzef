@extends('graduations.layouts.app')

@section('content')

        <!-- End Navigation -->
        <div class="clearfix"></div>

        <!-- Title Header Start -->
        <section class="inner-header-title" style="background-image:url({{URL::asset('assets/site/assets/img/bn2.jpg')}});">

        </section>
        <div class="clearfix"></div>
        <!-- Title Header End -->

        <!-- Candidate Profile Start -->
        <section class="detail-desc">
            <div class="container">

                <div class="ur-detail-wrap top-lay" style="display: block; padding-botton:10px;">

                    @include('graduations.components.detials-section');

                    <br>
                    <br>
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
                            <div class="col-md-7 col-sm-7">
                                <div class="detail-pannel-footer-btn pull-left">
                                    <a href="{{route('graduation.info')}}" class="footer-btn blu-btn" title="">أكمل بياناتك</a>
                                    <a href="graduate-cv.html" class="footer-btn blu-btn" title="">الملف الشخصي</a>
                                </div>

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
                        <h2>وظائف قد تهمك‎ </h2>
                    </div>
                </div>
                <!-- Company Searrch Filter End -->



                <div class="item-click">
                    <article>
                        <div class="brows-job-list">
                            <div class="col-md-6 col-sm-6">
                                <div class="item-fl-box">
                                    <div class="brows-job-company-img">
                                        <a href="job-detail.html"><img src="{{URL::asset('assets/site/assets/img/com-1.jpg')}}" class="img-responsive" alt="" /></a>
                                    </div>
                                    <div class="brows-job-position">
                                        <h3><a href="job-detail.html">الوظيفة</a></h3>
                                        <p>
                                            <span>اسم الشركة</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="brows-job-location">
                                    <p><i class="fa fa-map-marker"></i>العنوان</p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="brows-job-link">
                                    <a href="job-detail.html" class="btn btn-default">تقدم للوظيفة</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="item-click">
                    <article>
                        <div class="brows-job-list">
                            <div class="col-md-6 col-sm-6">
                                <div class="item-fl-box">
                                    <div class="brows-job-company-img">
                                        <a href="job-detail.html"><img src="{{URL::asset('assets/site/assets/img/com-1.jpg')}}" class="img-responsive" alt="" /></a>
                                    </div>
                                    <div class="brows-job-position">
                                        <h3><a href="job-detail.html">الوظيفة</a></h3>
                                        <p>
                                            <span>اسم الشركة</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="brows-job-location">
                                    <p><i class="fa fa-map-marker"></i>العنوان</p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="brows-job-link">
                                    <a href="job-detail.html" class="btn btn-default">تقدم للوظيفة</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="item-click">
                    <article>
                        <div class="brows-job-list">
                            <div class="col-md-6 col-sm-6">
                                <div class="item-fl-box">
                                    <div class="brows-job-company-img">
                                        <a href="job-detail.html"><img src="{{URL::asset('assets/site/assets/img/com-1.jpg')}}" class="img-responsive" alt="" /></a>
                                    </div>
                                    <div class="brows-job-position">
                                        <h3><a href="job-detail.html">الوظيفة</a></h3>
                                        <p>
                                            <span>اسم الشركة</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="brows-job-location">
                                    <p><i class="fa fa-map-marker"></i>العنوان</p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="brows-job-link">
                                    <a href="job-detail.html" class="btn btn-default">تقدم للوظيفة</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>



            </div>
        </section>
        <!-- ========== Begin: Brows job End ===============  -->

@endsection
