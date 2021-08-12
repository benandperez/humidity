<?php


namespace App\Services;


class Connection
{
    public function getDataApi($latitude, $longitude)
    {

        $url = "https://api.stormglass.io/v1/weather/point?lat=".$latitude."&lng=".$longitude."&params=humidity";
        $header = array('Authorization:  cf2fe9ac-faeb-11eb-a4f8-0242ac130002-cf2fea24-faeb-11eb-a4f8-0242ac130002');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($response);

        $array = array_values($json->hours);
        $array = array_shift($array);

        return reset($array->humidity);

    }

}