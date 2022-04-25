@extends('frontend.layouts.main')
@section('background')
style="background-image: url('assets/images/bg1.png')"
@endsection


@section('content')
<div id="home-container">
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
                    <a href="/product_details">
                        <img src="assets/images/burger.png" alt=""> </a>
                    <video playsinline controls="false" muted="muted" class="display-none meal-video">
                        <source src="assets/images/video.mp4" type="video/mp4" />
                    </video>
                </div>
                <div class="text-light px-3">
                    <a href="/product_details" class="text-light">
                        خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري مع صوص الباشاميلية
                    </a>
                </div>
                <div class="w-25 center-content-vertically actions">
                    <a class=" rounded-circle bg-primary-color mx-1  center-content add-to-cart-in-list">
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
                <a class="rounded-circle bg-primary-color mx-1  center-content add-to-cart-in-list">
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
</div>
<div class="position-relative add-to-cart-pressed display-none">
    <span class="close-button">
        <img src="assets/images/close.png" alt="">
    </span>
    <div class="d-flex mt-3 pt-5">
        <div class="w-75">
            <a href="/product-details">
                كروك ميسيو</a>
        </div>
        <div class="w-25 text-end">23 ريال</div>
    </div>
    <p class="mt-2 pb-2 bottom-border">
        خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري مع صوص الباشاميل والطماطم المجففه يقدم مع الخس وصلصه
        البلسمك
        السعرات الحرارية
    </p>
    <div class="">
        <h4 class="text-teritary">الاضافات</h4>
    </div>
    <div class="row">
        <div class="col-1">
            <input type="checkbox" class="form-check-input checkbox dark" />
        </div>
        <div class="col-8">
            جبنة بالمكسرات
        </div>
        <div class="col-3 text-end">
            23 ريال
        </div>
    </div>
    <div class="row mt-2 bg-dark-gray px-2 py-3">
        <div class="col-6 flex-row d-flex center-content-vertically">
            <span class="increment-decrement increment  text-light bg-dark center-content mx-1 rounded">
                +
            </span>
            <span class="center-content mx-3">5</span>
            <span class="increment-decrement decrement text-light bg-dark center-content mx-1 rounded">
                -
            </span>
        </div>
        <div class="col-6 center-content-vertically">
            <button class="btn bg-teritary w-100 text-light">
                اضافة الى السلة
            </button>
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