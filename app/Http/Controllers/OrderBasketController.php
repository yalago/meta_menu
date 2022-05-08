<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OrderBasketController extends vendorAuthController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkCoupon(Request $request)
    {

        $url = $this->ApiUrl . "coupon/check";
        if ($request->coupon_type == 'qitaf')
            $url = $this->ApiUrl . "coupon-qitaf/check";


        $client  = new Client();
        $response  = $client->request('POST', $url, [
            'verify' => false,
            'headers' => [

                'Lang' => session()->get('lang'),
                'Accept' => 'application/json'
            ],
            'form_params' => [
                'code_coupon' => $request->coupon_code,
                'type' => request()->session()->get('orderType'),
                'tip' => 0,
                'table_id' => request()->session()->get('_token'),
            ]
        ]);
        $code = $response->getStatusCode(); // 200

        if ($code == 200) {
            // return response()->json([
            //     'result' => false,
            //     'msg' => 'code is not Avalid',
            // ]);
            session([
                'coupon_code' =>  $request->coupon_code,
            ]);
        }
        $response = ($response->getBody());
        $response = json_decode($response, true);

        return response()->json($response);
    }
    public function showProductFullInfo(Request $request)
    {
        //product_id
        $vendor_uuid = request()->vendor_uuid;
        $product_id = request()->product_id;
        $table_id = request()->table_id;
        $longLocation = request()->longLocation;
        $latLocation = request()->latLocation;

        // dd($longLocation);
        // $table_id = request()->table_id;
        //    $haversine = "(6371 * acos(cos(radians($latLocation))
        //              * cos(radians($this->latitude))
        //              * cos(radians($this->longitude)
        //              - radians($longLocation))
        //              + sin(radians($latLocation))
        //              * sin(radians($this->latitude))))";
        // dd($haversine);
        $theta = $longLocation - $this->longitude;
        $unit = 'kilometers';
        $distance = (sin(deg2rad($latLocation)) * sin(deg2rad($this->latitude))) + (cos(deg2rad($latLocation)) * cos(deg2rad($this->latitude)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        switch ($unit) {
            case 'miles':
                break;
            case 'kilometers':
                $distance = $distance * 1.609344;
        }
        $dist = (round($distance, 2));
        $meter = $dist * 1000;
        if ($this->vendor_uuid == 'ylago') {

            // return response()->json(['icon' => 'error', 'title' => 'you are far away from restaurant', 'meter' => $meter, 'lng' => $longLocation, 'lat' => $latLocation], 400);
            if ($longLocation == null) {
                return response()->json(['icon' => 'error', 'title' => 'please active your location', 'meter' => $meter], 400);
            }
            if ($meter > 100) {
                return response()->json(['icon' => 'error', 'title' => 'you are far away from restaurant', 'meter' => $meter], 400);
            }
        }

        $url = $this->ApiUrl . "product-info?product_id=$product_id";
        $client  = new Client();
        $response  = $client->request('get', $url, [
            'verify' => false,
            'headers' => [
                'Language' => session()->get('lang')
            ]

        ]);

        $product = ($response->getBody());
        $product = json_decode($product, true);
        $vendor_info = $this->vendor_info;

        return response()->json([
            'product' => view('ajax.productFullInfo')->with(['table_id' => $table_id, 'product' => $product, 'vendor_uuid' => $vendor_uuid, 'vendor_info' => $vendor_info])->render()
        ]);
    }
    public function addToBasket($vendor_uuid, Request $request, $product_id)
    {

        // table id sometime require
        // user id sometime require
        // product id
        // product addons ids
        // product quantity

        // "quantity" => "5"
        // "table_id" => "1"
        // "addons" => null

        $addons = [];
        if (!empty($request->addons)) {

            foreach ($request->addons as $addon) {
                $addons[]['addon_id'] = $addon['value'] ?? $addon;
            }
            $addons =  json_encode($addons);
        } else {
            $addons =  $addons;
        }

        $url = $this->ApiUrl . "basket-table";
        $client  = new Client();
        $response  = $client->request('post', $url, [
            'verify' => false,
            'headers' => [
                'Lang' => session()->get('lang')
            ],
            'form_params' => [
                'product_id' => (int) $product_id,
                'custom_addons' => '',
                'product_quantity' => (int)$request->quantity,
                'product_addons' => $addons,
                'table_id' => (int) $request->table_id,
            ]
        ]);
        $result = ($response->getBody());
        $result = json_decode($result, true);


        if ($result['status']['HTTP_code'] == 200)
            return response()->json(['status_code' => 200, 'status_result' => 'success', 'total_price' => $result['data']['total_price'], 'count_products' => $result['data']['count_products']], 200);
        else
            return response()->json(['status_code' => 302, 'status_result' => 'success', 'total_price' => $result['data']['total_price'], 'count_products' => $result['data']['count_products']], 302);
    }

    // remove item from basket
    public function removeFromBasket($vendor_uuid, Request $request)
    {
        $url = $this->ApiUrl . "basket-table/" . $request->item_basket_id;

        $client  = new Client();
        $response  = $client->request('DELETE', $url, [
            'verify' => false,
            'headers' => [
                'Lang' => session()->get('lang')
            ],
            'form_params' => [
                'table_id' => (int) $request->table_id,
            ]
        ]);
        $result = ($response->getBody());
        $result = json_decode($result, true);

        if ($result['status']['HTTP_code'] == 200)
            return response()->json(['status_code' => 200, 'status_result' => 'success'], 200);
        else
            return response()->json(['status_code' => 302, 'status_result' => 'success'], 302);
    }

    // update basket quntity
    public function changeQuantity(Request $request)
    {
        $url = $this->ApiUrl . "basket-table/" . $request->item_basket;
        $client  = new Client();
        $response  = $client->request('PUT', $url, [
            'verify' => false,
            'headers' => [
                'Lang' => session()->get('lang')
            ],
            'form_params' => [
                'table_id' => (int) $request->table_id,
                'new_quantity' => (int) $request->quantity,
            ]
        ]);

        $result = ($response->getBody());
        $result = json_decode($result, true);
        return $result;
    }
    // send order from basket
    public function submitOrder(Request $request)
    {

        // "table_id" => "7"
        // "coupon_type" => "public"
        // "coupon_code" => "tyrtyrty"
        // dd($request->all());


        $isQitaf = false;
        if ($request->coupon_type == 'qitaf')
            $isQitaf = true;


        $url = $this->ApiUrl . "tables/confirm-new-order";
        $client  = new Client();
        $response  = $client->request('post', $url, [
            'verify' => false,
            'headers' => [
                'Lang' => session()->get('lang')
            ],
            'form_params' => [
                'table_id' => (int) $request->table_id,
                'custom_addons' =>  $request->notes,
                'couponCode' => $request->coupon_code ?? '',
                'is_qitaf' => $isQitaf,
            ]
        ]);
        $result = ($response->getBody());
        return json_decode($result, true);
    }

    public function submitOrderOnline(Request $request)
    {

        $validator = Validator($request->all(), [
            'email' => 'required|email',
            'phone' => 'required',
            'full_name' => 'required',

        ]);
        if (!$validator->fails()) {


            $isQitaf = false;
            if ($request->coupon_type == 'qitaf')
                $isQitaf = true;


            $url = $this->ApiUrl . "payment/myfatoorah-handler-table";
            $client  = new Client();
            $response  = $client->request('post', $url, [
                'verify' => false,
                'http_errors' => false,
                'headers' => [
                    'Lang' => session()->get('lang')
                ],
                'form_params' => [
                    'couponCode' => $request->coupon_code ?? '',
                    'is_qitaf' => $isQitaf,
                    'type' => 'pickup',
                    'table_id' => (int) $request->table_id,
                    'email'  =>   $request->email,
                    'phone'  =>   $request->phone,
                    'full_name'  =>   $request->full_name,
                    'url' => url('en/payment/status'),
                ]
            ]);

            return  $result = ($response->getBody());
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }
    public function paymentStatus()
    {

        $url = $this->ApiUrl . "payment/myfatoorah-auth-table";
        $client  = new Client();
        $response  = $client->request('get', $url, [
            'verify' => false,
            'headers' => [
                'Lang' => session()->get('lang')
            ],

        ]);
        $result = ($response->getBody());
        $result = json_decode($result, true);
        $data = [];
        $data['Key'] = request('paymentId');
        $data['KeyType'] = 'paymentId';

        $url = "https://api-sa.myfatoorah.com/v2/getPaymentStatus";
        $client  = new Client();
        $response  = $client->request('post', $url, [
            'verify' => false,
            'http_errors' => false,
            'headers' => [
                'Authorization' => "Bearer xBT9ALVGsmyYlXgx1TlYrXZhMXlSkTpRe6J5rKYHA6uSfqqE_OW3DFo045lw6M9EP0M5Vh0SPvCgdad7taLPCLnw0J_JSwNxrTZEZUVXXKkwwdgW3YG_wVew8FNTgpGAAD9HfgU_JRdIXXWJm3w2EYwV38CLrVFcauZrjSi0PG3mNd9wd5G-QpP57AkXfiLkYDdhY7VameR7fBSMZjW5EvC7rB7CUngX2upTTLfWOuRhZYWg4hFTNzIhIWd4gMgNgEZ4ylrSWsG-oVk8f8b_fMFzG8p_yPYEpcc1p2XMupuCfLydIe3UlH5eJOJUKWSPeeKyhiSwVva3jL-1NPI-6h__iJValo1N4ZwJtnaV9Cyz0_AXfLc_7kKF-W8DgcbaU-Hhhv_UTlqyaSwMhjFdUVF65XhFcdJoJpM3FabVDmbMIyRgKXx4YtiS5d046biZVUXzWpFkMXg4P7wQZGrfgluqEzN3qbx69t6BhdumPyWyDmyHQMKh-5Dnkmc1LfvHo-mf5RfEOLpRXHJKfuw48M94zgZ5p6ZTnfrJ58ZaWt7pDyBoStnnt5FtX7wRxMvrzYIAByEEVeOoFc89BIzX7cfhhy_Q1HAhiKDLVWvPzQutk1qKoZGzieIJaDxEAjN_SEmXBRCr9XbBXb3y9FqUF_kpU_E9dyd85UF-hngpBFFhkgfD",
                'Content-Type' => 'application/json'
            ], 'json' => $data
        ]);
        $result = ($response->getBody());
        $result = json_decode($result, true);
        $table =  $result['Data']['CustomerReference'];
        $isQitaf = false;
        if (request('coupon_type') == 'qitaf')
            $isQitaf = true;
        $url = $this->ApiUrl . "tables/confirm-new-order-online";
        $client  = new Client();
        $response  = $client->request('post', $url, [
            'verify' => false,
            'headers' => [
                'Lang' => session()->get('lang')
            ],
            'form_params' => [
                'table_id' => $result['Data']['CustomerReference'],
                'custom_addons' =>  request('notes'),
                'couponCode' => request('coupon_code') ?? '',
                'is_qitaf' => $isQitaf,
                'full_name' => $result['Data']['CustomerName'],
                'email' => $result['Data']['CustomerEmail'],
                'phone' => $result['Data']['CustomerMobile'],
                "paymentId" => request('paymentId')
            ]
        ]);
        $result = ($response->getBody());
        json_decode($result, true);
        $vendor_uuid = $this->vendor_uuid;
        return view('success', compact('vendor_uuid', 'table'));


        // get all counts of products in basket

    }
}
