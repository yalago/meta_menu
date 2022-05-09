<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\App;

class MenuBranchController extends vendorAuthController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function branch($vendor_uuid, $table_id)
    {

        // add a new session handler
        $client  = new Client();
        $response  = $client->request('post', $this->ApiUrl . "table-session", [
            'verify' => false,
            'headers' => [
                'Language' => session()->get('lang')
            ],
            'form_params' => [
                "table_id" => request()->table_id,
            ]
        ]);

        // $url = $this->ApiUrl . "table?table_id=" . $table_id;
        // $client  = new Client();
        // $response  = $client->request('get', $url, [
        //     'verify' => false,
        //     'headers' => [
        //         'Language' => session()->get('lang')
        //     ]
        //
        // ]);
        // $category = ($response->getBody());
        // $category = json_decode($category, true);
        $category    = $this->categoriesBranch;
        $vendor_info = $this->vendor_info;
        $social      = $this->social;
        $pixel = $this->pixel;

        //category_id}/{table_id
        return redirect(route('productCategoryBranch', ['vendor_uuid' => $this->vendor_uuid, 'category_id' => $category[0]['category_id'], 'table_id' => request()->table_id, 'language' => session()->get('lang')]));

        return view('branch', compact(['category', 'vendor_info', 'social', 'vendor_uuid', 'pixel']));
    }
    public function category($vendor_uuid, $table_id)
    {
        $url = $this->ApiUrl . "table?table_id=" . $table_id;
        $client  = new Client();
        $response  = $client->request('get', $url, [
            'verify' => false,
            'headers' => [
                'Language' => session()->get('lang'),

            ]
        ]);
        $category = ($response->getBody());
        $category = json_decode($category, true);
        $cat = $category['data']['menu_categories'];
        $vendor_info = $this->vendor_info;
        $social = $this->social;
        return response()->json([$cat]);
    }

    public function productCategoryBranch(Request $request, $vendor_uuid, $language, $category_id, $table_id)
    {
        $status = in_array($language, ['ar', 'en']);
        $lang = $status ? $language : 'ar';
        App::setLocale($lang);
        $request->session()->put('lang', $lang);
        $page_id = request('page_id') ?? 1;
        $vendor_uuid = $this->vendor_uuid;
        $url = $this->ApiUrl . "menu/Branch?table_id=" . $table_id . "&category_id=" . $category_id . '&page=' . $page_id;
        $client  = new Client();
        $response  = $client->request('get', $url, [
            'verify' => false,
            'headers' => [
                'Language' => session()->get('lang')
            ]
        ]);
        $vendor_info = $this->vendor_info;
        $product = ($response->getBody());
        $products = json_decode($product, true);
        // $popup = $product['data']['pop_up'];
        if (request()->ajax()) {
            $sortType = request('sortType') ? request('sortType') :  'grid';
            $returnHTML = view('ajax.productBranch')->with(['sortType' => $sortType, 'product' => $product, 'vendor_uuid' => $vendor_uuid, 'vendor_info' => $vendor_info])->render();
            return response()->json(array('success' => true, 'html' => $returnHTML, 'popup' => $popup));
        }
        $social = $this->social;
        $pixel = $this->pixel;
        $categories = $this->categoriesBranch;
        $table_number = $this->table_number['tableNumber'];
        return view('frontend.pages.home', compact(['products', 'vendor_uuid', 'categories', 'table_number', 'category_id', 'social', 'vendor_info', 'pixel', 'table_id']));
    }
    public function product()
    {
        $vendor_uuid = request()->vendor_uuid;
        $product_id = request()->product_id;
        $url = $this->ApiUrl . "product-info?product_id=$product_id";
        $client  = new Client();
        $response  = $client->request('get', $url, [
            'verify' => false,
            'headers' => [
                'Language' => session()->get('lang')
            ]
        ]);
        $pixel = $this->pixel;
        $social = $this->social;
        $product = ($response->getBody());
        $product = json_decode($product, true);
        $vendor_info = $this->vendor_info;
        $table_number = $this->table_number['tableNumber'];

        return view('frontend.pages.product_details', compact(['table_number', 'product', 'vendor_uuid', 'vendor_info', 'social', 'pixel']));
    }
    public function checkout()
    {
        return view('frontend.pages.checkout');
    }
    public function congratulations()
    {
        return view('frontend.pages.congratulations');
    }
    public function track_order()
    {
        return view('frontend.pages.track_order');
    }

    public function loadProduct()
    {
        $vendor_uuid = request()->vendor_uuid;
        $product_id = request()->product_id;
        $url = $this->ApiUrl . "product-info?product_id=$product_id";
        $client  = new Client();
        $response  = $client->request('get', $url, [
            'verify' => false,
            'headers' => [
                'Language' => session()->get('lang')
            ]
        ]);
        $product = ($response->getBody());
        $loaded_product = json_decode($product, true);
        $vendor_uuid = request()->vendor_uuid;

        return view('frontend.pages.product_template', compact(['loaded_product', 'vendor_uuid']));
    }
}
