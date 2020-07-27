<?php
$servername="localhost";
$dbuser="root";
$dbpassword="";
$dbname="iwp project";


$conn=mysqli_connect($servername,$dbuser,$dbpassword,$dbname);
if (!$conn) {
    die('connection failed'.mysqli_connect_error() );
}
