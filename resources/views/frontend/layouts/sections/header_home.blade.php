<div id="header" class="px-2 flex-column">
    <div class="d-flex ">
        <div class="w-50 text-primary center-content-vertically">
            <div class="me-2 ">
                <div class="position-relative">
                    <a id="menu-trigger">
                        <img src="{{ asset('assets/images/rounded-button.png') }}" alt="">
                    </a>
                    <div id="main-menu" class="position-absolute display-none">
                        <a class="d-block w-100 mt-2">
                            <img src="{{ asset('assets/images/rounded-button.png') }}" alt="">
                        </a>
                        <a class="d-block w-100 mt-2">
                            <img src="{{ asset('assets/images/rounded-button.png') }}" alt="">
                        </a>
                    </div>

                </div>
            </div>
            <div>
                المنيو
            </div>

        </div>
        <div class="ms-auto w-50">
            <button
                class="btn bg-primary-color text-primary p-0 d-flex align-items-center ps-2 ms-auto custom-rounded-border">
                رقم الطاوله
                <div class="btn bg-light text-secondary ms-1 p-2 px-3 h-100 inner-button custom-rounded-border">
                    {{ $table_number }}
                </div>
            </button>

        </div>
    </div>
    <div class="d-flex justify-content-end">
        <div class="rounded-circle bg-teritary d-flex justify-content-center align-items-center p-2 mt-2 ms-auto">
            <a href="{{ route('checkout', ['vendor_uuid' => $vendor_uuid, 'table_id' => $table_id]) }}">
                <img src="{{ asset('assets/images/basket.png') }}" alt="">
            </a>
        </div>
    </div>
</div>
<script>
    window.window.homeURL='/gerizapaints/menu/556/1'
</script>