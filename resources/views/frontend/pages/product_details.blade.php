@extends('frontend.layouts.main')
@section('background')
style="background-image: url('assets/images/bg2.png')"
@endsection
@section('header')
<div id="header" class="px-2">
    <div class="w-50 text-primary center-content-vertically">
        <div class="me-2 ">
            <div class="position-relative">
                <a id="menu-trigger">
                    <img src="assets/images/rounded-button.png" alt="">
                </a>
                <div id="main-menu" class="position-absolute display-none">
                    <a class="d-block w-100">
                        <img src="assets/images/rounded-button.png" alt="">
                    </a>
                    <a class="d-block w-100">
                        <img src="assets/images/rounded-button.png" alt="">
                    </a>
                </div>

            </div>
        </div>
        <div>
            المنيو
        </div>

    </div>
    <div class="ms-auto w-50">
        <button
            class="btn bg-primary-color w-75 text-primary p-0 d-flex align-items-center ps-2 ms-auto custom-rounded-border">
            رقم الطاوله
            <div class="btn bg-light text-secondary p-2 px-3 ms-auto h-100 inner-button custom-rounded-border">
                32
            </div>
        </button>
    </div>
</div>
@endsection

@section('content')
<div id="" class="">
    <div class="row">
        <div class="col-6">
            <div>
                <h5>منتج جديد</h5>
            </div>
        </div>
        <div class="col-6 text-end d-flex flex-row justify-content-end">
            <a href="" class="bg-teritary button-size-small center-content rounded me-2">
                <img src="assets/images/basket.png" alt="">
            </a>
            <a href="" class="bg-primary-color button-size-small center-content rounded">
                <img src="assets/images/rounded-plus.png" alt="">
            </a>
        </div>
        <p class="mt-1">
            خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري مع صوص الباشاميل والطماطم المجففه يقدم مع الخس وصلصه
            البلسمك
            السعرات الحرارية
        </p>
        <div class="owl-carousel" id="product-carousel">
           <div class="item">
                <img src="assets/images/single-product-thumbnail.png" alt="" class="custom-rounded-border border">
                <p class="small-font">
                    خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري
                </p>
            </div>
            <div class="item">
                <img src="assets/images/single-product-thumbnail.png" alt="" class="custom-rounded-border border">
                <p class="small-font">
                    خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري
                </p>
            </div>
            <div class="item">
                <img src="assets/images/single-product-thumbnail.png" alt="" class="custom-rounded-border border">
                <p class="small-font">
                    خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري
                </p>
            </div>
            <div class="item">
                <img src="assets/images/single-product-thumbnail.png" alt="" class="custom-rounded-border border">
                <p class="small-font">
                    خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري
                </p>
            </div>
            <div class="item">
                <img src="assets/images/single-product-thumbnail.png" alt="" class="custom-rounded-border border">
                <p class="small-font">
                    خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري
                </p>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script src="assets/lib/OwlCarousel2/dist/owl.carousel.min.js"></script>
@endsection
@section('styles')
<link href="assets/lib/OwlCarousel2/dist/assets/owl.carousel.min.css" rel="stylesheet">
<link href="assets/lib/OwlCarousel2/dist/assets/owl.theme.default.min.css" rel="stylesheet">

@endsection