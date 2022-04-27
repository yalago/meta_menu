@extends('frontend.layouts.main')
@section('background')
    style="background-image: url({{ url($vendor_info['vendor_cover_img']) }})"
@endsection


@section('content')
    <div id="home-container">
        <div id="home-products-list" class="">
            <div class="home-carousel-container position-fixed rounded w-100 p-2 bg-black">
                <div id="products-categories-slider" class="owl-carousel owl-theme ">
                    @foreach ($categories as $item)
                        <div class="item center-content-vertically border border-1 p-3 custom-rounded-border text-light active-cat-pill"
                            data-target="cat-{{ $item['category_id'] }}">
                            <img src="assets/images/meal-slice.png" class="me-2" alt="">
                            {{ $item['category_name'] }}
                        </div>
                    @endforeach
                </div>
            </div>
            @foreach ($categories as $item)
                <div id="cat-{{ $item['category_id'] }}" class="product-list-category active-cat">
                    @foreach ($products['data']['products_menu'] as $product)
                        <div class="d-flex py-2 product-in-list">
                            <div class="w-25 center-content-vertically   image-video-wrap">
                                <a
                                    href="{{ route('showproductBranch', ['vendor_uuid' => $vendor_uuid, $product['product_id'], 'table_id' => $table_id]) }}">
                                    <img src="{{ $product['image'] }}" alt=""> </a>
                                @if ($product['video'] != null)
                                    <video playsinline controls="false" muted="muted" class="display-none meal-video">
                                        <source src="{{ $product['video'] }}" />
                                    </video>
                                @endif
                            </div>
                            <div class="text-light px-3 center-content-vertically">
                                <a href="{{ route('showproductBranch', ['vendor_uuid' => $vendor_uuid, $product['product_id'], 'table_id' => $table_id]) }}"
                                    class="text-light">
                                    {{ $product['product_name'] }}
                                </a>
                            </div>
                            <div class="w-25 center-content-vertically actions ms-auto">
                                <a class=" rounded-circle bg-primary-color mx-1  center-content add-to-cart-in-list">
                                    <img src="{{ asset('assets/images/basket.png') }}" class="" alt="">
                                </a>
                                @if ($product['video'] != null)
                                    <a class=" rounded-circle bg-gray mx-1 center-content" onclick="togglePlayVideo(this)">
                                        <img src="{{ asset('assets/images/rictangle.png') }}" alt="">
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach


        </div>
    </div>
    <div class="position-relative add-to-cart-pressed display-none">
        <span class="close-button">
            <img src="{{ asset('assets/images/close.png') }}" alt="">
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
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/lib/OwlCarousel2/dist/owl.carousel.min.js') }}"></script>
@endsection
@section('styles')
    <link href="{{ asset('assets/lib/OwlCarousel2/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/OwlCarousel2/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
@endsection
