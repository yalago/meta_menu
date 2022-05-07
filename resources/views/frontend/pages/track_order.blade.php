@extends('frontend.layouts.main_full')
@section('content')
<div id="" class="">

    @section('page-title')
    تتبع الطلب
    @endsection
    <div class="row">
        <div class="bg-light pt-1 my-4">
        </div>
    </div>
    <h4 class="mb-3">تفاصيل الطلب</h4>
    <div>
        <div class="row mb-3">
            <div class="col-3">
                <img src="{{ asset('assets/images/burger.png') }}" class="rounded-circle" alt="">
            </div>
            <div class="col-6">
                <p>
                    خبز التارتين المحشو بلحم
                </p>
                <span>
                    <span class="text-teritary me-2">الكمية</span>
                    <span>1</span>
                </span>
            </div>
            <div class="col-3 text-end">23 ريال</div>
        </div>
    </div>
    <div class="row">
        <div class="bg-light pt-1 my-4">
        </div>
    </div>
    <h4 class="mb-3">تم استلام الطلب</h4>
    <div class="order-statuses">
        <div class="status-container ">
            <div>
                <span class="bg-dark-gray p-2 rounded-circle status-image-container d-inline-block">
                    <img src="{{ asset('assets/images/order_status/recieved.png') }}" alt="" class="">
                </span>
                <span class="">
                    تم استلام الطلب
                </span>
            </div>
            <span class="status-indicator"></span>
        </div>
        <div class="status-container active">
            <div>
                <span class="bg-dark-gray p-2 rounded-circle status-image-container d-inline-block">
                    <img src="{{ asset('assets/images/order_status/cooking.png') }}" alt="">
                </span>
                <span class="">
                    يتم الطهى
                </span>
            </div>
            <span class="status-indicator"></span>
        </div>
        <div class="status-container">
            <div>
                <span class="bg-dark-gray p-2 rounded-circle status-image-container d-inline-block">
                    <img src="{{ asset('assets/images/order_status/preparing.png') }}" alt="">
                </span>
                <span class="">
                    يتم التنفيذ
                </span>
            </div>
            <span class="status-indicator"></span>
        </div>
        <div class="status-container">
            <div>
                <span class="bg-dark-gray p-2 rounded-circle status-image-container d-inline-block">
                    <img src="{{ asset('assets/images/order_status/ready.png') }}" alt="">
                </span>
                <span class="">
                    الطلب جاهز
                </span>
            </div>
            <span class="status-indicator"></span>
        </div>
        <div class="status-container">
            <div>
                <span class="bg-dark-gray p-2 rounded-circle status-image-container d-inline-block">
                    <img src="{{ asset('assets/images/order_status/delivered.png') }}" alt="">
                </span>
                <span class="">
                    تم التوصيل
                </span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/lib/OwlCarousel2/dist/owl.carousel.min.js') }}"></script>
@endsection
@section('styles')
<link href="{{ asset('assets/lib/OwlCarousel2/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/OwlCarousel2/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
@endsection