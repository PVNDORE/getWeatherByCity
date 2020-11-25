<?php

include '../model/openWeatherAPI.php';

if(isset($_GET['city'])) {
    $city = $_GET['city'];

    $myOpenWeatherAPI = new OpenWeatherAPI($city);

    $r = $myOpenWeatherAPI->getWeatherByCity();

    if ($r->cod == 200) {

        $date = date("d/m/Y");

        for ($i = 0; $i <= 16; $i=$i+8) {
            $data['description'] = $r->list[$i]->weather[0]->description;
            $data['temp'] = $r->list[$i]->main->temp;
            $data['feels_like'] = $r->list[$i]->main->feels_like;
            $data['humidity'] = $r->list[$i]->main->humidity;

            $date = $r->list[$i]->dt_txt;

            echo "<tr><th class='text-center'>".$city."</th><th class='text-center'>".$date."</th><th class='text-center'>".$data['description']."</th><th class='text-center'>".$data['temp']." °C</th><th class='text-center'>".$data['feels_like']." °C</th><th class='text-center'>".$data['humidity']." %</th></tr>";
        }

    } else {
        echo "I'm sorry, there is an error with the API :(";
    }

} else {
    echo "Error : Parameter 'city' must be set.";
}