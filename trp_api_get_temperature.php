<?php

$url = 'https://api.open-meteo.com/v1/forecast?latitude=49.547&longitude=25.5635&hourly=temperature_2m';

$json = file_get_contents($url);

$data=json_decode($json,true);

$now = date('Y-m-d').'T'.date('H').':00';

$key=array_search($now, $data['hourly']['time'],false);

echo '<h2>Air temperature now: '. $data['hourly']['temperature_2m'][$key].' C&deg</h2>';
echo '<br><h4>https://open-meteo.com</h4>';

