<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtracking extends CI_Model
{
    private $rajaongkir_api_key = 'qQg57J4j7eda54a84e1325aabcrvdm43';

    public function get_waybill_data($awb, $courier)
    {
        if (empty($awb) || empty($courier)) {
            return null;
        }

        $url = "https://rajaongkir.komerce.id/api/v1/track/waybill?awb=" . $awb . "&courier=" . $courier;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "key: " . $this->rajaongkir_api_key
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return ['meta' => ['status' => 'error', 'message' => 'cURL Error #:' . $err]];
        } else {
            return json_decode($response, true);
        }
    }
}
