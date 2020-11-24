<?php

include '../model/openWeatherAPI.php';

if(isset($_GET['city'])) {
    $city = $_GET['city'];

    $myOpenWeatherAPI = new OpenWeatherAPI($city);

    $r = $myOpenWeatherAPI->getWeatherByCity();

    if ($r->cod === 200) {

        $date = date("Y/m/d");

        $data['description'] = $r->weather[0]->description;
        $data['temp'] = $r->main->temp;
        $data['feels_like'] = $r->main->feels_like;
        $data['humidity'] = $r->main->humidity;

        echo "<th>".$city."</th><th>".$date."</th></th><th>".$data['description']."</th><th>".$data['temp']."</th><th>".$data['feels_like']."</th><th>".$data['humidity']."</tr>";
    } else {
        echo "I'm sorry an error occurred :(";
    }

} else {
    echo "Error : Parameter 'city' must be set.";
}