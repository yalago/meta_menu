@extends('frontend.layouts.main')
@section('background')
style="background-image: url('assets/images/bg1.png')"
@endsection
@section('header')
<div id="header" class="px-2">
    <div class="w-50 text-primary">
        <a class="">
            <img src="assets/images/rounded-button.png" alt="">
        </a>
        المنيو
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
<div id="content-wrap" class="position-absolute mh-50">
    <div id="home-products-list" class="mt-3 px-2">
        <div id="products-categories-slider" class="owl-carousel mb-3 owl-theme">
            <div class="item center-content-vertically border border-1 p-3 custom-rounded-border text-light active-cat-pill"
                data-target="cat-0">
                <img src="assets/images/meal-slice.png" class="me-2" alt="">
                بيتزا
            </div>
            <div class="item center-content-vertically border border-1 p-3 custom-rounded-border text-light"
                data-target="cat-1">
                <img src="assets/images/meal-burger.png" class="me-2" alt="">
                برجر
            </div>
        </div>
        <div id="cat-0" class="product-list-category active-cat">
            @for ($i = 0; $i < 10; $i++) <div class="d-flex py-2 product-in-list">
                <div class="w-25 center-content-vertically ">
                    <img src="assets/images/burger.png" alt="">
                </div>
                <div class="text-light px-3">
                    خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري مع صوص الباشاميلية
                </div>
                <div class="w-25 center-content-vertically actions">
                    <a class=" rounded-circle bg-primary-color mx-1  center-content">
                        <img src="assets/images/basket.png" class="" alt="">
                    </a>
                    <a class=" rounded-circle bg-gray mx-1 center-content">
                        <img src="assets/images/rictangle.png" alt="">
                    </a>
                </div>
        </div>
        @endfor
    </div>

    <div id="cat-1" class="product-list-category">
        @for ($i = 0; $i < 10; $i++) <div class="d-flex py-2 product-in-list">
            <div class="w-25 center-content-vertically ">
                <img src="assets/images/burger.png" alt="">
            </div>
            <div class="text-light px-3">
                خبزا التارتين المحشو بلحم الحبش المدخن والجبن السويسري مع صوص الباشاميلية
            </div>
            <div class="w-25 center-content-vertically actions">
                <a class=" rounded-circle bg-primary-color mx-1  center-content">
                    <img src="assets/images/basket.png" class="" alt="">
                </a>
                <a class=" rounded-circle bg-gray mx-1 center-content">
                    <img src="assets/images/rictangle.png" alt="">
                </a>
            </div>
    </div>
    @endfor
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