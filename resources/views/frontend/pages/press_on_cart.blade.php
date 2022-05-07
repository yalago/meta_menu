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
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/lib/OwlCarousel2/dist/owl.carousel.min.js') }}">
    <script>
        $('.counter .btn-counter:last-of-type').on('click', function(e) {
            counter(this, 'minus');
        });

        $('.counter .btn-counter:first-of-type').on('click', function(e) {
            counter(this, 'plus');
        });

        function counter(btn, status) {

            var countEle = $(btn).parent().find('.counter-number');
            var bpid = $(btn).parent().find('.counter-number').data('bpid');
            var one_product_price = parseFloat($(btn).parent().find('.counter-number').data('one_product_price'));

            var count = parseInt(countEle.html());

            var itemTotalPrice = parseFloat($('#basket_item_' + bpid + ' .item-price').html());


            if (count > 1 && status == 'minus') {
                count--;
                countEle.html(count);

                itemTotalPrice = itemTotalPrice - one_product_price;
                $('#basket_item_' + bpid + ' .item-price').html(itemTotalPrice);
            }

            if (status == 'plus') {
                count++;
                countEle.html(count);

                itemTotalPrice = parseFloat(itemTotalPrice + one_product_price);
                $('#basket_item_' + bpid + ' .item-price').html(itemTotalPrice);
            }


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // do ajax
            $.ajax({
                url: "/",
                type: "POST",
                data: {
                    table_id: "{{ request()->table_id }}",
                    item_basket: bpid,
                    quantity: count,
                },
                beforeSend: function() {
                    $('.loader-ready').addClass('loader');
                    $('.loader-ready').removeClass('d-none');
                },
                success: function(response) {
                    $('.loader-ready').removeClass('loader');
                    $('.loader-ready').addClass('d-none');

                },
            });


            // update cart final price
            finalTotal = 0;
            $('.item-price').each(function(index, element) {
                finalTotal += parseFloat($(this).text());
            });
            $('.finalTotalCartPrice').html(finalTotal);
            localStorage.setItem('total_price_basket', finalTotal);
            // remove from basket
            $('.removeFromMyBasket').on('click', function() {
                var itemBasket = $(this).data('basket-item-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        // do ajax
                        $.ajax({
                            url: "/",
                            type: "POST",
                            data: {
                                item_basket_id: itemBasket,
                                table_id: "{{ request()->table_id }}",
                            },
                            beforeSend: function() {
                                $('.loader-ready').addClass('loader');
                                $('.loader-ready').removeClass('d-none');
                            },
                            success: function(response) {
                                $('.loader-ready').removeClass('loader');
                                $('.loader-ready').addClass('d-none');
                                if (response.status_code == 200) {
                                    // on success display alert success
                                    $('#basket_item_' + itemBasket).hide(500);

                                    // replus
                                    itemTotalPrice = parseFloat($('#basket_item_' + itemBasket +
                                        ' .item-price').html());
                                    finalTotalCartPrice = parseFloat($('.finalTotalCartPrice')
                                        .html());
                                    $('.finalTotalCartPrice').html(parseFloat(
                                        finalTotalCartPrice -
                                        itemTotalPrice));
                                    localStorage.setItem('total_price_basket', parseFloat(
                                        finalTotalCartPrice - itemTotalPrice));
                                    // var quantity = localStorage.getItem('count_products');
                                    var count_products = localStorage.getItem('count_products');
                                    //    var count_products     = localStorage.setItem('count_products');
                                    localStorage.setItem('count_products', count_products - 1);

                                    //   localStorage.removeItem('count_products');


                                }
                            },
                        });
                    }
                })
                return false;
            }); // remove from my basket


        }
</script>
<script src="assets/lib/OwlCarousel2/dist/owl.carousel.min.js"></script>
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