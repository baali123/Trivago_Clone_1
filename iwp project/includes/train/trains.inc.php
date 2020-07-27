<?php
if(isset($_GET['train-submit'])){
    $url="https://api.railwayapi.com/v2/between/source/<stn code>/dest/<stn code>/date/<dd-mm-yyyy>/apikey/<apikey>/";
}
else{
    header("index.php");
    exit();
}