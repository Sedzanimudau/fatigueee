<?php 
// DB credentials.
define('DB_HOST','sql868.main-hosting.eu');
define('DB_USER','u179023685_fatigue');
define('DB_PASS','Paisa@2023');
define('DB_NAME','u179023685_fatigue');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>