@extends('frontend.layouts.main')
@section('background')
style="background-image: url({{ $product['data']['product_info']['image_big'] }})"
@endsection


@section('content')

<div class="position-relative add-to-cart-pressed">
    {{-- <span class="close-button">
        <img src="{{ asset('assets/images/close.png') }}" alt="">
    </span> --}}
    <div class="">
        <div class="d-flex mt-0 pt-5">
            <div class="w-75">
                <h4>
                    {{ $product['data']['product_info']['product_name'] }}
                </h4>
            </div>
            <div class="w-25 text-end">
                {{ $product['data']['product_info']['price'] }}
            </div>
        </div>
        <p class="mt-2 pb-2 bottom-border">
            {{ $product['data']['product_info']['product_desc'] }}
        </p>
        <div class="">
            <h4 class="text-teritary">الاضافات</h4>
        </div>
        <div class="addons-container">
            @foreach ($product['data']['product_info']['addons']['addon_category'] as $item)
            <div class="addon-category mb-4">
                <div>
                    <h5>{{ $item['cat_name'] }}</h5>
                </div>
                @foreach($item['addons'] as $addons)

                <div class="row">
                    <div class="col-1">
                        <input type="checkbox" class="form-check-input checkbox dark" />
                    </div>
                    <div class="col-8 ps-0">
                        {{ $addons['addon_name'] }}
                    </div>
                    <div class="col-3 text-end">
                        {{ $addons['addon_price'] }} ريال
                    </div>
                </div>

                @endforeach
                @foreach($item['addons'] as $addons)

                <div class="row">
                    <div class="col-1">
                        <input type="checkbox" class="form-check-input checkbox dark" />
                    </div>
                    <div class="col-8 ps-0">
                        {{ $addons['addon_name'] }}
                    </div>
                    <div class="col-3 text-end">
                        {{ $addons['addon_price'] }} ريال
                    </div>
                </div>

                @endforeach
            </div>
            @endforeach
        </div>
    </div>
    <div class="row mt-2 bg-dark-gray px-2 py-3">
        <div class="col-6 flex-row d-flex center-content-vertically">
            <span class="increment-decrement increment  text-light bg-dark center-content mx-1 rounded">
                +
            </span>
            <span class="center-content mx-3 product-quantity">1</span>
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
<script src="{{ asset('assets/lib/OwlCarousel2/dist/owl.carousel.min.js') }}"></script>
@endsection
@section('styles')
<link href="{{ asset('assets/lib/OwlCarousel2/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/OwlCarousel2/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
@endsection
@section('csutom_scripts')
<script>
    $(document).ready(function () {
    $('#product-carousel').owlCarousel({
    // loop: true,
    margin: 10,
    responsiveClass: true,
    navigation: false,
    rtl: true,
    responsive: {
    0: {
    items: 3,
    nav: true
    },
    600: {
    items: 3,
    nav: false
    },
    1000: {
    items: 5,
    nav: true,
    loop: false
    }
    },
    })})
</script>
@endsection