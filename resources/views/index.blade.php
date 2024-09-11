@extends('layouts.app')

@section('content')

<div class="clearfix"></div>
        <div class="simple-banner" style="background-image:url({{URL::asset('assets/site/assets/img/bn2.jpg')}});">
            <div class="container">
                <div class="simple-banner-caption">
                    <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1 banner-text">

                        <h1><span>برنامج توظيف الخريجين</span></h1>
                    </div>
                    <h3>جامعة طنطا</h3>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <!-- ====================== How It Work ================= -->
        <section class="how-it-works">
            <div class="container">



                <div class="row">

                    <div class="col-md-3 col-sm-4">
                        <div class="working-process">
                            <span class="process-img">
                                <img src="{{URL::asset('assets/site/assets/img/step-2.png')}}" class="img-responsive" alt="" />
                                <span class="process-num">01</span>
                            </span>
                            <h4> فرصة عمل
                            </h4>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4">
                        <div class="working-process">
                            <span class="process-img">
									<img src="{{URL::asset('assets/site/assets/img/step-2.png')}}" class="img-responsive" alt="" />
									<span class="process-num">02</span>
                            </span>
                            <h4> عدد المسخدمين
                            </h4>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4">
                        <div class="working-process">
                            <span class="process-img">
                                <img src="{{URL::asset('assets/site/assets/img/step-2.png')}}" class="img-responsive" alt="" />
                                <span class="process-num">03</span>
                            </span>
                            <h4>راغب عمل
                            </h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="working-process">
                            <span class="process-img">
                                <img src="{{URL::asset('assets/site/assets/img/step-2.png')}}" class="img-responsive" alt="" />
                                <span class="process-num">03</span>
                            </span>
                            <h4>راغب عمل
                            </h4>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- Latest Blog -->
        <section class="latest-blog section-bg pt-50 pb-30">
            <div class="container">
                <div class="row">
                    <div class="main-heading">
                        <h2>أحدث الاخبار </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="news-latest blog-latest-slider owl-carousel owl-theme owl-rtl owl-loaded">
                            <div class="owl-stage-outer">
                                <div class="owl-stage">
                                    <div class="owl-item cloned">
                                        <div class="single-news ">
                                            <div class="news-head overlay">
                                                <img src="{{URL::asset('assets/site/assets/img/banner-2.jpg')}}" alt="#">
                                                <ul class="news-meta">
                                                    <li class="date"><i class="fa fa-calendar"></i>2023-11-01</li>
                                                </ul>
                                            </div>
                                            <div class="news-body">
                                                <div class="news-content">
                                                    <h3 class="news-title"><a href="">خبر جديد 2023</a></h3>

                                                    <a href="" class="more">المزيد <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 380px; margin-left: 0px;">
                                        <div class="single-news ">
                                            <div class="news-head overlay">
                                                <img src="{{URL::asset('assets/site/assets/img/banner-5.jpg')}}" alt="#">
                                                <ul class="news-meta">
                                                    <li class="date"><i class="fa fa-calendar"></i>2023-11-01</li>
                                                </ul>
                                            </div>
                                            <div class="news-body">
                                                <div class="news-content">
                                                    <h3 class="news-title"><a href="">ggggg</a></h3>

                                                    <a href="" class="more">المزيد <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 380px; margin-left: 0px;">
                                        <div class="single-news ">
                                            <div class="news-head overlay">
                                                <img src="{{URL::asset('assets/site/assets/img/banner-3.jpg')}}" alt="#">
                                                <ul class="news-meta">
                                                    <li class="date"><i class="fa fa-calendar"></i>2022-09-06</li>
                                                </ul>
                                            </div>
                                            <div class="news-body">
                                                <div class="news-content">
                                                    <h3 class="news-title"><a href="">خبر جديد</a></h3>

                                                    <a href="" class="more">المزيد <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 380px; margin-left: 0px;">
                                        <div class="single-news ">
                                            <div class="news-head overlay">
                                                <img src="{{URL::asset('assets/site/assets/img/banner-2.jpg')}}" alt="#">
                                                <ul class="news-meta">
                                                    <li class="date"><i class="fa fa-calendar"></i>2023-11-01</li>
                                                </ul>
                                            </div>
                                            <div class="news-body">
                                                <div class="news-content">
                                                    <h3 class="news-title"><a href="">خبر جديد 2023</a></h3>

                                                    <a href="" class="more">المزيد <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 380px; margin-left: 0px;">
                                        <div class="single-news ">
                                            <div class="news-head overlay">
                                                <img src="{{URL::asset('assets/site/assets/img/banner-3.jpg')}}" alt="#">
                                                <ul class="news-meta">
                                                    <li class="date"><i class="fa fa-calendar"></i>2023-11-01</li>
                                                </ul>
                                            </div>
                                            <div class="news-body">
                                                <div class="news-content">
                                                    <h3 class="news-title"><a href="">ggggg</a></h3>

                                                    <a href="" class="more">المزيد <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 380px; margin-left: 0px;">
                                        <div class="single-news ">
                                            <div class="news-head overlay">
                                                <img src="{{URL::asset('assets/site/assets/img/banner-5.jpg')}}" alt="#">
                                                <ul class="news-meta">
                                                    <li class="date"><i class="fa fa-calendar"></i>2022-09-06</li>
                                                </ul>
                                            </div>
                                            <div class="news-body">
                                                <div class="news-content">
                                                    <h3 class="news-title"><a href="">خبر جديد</a></h3>

                                                    <a href="" class="more">المزيد <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="owl-controls">
                                    <div class="owl-nav">
                                        <div class="owl-prev" style=""><i class="fa fa-angle-left"></i></div>
                                        <div class="owl-next" style=""><i class="fa fa-angle-right"></i></div>
                                    </div>
                                    <div class="owl-dots" style="display: none;"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-50">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                        <div class="text-center">
                            <div class="button">
                                <a href="" class="btn btn-warning">أرشيف الأخبار <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ End Latest Blog -->

        <section style="background: #eee">
            <div class="container">
                <div class="row">
                    <div class="main-heading">
                        <h2>مجالات العمل </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="category-box" data-aos="fade-up">
                            <div class="category-desc">
                                <div class="category-icon"><img class="img-pg" src="{{URL::asset('assets/site/assets/img/صور/AVF5BGUABj7EQk0TD1FidBxX2EoC6HRgIZAnb85q.png')}}" alt=""></i><i class="icon-bargraph abs-icon" aria-hidden="true"></i></div>
                                <div class="category-detail category-desc-text">
                                    <h4> <a href="jobs.html"> التدريب على التعليم
                                    </a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="category-box" data-aos="fade-up">
                            <div class="category-desc">
                                <div class="category-icon"> <img class="img-pg" src="{{URL::asset('assets/img/صور/ItQkbIf68uDnFFCKrpWIsNKQMuucFvGYcItVowSm.png')}}" alt=""></div>
                                <div class="category-detail category-desc-text">
                                    <h4><a href="jobs.html">  الاتصالات السلكية واللاسلكية
                                    </a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="category-box" data-aos="fade-up">
                            <div class="category-desc">
                                <div class="category-icon"><img class="img-pg" src="{{URL::asset('assets/site/assets/img/صور/IxquvJqnBgwP1H5ACobpll7hwxea1o2dAOOW6kxV.png')}}" alt=""></div>
                                <div class="category-detail category-desc-text">
                                    <h4><a href="jobs.html">  التدريب على التعليم </a></h4>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="category-box" data-aos="fade-up">
                            <div class="category-desc">
                                <div class="category-icon"><img class="img-pg" src="{{URL::asset('assets/site/assets/img/صور/pPDV4ve6ZKsAP9plYYMC4XEgVVbd72hZ3N7hR7nH.png')}}" alt=""></div>
                                <div class="category-detail category-desc-text">
                                    <h4> <a href="jobs.html">  برمجة وتصميم مواقع </a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="category-box" data-aos="fade-up">
                            <div class="category-desc">
                                <div class="category-icon"><img class="img-pg" src="{{URL::asset('assets/site/assets/img/صور/Vbjr846HiYFCdhg3Ugzg766rcsKsVQW7u5efcKmf.png')}}" alt=""></div>
                                <div class="category-detail category-desc-text">
                                    <h4> <a href="jobs.html">  المزيد من الوظايف </a>
                                        <a href="#"> </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="category-box" data-aos="fade-up">
                            <div class="category-desc">
                                <div class="category-icon"><img class="img-pg" src="{{URL::asset('assets/site/assets/img/صور/WQxcQKR4MaXqPbNr8xjW4IebFfiAiwtfVTVloFmH.png')}}" alt=""></div>
                                <div class="category-detail category-desc-text">
                                    <h4><a href="jobs.html">مطور مواقع الويب</a> </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="category-box" data-aos="fade-up">
                            <div class="category-desc">
                                <div class="category-icon"><img class="img-pg" src="{{URL::asset('assets/site/assets/img/صور/WQxcQKR4MaXqPbNr8xjW4IebFfiAiwtfVTVloFmH.png')}}" alt=""></div>
                                <div class="category-detail category-desc-text">
                                    <h4> <a href="jobs.html">موبايل ابلكيشن</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="category-box" data-aos="fade-up">
                            <div class="category-desc">
                                <div class="category-icon"><img class="img-pg" src="{{URL::asset('assets/site/assets/img/صور/xoTIG3P53GrgMlDqjNwIUYVLFxUK0YleMLOiS0yV.png')}}" alt=""></div>
                                <div class="category-detail category-desc-text">
                                    <h4> <a href="jobs.html">إدارة أعمال </a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
