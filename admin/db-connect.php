<?php
$host = 'sql868.main-hosting.eu';
$username = 'u179023685_talha';
$password = 'Heineken2020';
$dbname = 'u179023685_talha'

$conn = new mysqli($host, $username, $password, $dbname);
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}