@extends('frontend.layouts.main_full')
@section('content')
<div id="" class="">

    <div class="w-50 m-auto mb-3 text-center mt-5">
        <img src="{{ asset('assets/images/congratulations.png') }}" class="w-100 mb-3" alt="">
        <div>لقد تم طلبك بنجاح</div>
    </div>
</div>
<div class="d-flex">
    <div class="w-50 pe-2">
        <button id="" class="btn bg-teritary text-light w-100">
            العوده للرئيسية
        </button>
    </div>
    <div class="w-50 ps-2">
        <button id="" class="btn bg-primary-color text-light w-100">
            تتبع الطلب
        </button>
    </div>
</div>


@endsection