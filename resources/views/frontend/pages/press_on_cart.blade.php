@extends('frontend.layouts.main')
@section('background')
style="background-image: url('assets/images/bg2.png')"
@endsection


@section('content')
<div class="position-relative">
    <span class="close-button">
        <img src="assets/images/close.png" alt="">
    </span>
    <div class="d-flex mt-3 pt-5">
        <div class="w-75">
            كروك ميسيو
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