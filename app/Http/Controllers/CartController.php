<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CartController extends vendorAuthController
{
    public function index(Request $request)
    {

        $table_id = $request->table_id;
        $vendor_uuid = $request->vendor_uuid;
        $vendor_info = $this->vendor_info;
        $social = $this->social;

        // get all items in my basket of this table
        $url = $this->ApiUrl . "basket-table?table_id=" . $table_id;
        $client  = new Client();
        $response  = $client->request('get', $url, [
            'verify' => false,
            'headers' => [
                'Language' => session()->get('lang')
            ]
        ]);
        $products = ($response->getBody());
        $products = json_decode($products, true);

        $pixel = $this->pixel;
        if (request()->ajax()) {
            return response()->json(array('success' => true, 'products' => $products));
        }
        return view('frontend.pages.checkout', compact(['products', 'vendor_info', 'social', 'vendor_uuid', 'pixel']));
    }
    public function indexMenu(Request $request)
    {
        // $table_id = $request->table_id;
        $vendor_uuid = $request->vendor_uuid;
        $vendor_info = $this->vendor_info;
        $social = $this->social;
        $token = $request->session()->get('_token');
        // get all items in my basket of this table
        $url = $this->ApiUrl . "basket-menu?session_token=" . $token;
        $client  = new Client();
        $response  = $client->request('get', $url, [
            'verify' => false,
            'headers' => [
                'Language' => \LaravelLocalization::getCurrentLocale()
            ]
        ]);
        $products = ($response->getBody());
        $products = json_decode($products, true);
        $pixel = $this->pixel;
        return view('cartMenu', compact(['products', 'vendor_info', 'social', 'vendor_uuid', 'pixel']));
    }
}
