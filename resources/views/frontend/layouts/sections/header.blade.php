<div id="header" class="px-2">
    <div class="w-50 text-primary center-content-vertically">
        <div class="me-2 ">
            <div class="position-relative">
                <a id="menu-trigger" onclick="history.back()">
                    <img src="{{ asset('assets/images/right-arrow.png') }}" alt="">
                </a>              
            </div>
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
