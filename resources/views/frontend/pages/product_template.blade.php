<div class="col-6">
    <div>
        <h5>{{ $loaded_product['data']['product_info']['product_name'] }}</h5>
    </div>
</div>
{{-- <div class="col-6 text-end d-flex flex-row justify-content-end">
    <a class="bg-teritary  button-size-small center-content rounded-circle show-video"
        data-video_URL="{{ asset('assets/images/video.mp4') }}">
        <img src="{{ asset('assets/images/play.png') }}" alt="">
    </a>
</div> --}}

<p class="mt-1">
    {{ $loaded_product['data']['product_info']['product_desc'] }}
</p>

<input type="hidden" name="prodprice" value="{{ $loaded_product['data']['product_info']['price'] }}" id="product_price">
<input type="hidden" name="prodprice" value="{{ $loaded_product['data']['product_info']['product_id'] }}" id="product_id">
<div class="">

    <div class="">
        <h4 class="text-teritary">الاضافات</h4>
    </div>
    <div class="addons-container">
        @foreach ($loaded_product['data']['product_info']['addons']['addon_category'] as $index => $item)
        <div class="addon-category mb-4">
            <div>
                <h5>{{ $item['cat_name'] }}</h5>
            </div>
            @foreach ($item['addons'] as $addons)
            <div class="row">
                @if ($item['cat_choose_type'] == 'single')
                <div class="col-1">
                    <div class="iradio">

                        <input type="checkbox" name="addon_radio_name_{{ $index }}"
                            data-addon-id="{{ $addons['addon_id'] }}" data-addon-price="{{ $addons['addon_price'] }}"
                            class="form-check-input checkbox dark addonHandler addonItem" />
                    </div>
                </div>
                @else
                <div class="col-1">
                    <div class="icheckbox">

                        <input type="checkbox" name="addon_radio_name_{{ $index }}"
                            data-addon-id="{{ $addons['addon_id'] }}" data-addon-price="{{ $addons['addon_price'] }}"
                            class="form-check-input checkbox dark addonHandler addonItem" />
                    </div>
                </div>
                @endif
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


    <div class="col-6 flex-row d-flex center-content-vertically counter">

        <span class="increment-decrement increment  text-light bg-dark center-content mx-1 rounded">
            +
        </span>
        <span class="center-content mx-3 product-quantity counter-number">1</span>
        <span class="increment-decrement decrement text-light bg-dark center-content mx-1 rounded">
            -
        </span>
    </div>
    <div class="col-6 center-content-vertically">
        <button href="javascript:void(0)" id="addToMyCart" class="btn bg-teritary w-100 text-light">
            اضافة الى السلة
        </button>
    </div>
</div>

{{-- <div class="owl-carousel" id="product-carousel">
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
</div> --}}

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