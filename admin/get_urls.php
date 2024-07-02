<?php

define('DB_SERVER', 'sql868.main-hosting.eu');
define('DB_USERNAME', 'u179023685_paisa');
define('DB_PASSWORD', 'Paisa@2023');
define('DB_NAME', 'u179023685_paisa');
                                     
/* Attempt to connect to MySQL database */
                                 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$sql = "SELECT page_name, url FROM tblurl";
$result = $conn->query($sql);

$urls = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $urls[] = array(
            'page_name' => $row['page_name'],
            'url' => $row['url']
        );
    }
}

echo json_encode($urls);

$conn->close();
?>
