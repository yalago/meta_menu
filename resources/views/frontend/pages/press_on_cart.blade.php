@extends('frontend.layouts.main')
@section('background')
    style="background-image: url({{ $product['data']['product_info']['image_big'] }})"
@endsection


@section('content')
    <div class="position-relative">
        <span class="close-button">
            <img src="assets/images/close.png" alt="">
        </span>
        <div class="d-flex mt-3 pt-5">
            <div class="w-75">
                {{ $product['data']['product_info']['product_name'] }}
            </div>
            <div class="w-25 text-end"> {{ $product['data']['product_info']['price'] }}</div>
        </div>
        <p class="mt-2 pb-2 bottom-border">
            {{ $product['data']['product_info']['product_desc'] }}
        </p>
        @foreach ($product['data']['product_info']['addons']['addon_category'] as $item)
            <div class="">
                <h4 class="text-teritary">{{ $item['cat_choose_type'] }}</h4>
            </div>
            <div class="row">
                <div class="col-1">
                    <input type="checkbox" class="form-check-input checkbox dark" />
                </div>

                @foreach ($item['addons'] as $addons)
                    <div class="col-8">
                        {{ $addons['addon_name'] }}
                    </div>

                    <div class="col-3 text-end">
                        {{ $addons['addon_price'] }}
                    </div>
                @endforeach
            </div>
        @endforeach
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
