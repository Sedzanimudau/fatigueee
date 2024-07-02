<?php 
$host = 'sql868.main-hosting.eu';
$username = 'u179023685_talha';
$password = 'Heineken2020';
$dbname = 'u179023685_talha';

// Create a MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    echo "<script> alert('Undefined Schedule ID.'); location.replace('./') </script>";
    $conn->close();
    exit;
}

$delete = $conn->query("DELETE FROM `schedule_list` WHERE id = '{$_GET['id']}'");

if ($delete) {
    echo "<script> alert('Event has been deleted successfully.'); location.replace('./schedule-task.php') </script>";
} else {
    echo "<pre>";
    echo "An Error occurred.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}

$conn->close();
?>
