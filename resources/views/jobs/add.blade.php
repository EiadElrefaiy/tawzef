@extends('companies.layouts.app')

@section('content')

    <div class="clearfix"></div>
    
    <!-- Header Title Start -->
    <section class="inner-header-title" style="background-image:url({{URL::asset('assets/site/assets/img/bn2.jpg')}});">
        <div class="container">
            <h1>تعديل الوظيفة</h1>
        </div> 
    </section>
    
    <div class="clearfix"></div>
    
    @include('jobs.form')

    <!-- Include CKEditor script -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    
    <!-- Initialize CKEditor -->
    <script>
        CKEDITOR.replace('description');
    </script>

@endsection
