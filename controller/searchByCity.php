<?php

include '../model/openWeatherAPI.php';

if(isset($_GET['city'])) {
    $city = $_GET['city'];

    $myOpenWeatherAPI = new OpenWeatherAPI($city);

    $r = $myOpenWeatherAPI->getWeatherByCity();

    if ($r->cod === 200) {

        $date = date("d/m/Y");

        $data['description'] = $r->weather[0]->description;
        $data['temp'] = $r->main->temp;
        $data['feels_like'] = $r->main->feels_like;
        $data['humidity'] = $r->main->humidity;

        echo "<th class='text-center'>".$city."</th><th class='text-center'>".$date."</th><th class='text-center'>".$data['description']."</th><th class='text-center'>".$data['temp']." °C</th><th class='text-center'>".$data['feels_like']." °C</th><th class='text-center'>".$data['humidity']." %</tr>";
    } else {
        echo "I'm sorry an error occurred :(";
    }

} else {
    echo "Error : Parameter 'city' must be set.";
}