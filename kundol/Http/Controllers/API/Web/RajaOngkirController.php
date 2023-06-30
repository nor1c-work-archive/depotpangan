<?php

namespace App\Http\Controllers\API\Web;

use App\Http\Controllers\Controller as Controller;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    use ApiResponser;

    public function __construct()
    {
        // 
    }

    private function callApi($url)
    {
        $apiKey = env('RAJAONGKIR_API');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function getProvince()
    {
        return $this->callApi("http://api.rajaongkir.com/starter/province");
    }

    public function getCities()
    {
        $province_id = $_GET['province_id'];

        return $this->callApi("http://api.rajaongkir.com/starter/city?province=$province_id");
    }

    public function getCost()
    {
        $origin_id = 501;
        $destination_id = $_GET['city_id'];
        $weight = $_GET['weight']; // in gram
        $courier = $_GET['courier'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$origin_id&destination=$destination_id&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . env("RAJAONGKIR_API")
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
