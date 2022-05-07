@extends('frontend.layouts.main')
@section('background')
    style="background-image: url({{ $product['data']['product_info']['image_big'] }})"
@endsection


@section('content')

<div class="position-relative add-to-cart-pressed pb-5">
    {{-- <span class="close-button">
        <img src="{{ asset('assets/images/close.png') }}" alt="">
    </span> --}}
    <div class="">
        <div class="d-flex mt-0 pt-3">
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
                @foreach ($product['data']['product_info']['addons']['addon_category'] as $index => $item)
                    <div class="addon-category mb-4">
                        <div>
                            <h5>{{ $item['cat_name'] }}</h5>
                        </div>
                        @foreach ($item['addons'] as $addons)
                            <div class="row">
                                <div class="col-1">
                                    <input type="checkbox" name="addon_radio_name_{{$index}}" data-addon-id="{{ $addons['addon_id'] }}"
                                        data-addon-price="{{ $addons['addon_price'] }}"
                                        class="form-check-input checkbox dark addonItem" />
                                </div>
                                <div class="col-8 ps-0">
                                    {{ $addons['addon_name'] }}
                                </div>
                                <div class="col-3 text-end">
                                    {{ $addons['addon_price'] }} ريال
                                </div>
                            </div>
                        @endforeach
                        {{-- @foreach ($item['addons'] as $addons)
                            <div class="row">
                                <div class="col-1">
                                    <input type="checkbox" data-addon-id="{{ $addons['addon_id'] }}"
                                        data-addon-price="{{ $addons['addon_price'] }}"
                                        class="form-check-input checkbox dark addonItem" />
                                </div>
                                <div class="col-8 ps-0">
                                    {{ $addons['addon_name'] }}
                                </div>
                                <div class="col-3 text-end">
                                    {{ $addons['addon_price'] }} ريال
                                </div>
                            </div>
                        @endforeach --}}
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
                <button href="javascript:void(0)" id="addToMyCart" class="btn bg-teritary w-100 text-light">
                    اضافة الى السلة
                </button>
            </div>
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
            <button href="javascript:void(0)" id="addToMyCart" class="btn bg-teritary w-100 text-light">
                اضافة الى السلة
            </button>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/lib/OwlCarousel2/dist/owl.carousel.min.js') }}">
        <script src = "assets/lib/OwlCarousel2/dist/owl.carousel.min.js" >
        <script src="{{ asset('vendor/zoom-master/jquery.zoom.min.js') }}" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    </script>
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

            $('#basketBtnArea').removeClass('d-none');






            $('input.addonItem').on('ifChecked', function(event) {
                var addon_id = $(this).data('addon-id');
                var addon_price = $(this).data('addon-price');
                var totalSubPrice = $('#product_price').val();
                priceAfterAddon = parseFloat(totalSubPrice) + parseFloat(addon_price);

                $('#product_price').val(priceAfterAddon);
                handleQuantityPrice();

                $('#addonsForm').append('<input type="hidden" class="addon_input" id="addon_' + addon_id +
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

            var product_price = parseFloat($('#product_price').val());
            $('#productBasketTotalPrice span').html(product_price);


            // add to cart
            $(document).on('click', '#addToMyCart', function() {
                let quantity = $('.counter-number').html();
                // get all the inputs into an array.
                var $inputs = $('#addonsForm :input[name="addon[]"]');

                // not sure if you wanted this, but I thought I'd add it.
                // get an associative array of just the values.
                var addonsValues = [];
                $inputs.each(function(key) {
                    addonsValues.push($(this).val());
                });

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
                        addons: addonsValues,
                    },
                    beforeSend: function() {
                        $('.loader-ready').addClass('loader');
                        $('.loader-ready').removeClass('d-none');
                    },
                    success: function(response) {
                        $('.loader-ready').removeClass('loader');
                        $('.loader-ready').addClass('d-none');
                        if (response.status_code == 200) {
                            localStorage.setItem('count_products', response.count_products);
                            $('#basketBtnArea #price').html(response.count_products);

                            // on success display alert success
                            var BackURL = $('#backURLHref').attr('href');
                            const swalWithBootstrapButtons = Swal.mixin({
                                customClass: {
                                    confirmButton: 'btn btn-sm mx-1 bg-dark text-white',
                                    denyButton: 'btn btn-sm mx-1 bg-dark text-white'
                                },
                                buttonsStyling: false
                            });

                            swalWithBootstrapButtons.fire({
                                title: 'رائع!',
                                text: 'اضفنا منتجك الي السله بنجاح!',
                                icon: 'success',
                                timer: 2000,
                                showCancelButton: false, // There won't be any cancel button
                                showConfirmButton: false, // There won't be any confirm button
                                // showDenyButton: true,
                                // confirmButtonText: "{{ __('app.continueCartPage') }}",
                                // denyButtonText: "{{ __('app.continueshopping') }}",
                            }).then((result) => {

                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location.href = BackURL;
                                }


                            })

                        }
                    },
                });

                return false;
            }); // add to my cart
        });
    </script>
@endsection
