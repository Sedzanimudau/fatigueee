<?php
efine('DB_SERVER', 'sql868.main-hosting.eu');
define('DB_USERNAME', 'u179023685_talha');
define('DB_PASSWORD', 'Heineken2020');
define('DB_NAME', 'u179023685_talha');
                                     
/* Attempt to connect to MySQL database */
                                 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from source table
$sqlSelect = "SELECT asset_name,asset_id,emp_number,name,surname,general,notes,date_time FROM tblassetinspection WHERE general= 'bad'";
$result = $conn->query($sqlSelect);

if ($result->num_rows > 0) {
    // Loop through the retrieved data
    while ($row = $result->fetch_assoc()) {
        // Insert data into destination table
        $sqlInsert = "INSERT INTO tbldefects (asset_name,asset_id,emp_number,name,surname,general,notes,date_time) VALUES (:asset_name,:asset_id,:emp_number,:name,:surname,:general,:notes,:date_time)";
        
        if ($conn->query($sqlInsert) !== TRUE) {
            echo "Error inserting data: " . $conn->error;
        }
    }

} else {
    echo "No data to move.";
}

// Close connection
$conn->close();
?>
