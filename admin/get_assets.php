<?php
$servername = "sql868.main-hosting.eu";
$username = "";
$password = "";
$dbname = "";

define('DB_SERVER', 'sql868.main-hosting.eu');
define('DB_USERNAME', 'u179023685_paisa');
define('DB_PASSWORD', 'Paisa@2023');
define('DB_NAME', 'u179023685_paisa');
                                     
/* Attempt to connect to MySQL database */
                                 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT asset_id, asset_name FROM tblasset";
$result = $conn->query($sql);

$assets = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $assets[] = array(
            'asset_id' => $row['asset_id'],
            'asset_name' => $row['asset_name']
        );
    }
}

echo json_encode($assets);

$conn->close();
?>
