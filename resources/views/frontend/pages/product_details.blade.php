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

            <input type="hidden" name="prodprice" value="{{ $product['data']['product_info']['price'] }}"
                id="product_price">
            <input type="hidden" name="prodprice" value="{{ $product['data']['product_info']['product_id'] }}"
                id="product_id">
            <div class="">

                <div class="">
                    <h4 class="text-teritary">الاضافات</h4>
                </div>
                <div class="addons-container">
                    @foreach ($product['data']['product_info']['addons']['addon_category'] as $index => $item)
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
                                                    data-addon-id="{{ $addons['addon_id'] }}"
                                                    data-addon-price="{{ $addons['addon_price'] }}"
                                                    class="form-check-input checkbox dark addonHandler addonItem" />
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-1">
                                            <div class="icheckbox">

                                                <input type="checkbox" name="addon_radio_name_{{ $index }}"
                                                    data-addon-id="{{ $addons['addon_id'] }}"
                                                    data-addon-price="{{ $addons['addon_price'] }}"
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


        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/lib/OwlCarousel2/dist/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js" type="text/javascript"></script>
    <script src="{{ asset('vendor/zoom-master/jquery.zoom.min.js') }}" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
@section('styles')
    <link href="{{ asset('assets/lib/OwlCarousel2/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/OwlCarousel2/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
@endsection

@section('csutom_scripts')
    <script>
        $(document).ready(function() {
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
            })
        })
    </script>

    <script>
        $(document).ready(function() {

            $('input.addonItem').on('ifClicked', function(event) {
                if ($(event.target).is(':checked')) {
                    $(event.target).iCheck('uncheck');
                } else {
                    $(event.target).iCheck('check');
                }
            });

            $('input.addonItem').on('ifChecked', function(event) {
                var addon_id = $(this).data('addon-id');
                var addon_price = $(this).data('addon-price');
                var totalSubPrice = $('#product_price').val();
                priceAfterAddon = parseFloat(totalSubPrice) + parseFloat(addon_price);

                $('#product_price').val(priceAfterAddon);
                handleQuantityPrice();

                $('#basketArea').append('<input type="hidden" class="addon_input" id="addon_' + addon_id +
                    '" value="' + addon_id + '" name="addon[]" />');
            });

            // handle total price item with quantity
            function handleQuantityPrice() {
                var quantity = parseInt($('.counter-number').html());
                var itemPrice = $('#product_price').val();
                subPriceBasket = parseFloat(quantity) * parseFloat(itemPrice);
                $('#productBasketTotalPrice span').html(subPriceBasket);
            }

            $('input.addonItem').on('ifUnchecked', function(event) {
                var addon_id = $(this).data('addon-id');
                var addon_price = $(this).data('addon-price');
                var totalSubPrice = $('#product_price').val();
                priceAfterAddon = parseFloat(totalSubPrice) - parseFloat(addon_price);
                $('#product_price').val(priceAfterAddon);
                handleQuantityPrice();
                $('#addon_' + addon_id).remove(); // input
            });

            // counter
            $('.counter .btn-counter:last-of-type').on('click', function(e) {
                counter(this, 'minus');
            });

            $('.counter .btn-counter:first-of-type').on('click', function(e) {
                counter(this, 'plus');
            });


            function counter(btn, status) {
                var countEle = $(btn).parent().find('.counter-number');
                var count = parseInt(countEle.html());
                if (count > 1 && status == 'minus') {
                    count--;
                    countEle.html(count);

                    var currenctPrice = parseFloat($('#productBasketTotalPrice span').html());
                    var product_price = parseFloat($('#product_price').val());
                    var finalPrice = currenctPrice - product_price;
                    $('#productBasketTotalPrice span').html(finalPrice);
                }

                if (status == 'plus') {
                    count++;
                    countEle.html(count);
                    var currenctPrice = parseFloat($('#productBasketTotalPrice span').html());
                    var product_price = parseFloat($('#product_price').val());
                    var finalPrice = currenctPrice + product_price;
                    $('#productBasketTotalPrice span').html(finalPrice);
                }
            }

            // var product_price = parseFloat($('#product_price').val());
            // $('#productBasketTotalPrice span').html(product_price);

            // add to cart
            $('#addToMyCart').on('click', function() {


                let quantity = $('.counter-number').html();
                let addons = $('#basketAreaForm').serializeArray();
                var product_id = "{{ $product['data']['product_info']['product_id'] }}";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // do ajax
                $.ajax({
                    url: "{{ route('addToBasket', ['vendor_uuid' => $vendor_uuid, 'product_id' => $product['data']['product_info']['product_id']]) }}",
                    type: "POST",
                    data: {
                        quantity: quantity,
                        table_id: "{{ request()->table_id }}",
                        addons: addons,
                    },
                    beforeSend: function() {
                        $('.loader-ready').addClass('loader');
                        $('.loader-ready').removeClass('d-none');
                    },
                    success: function(response) {
                        $('.loader-ready').removeClass('loader');
                        $('.loader-ready').addClass('d-none');
                        console.log();
                        if (response.status.HTTP_code == 200) {
                            // on success display alert success
                            // remove any data
                            localStorage.setItem('count_products', response.count_products);
                            $('#basketBtnArea #price').html(response.count_products);

                            const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-sm my-1 mx-1 btn-dark text-white',
                                    denyButton: 'btn btn-sm my-1 mx-1 btn-dark text-white'
                                },
                                buttonsStyling: false
                            });

                            swalWithBootstrapButtons.fire({
                                title: "{{ __('app.awesome') }}",
                                text: "{{ __('app.action_in_basket') }}",
                                icon: 'success',
                                timer: 2000,
                                showCancelButton: false, // There won't be any cancel button
                                showConfirmButton: false, // There won't be any confirm button
                                // showDenyButton: true,
                                // confirmButtonText: "{{ __('app.continueCartPage') }}",
                                // denyButtonText: "{{ __('app.continueshopping') }}",
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    $('#productInfo_' + product_id).modal('hide');
                                }

                            });
                        }
                    },
                });

                return false;
            }); // add to my cart
        })
    </script>
@endsection
