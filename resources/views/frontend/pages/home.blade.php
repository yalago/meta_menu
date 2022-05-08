@extends('frontend.layouts.home')
@section('background')
style="background-image: url({{ url($vendor_info['vendor_cover_img']) }})"
@endsection


@section('content')
<div id="home-container">
    <div id="home-products-list" class="">
        <div class="home-carousel-container position-sticky  w-100 py-2 bg-black">
            <div id="products-categories-slider" class="owl-carousel owl-theme ">
                @foreach ($categories as $item)
                <div class="item center-content-vertically border border-1 px-3 py-2 custom-rounded-border text-light active-cat-pill"
                    data-target="cat-{{ $item['category_id'] }}">
                    <img src="{{ asset('assets/images/meal-slice.png') }}" class="me-2" alt="">
                    {{ $item['category_name'] }}
                </div>
                @endforeach
            </div>
        </div>
        <div class="categories-container">
            @foreach ($categories as $item)
            <div id="cat-{{ $item['category_id'] }}" class="product-list-category active-cat">
                @foreach ($products['data']['products_menu'] as $product)
                <div class="d-flex py-2 product-in-list">
                    <div class="center-content-vertically image-video-wrap">
                        <a
                            href="{{ route('showproductBranch', ['vendor_uuid' => $vendor_uuid, $product['product_id'], 'table_id' => $table_id]) }}">
                            <img src="{{ $product['image'] }}" alt="" class="rounded-circle"> </a>
                        @if ($product['video'] != null)
                        <video playsinline controls="false" muted="muted" class="display-none meal-video">
                            <source src="{{ $product['video'] }}" />
                        </video>
                        @endif
                    </div>
                    <div class="text-light px-2 center-content-vertically">
                        <a href="{{ route('showproductBranch', ['vendor_uuid' => $vendor_uuid, $product['product_id'], 'table_id' => $table_id]) }}"
                            class="text-light">
                            {{ $product['product_name'] }}
                        </a>
                    </div>
                    <div class=" center-content-vertically actions ms-auto">
                        <a class="mx-1 center-content add-to-cart-in-list"
                            data-product-id="{{ $product['product_id'] }}">
                            <img src="{{ asset('assets/images/basket.png') }}" class="w-100" alt="">
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
    <div class="row add-to-cart-pressed display-none pt-2 pb-5">
        <span class="close-button">
            <img src="{{ asset('assets/images/close.png') }}" alt="">
        </span>
        <div id="loaded-product"></div>
    </div>

</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/lib/OwlCarousel2/dist/owl.carousel.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
@section('styles')
<link href="{{ asset('assets/lib/OwlCarousel2/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/OwlCarousel2/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
@endsection
@section('csutom_scripts')
<script>
    $(document).ready(function () {
    $('#products-categories-slider').owlCarousel({
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
    
    $('.add-to-cart-in-list').on('click',function () {
        let productId=$(this).attr('data-product-id');
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            // do ajax
            $.ajax({
            url: "{{ route('loadProduct', ['vendor_uuid' => $vendor_uuid,'table_id'=>$table_id]) }}",
            type: "GET",
            data: {
            product_id: productId,
            table_id: "{{ request()->table_id }}",
            },
            beforeSend: function() {
            $('.loader-ready').addClass('loader');
            $('.loader-ready').removeClass('d-none');
            },
            success: function(response) {
            $('.loader-ready').removeClass('loader');
            $('.loader-ready').addClass('d-none');
            console.log();
            if (response) {
            // on success display alert success
            // remove any data
            // localStorage.setItem('count_products', response.count_products);
            $('#loaded-product').html(response);
            $('#home-products-list').slideToggle();
            $('.add-to-cart-pressed').show();
            // const swalWithBootstrapButtons = Swal.mixin({
            // customClass: {
            // confirmButton: 'btn btn-sm my-1 mx-1 btn-dark text-white',
            // denyButton: 'btn btn-sm my-1 mx-1 btn-dark text-white'
            // },
            // buttonsStyling: false
            // });
            
         
            
            }
            },
            });
    })
    
    })
</script>
@endsection