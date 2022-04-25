<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function home()
    {
        return view('frontend.pages.home');
    }

    public function pressOnCart()
    {
        return view('frontend.pages.press_on_cart');
    }
    public function product_details()
    {
        return view('frontend.pages.product_details');
    }
}
