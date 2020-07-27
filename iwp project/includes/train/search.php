<?php

$name = $_GET["cityfrom"];
$url="https://api.railwayapi.com/v2/suggest-station/name/".$name."/apikey/fcmhzzf4g4/";
$json  =file_get_contents($url);
$data = json_decode($json);
$a=array();
foreach($data->stations as $d){
    array_push($a, $d->name);
}
echo json_encode($a);