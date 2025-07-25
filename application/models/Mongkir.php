<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mongkir extends CI_Model
{
    function biaya($origin, $destination, $weight)
    {
        $daftar_kurir = [
            'jne',
            'jnt',
            // 'sicepat',
            // 'ide',
            // 'sap',
            // 'ninja',
            // 'tiki',
            // 'lion',
            // 'anteraja',
            // 'pos',
            // 'ncs',
            // 'rex',
            // 'rpx',
            // 'sentral',
            // 'star',
            // 'wahana',
            // 'dse'
        ];
        $semuaBiaya = [];

        foreach ($daftar_kurir as $kurir) {
            $url = "https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost";
            $data = [
                "origin"      => $origin,
                "destination" => $destination,
                "weight"      => $weight,
                "courier"     => $kurir,
                "price"       => "lowest"
            ];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL            => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => "POST",
                CURLOPT_HTTPHEADER     => array(
                    "accept: application/json",
                    "key: qQg57J4j7eda54a84e1325aabcrvdm43"
                ),
                CURLOPT_POSTFIELDS     => http_build_query($data),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if (!$err) {
                $response = json_decode($response, true);
                if (isset($response['data']) && !empty($response['data'])) {
                    $semuaBiaya = array_merge($semuaBiaya, $response['data']);
                }
            } else {
                echo "cURL Error #:" . $err;
            }
        }
        return $semuaBiaya;
    }
}
