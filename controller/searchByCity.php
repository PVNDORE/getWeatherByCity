<?php

include '../model/openWeatherAPI.php';

if(isset($_GET['city'])) {
    $city = $_GET['city'];

    $myOpenWeatherAPI = new OpenWeatherAPI($city);

    $r = $myOpenWeatherAPI->getWeatherByCity();

    if ($r->cod == 200) {

        $date = date("d/m/Y");

        for ($i = 0; $i <= 16; $i=$i+8) {

            $description = $r->list[$i]->weather[0]->description;
            $temperature = $r->list[$i]->main->temp;
            $feels_like = $r->list[$i]->main->feels_like;
            $humidity = $r->list[$i]->main->humidity;

            $date = date('d/m/Y', strtotime($r->list[$i]->dt_txt));

            echo "<tr><th class='text-center'>".$city."</th><th class='text-center'>".$date."</th><th class='text-center'>".$description."</th><th class='text-center'>".$temperature." °C</th><th class='text-center'>".$feels_like." °C</th><th class='text-center'>".$humidity." %</th></tr>";
        }

    } else {
        echo "I'm sorry, there is an error with the API :(";
    }

} else {
    echo "Error : Parameter 'city' must be set.";
}