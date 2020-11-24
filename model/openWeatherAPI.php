<?php

class OpenWeatherAPI
{
    private $url = 'https://api.openweathermap.org/data/2.5/';
    private $token = '5046f5a82aa61f1a7bc4d3d709bf4920';
    private $city;


    public function __construct($city)
    {
        $this->city = $city;
    }

    public function getWeatherByCity() {

        $APIurl = $this->url.'weather?appid='.$this->token.'&q='.$this->city;

        $curl = curl_init($APIurl);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ]);

        // PAS OUF
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = json_decode(curl_exec($curl));

        curl_close($curl);

        return $response;
    }
}