@extends('frontend.layouts.main')
@section('background')
style="background-image: url({{ $product['data']['product_info']['image_big'] }})"
@endsection


@section('content')
<div id="" class="spacer">
    <div class="row product_details">
        <div class="col-6">
            <div>
                <h5>{{ $product['data']['product_info']['product_name'] }}</h5>
            </div>
        </div>
        <div class="col-6 text-end d-flex flex-row justify-content-end">
            <a class="bg-teritary  button-size-small center-content rounded-circle show-video"
                data-video_URL="{{ asset('assets/images/video.mp4') }}">
                <img src="{{ asset('assets/images/play.png') }}" alt="">
            </a>
        </div>
        <p class="mt-1">
            {{ $product['data']['product_info']['product_desc'] }}
        </p>

        <div class="">

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
        <div class="row mt-2 bg-dark-gray px-2 py-3 fixed-bottom-addtocart">
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

        <div class="owl-carousel" id="product-carousel">
            <div class="item">
                <img src="{{ asset('assets/images/single-product-thumbnail.png') }}" alt=""
                    class="custom-rounded-border border">
                <p class="small-font">
                    خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري
                </p>
            </div>
            <div class="item">
                <img src="{{ asset('assets/images/single-product-thumbnail.png') }}" alt=""
                    class="custom-rounded-border border">
                <p class="small-font">
                    خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري
                </p>
            </div>
            <div class="item">
                <img src="{{ asset('assets/images/single-product-thumbnail.png') }}" alt=""
                    class="custom-rounded-border border">
                <p class="small-font">
                    خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري
                </p>
            </div>
            <div class="item">
                <img src="{{ asset('assets/images/single-product-thumbnail.png') }}" alt=""
                    class="custom-rounded-border border">
                <p class="small-font">
                    خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري
                </p>
            </div>
            <div class="item">
                <img src="{{ asset('assets/images/single-product-thumbnail.png') }}" alt=""
                    class="custom-rounded-border border">
                <p class="small-font">
                    خبز التارتين المحشو بلحم الحبش المدخن والجبن السويسري
                </p>
            </div>
        </div>

        <div class="custom_modal display-none">
            <div class="custom_modal_content_wrap">
                <div class="custom-modal-header">
                    <span class="close-icon">
                        <img src="{{ asset('assets/images/close.png') }}" alt="">
                    </span>
                </div>
                <div class="custom_modal_content">
                    <video controls>
                        <source src="" type="video/mp4">
                        <source src="" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                </div>
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