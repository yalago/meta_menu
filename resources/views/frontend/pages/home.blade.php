@extends('frontend.layouts.main')
@section('background')
style="background-image: url('assets/images/bg1.png')"
@endsection


@section('content')
<div id="home-products-list" class="mt-3 ">
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
            <div class="w-25 center-content-vertically   image-video-wrap">
                <img src="assets/images/burger.png" alt="">
                <video playsinline controls="false" muted="muted" class="display-none meal-video">
                    <source src="assets/images/video.mp4" type="video/mp4" />
                </video>
            </div>
            <div class="text-light px-3">
                خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري مع صوص الباشاميلية
            </div>
            <div class="w-25 center-content-vertically actions">
                <a class=" rounded-circle bg-primary-color mx-1  center-content">
                    <img src="assets/images/basket.png" class="" alt="">
                </a>
                <a class=" rounded-circle bg-gray mx-1 center-content" onclick="togglePlayVideo(this)">
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
            <a class="rounded-circle bg-gray mx-1 center-content">
                <img src="assets/images/rictangle.png" alt="">
            </a>
        </div>
</div>
@endfor
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