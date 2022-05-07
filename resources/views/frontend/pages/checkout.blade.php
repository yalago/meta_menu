@extends('frontend.layouts.main_full')
@section('content')
<div id="">
    <h4 class="mb-3">وسيلة الدفع</h4>
    <div class="justify-content-between d-flex mb-3">
        <div class="me-2">
            <div class="center-content rounded h-100 w-100 px-3 py-2 small-font primary-border">
                دفع عند الاستلام
            </div>
        </div>
        <div class="me-2">
            <div class="center-content rounded h-100 w-100 px-3 py-2 small-font primary-border">
                <img src="{{ asset('assets/images/visa.png') }}" class="me-2" alt="">
                فيزا
            </div>
        </div>
        <div class="">
            <div class="center-content rounded h-100 w-100 px-3 py-2 small-font primary-border">
                <img src="{{ asset('assets/images/knet.png') }}" class="me-2" alt="">
                كى نت
            </div>
        </div>
    </div>
    <h4 class="mb-3">ملخص الطلب</h4>
    <div class="row">
        <div class="col-6 mb-2">
            الاجمالى
        </div>
        <div class="col-6 text-end">23 ريال</div>
        <div class="col-6 mb-2">الضرائب</div>
        <div class="col-6 text-end">23 ريال</div>
        <hr class="my-2">
        <div class="col-6 mb-2">الاجمالى</div>
        <div class="col-6 text-end">23 ريال</div>
    </div>
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
</div>
<button id="confrim-order" class="btn bg-teritary text-light position-absolute">
    تأكيد الطلب
</button>@endsection