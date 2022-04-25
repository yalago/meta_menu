<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\View;


class vendorAuthController extends Controller
{
    public $language;

    public $ApiUrl;
    public $vendor_uuid;

    public $categories;
    public $vendor_info;

    public $tableTracking;

    public $activityStatus;
    public $pixel;




    public function __construct()
    {
        // handler vendor Info
        $this->vendor_uuid = request('vendor_uuid');
        $this->ApiUrl = 'https://dashboard.metaemenu.com/api/vendor/' . $this->vendor_uuid . '/';


        $client  = new Client();
        $response  = $client->request('get', $this->ApiUrl . 'info', [
            'verify' => false,
            'headers' => [
                'Language' => session()->get('lang')
            ]
        ]);
        $vendorInfo = ($response->getBody());
        $vendorInfo = json_decode($vendorInfo, true);

        $this->categories = $vendorInfo['data']['menu_categories'];
        $this->vendor_info = $vendorInfo['data'];
        $this->activityStatus = $this->vendor_info['status_open'];
        // ======================================vendor========================================

        $client  = new Client();
        $response  = $client->request('get', $this->ApiUrl . 'social-media-info', [
            'verify' => false,
            'headers' => [
                'Language' => session()->get('lang')
            ]
        ]);
        $social = ($response->getBody());
        $social = json_decode($social, true);
        $this->social = $social['data'];
        // ======================================social========================================

        $client  = new Client();
        $response  = $client->request('post', $this->ApiUrl . 'vistis', [
            'verify' => false,
            'headers' => [
                'Language' => session()->get('lang')
            ],

            'form_params' => [
                "ip" => request()->ip(),

            ]
        ]);
        //  ====================================branch category ==================================
        $table_id = request()->table_id;

        if ($table_id != null) {
            $client  = new Client();
            $table_id = request()->table_id;
            $response  = $client->request('get', $this->ApiUrl . "table?table_id=" . $table_id, [
                'verify' => false,
                'headers' => [
                    'Language' => session()->get('lang')
                ]
            ]);

            $vendorInfoB = ($response->getBody());
            $vendorInfoB = json_decode($vendorInfoB, true);

            $this->categoriesBranch = $vendorInfoB['data']['menu_categories'];
            $this->table_number = $vendorInfoB['data'];

            $responseTracking  = (new Client())->request(
                'get',
                $this->ApiUrl . 'table-num?table_id=' . $table_id,
                [
                    'verify'  => false,
                    'headers' => [
                        'Language' => session()->get('lang')
                    ]
                ]
            );
            $this->tableTracking = json_decode($responseTracking->getBody(), true)['data'];

            $this->activityStatus = $this->tableTracking['branchs']['status'];
            $this->longitude = $this->tableTracking['branchs']['longitude'];
            $this->latitude = $this->tableTracking['branchs']['latitude'];

            View::share('tableTracking', $this->tableTracking);
        }

        View::share('activityStatus', $this->activityStatus);
        // ==================================pixel code ===============================
        // $client  = new Client();
        // $response  = $client->request('get', $this->ApiUrl . 'pixel-codes', [
        //     'verify' => false,
        //     'headers' => [
        //         'Language' => session()->get('lang')
        //     ]
        // ]);
        // $pixel = ($response->getBody());
        // $pixel = json_decode($pixel, true);
        // $this->pixel = $pixel['data'];
    }
}
