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

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $conn->close();
    exit;
}

extract($_POST);
$allday = isset($allday);

// Convert interval to seconds
$intervalSeconds = $interval * 24 * 60 * 60;

$startTimestamp = strtotime($start_datetime);
$endTimestamp = strtotime($end_datetime);

$currentTimestamp = $startTimestamp;

while ($currentTimestamp <= $endTimestamp) {
    $currentStart = date('Y-m-d H:i:s', $currentTimestamp);
    $currentEnd = date('Y-m-d H:i:s', $currentTimestamp + $intervalSeconds);

    $sql = "INSERT INTO `schedule_list` (`title`,`deptid`,`emplist`,`description`,`start_datetime`,`end_datetime`) VALUES ('$title','$deptid','$emplist','$description','$currentStart','$currentEnd')";
    $sql2 = "INSERT INTO `tbltask` (`DeptID`,`AssignTaskto`,`TaskTitle`,`TaskDescription`,`TaskEndDate`) VALUES ('$deptid','$emplist','$title','$description','$currentEnd')";

    // Execute the SQL query to insert the event
    $save = $conn->query($sql);
    $save = $conn->query($sql2);

    if (!$save) {
        echo "<pre>";
        echo "An Error occurred.<br>";
        echo "Error: " . $conn->error . "<br>";
        echo "SQL: " . $sql . "<br>";
        echo "</pre>";
        $conn->close();
        exit;
    }

    // Move to the next interval
    $currentTimestamp += $intervalSeconds;
}

echo "<script> alert('Schedules Successfully Saved.'); location.replace('./schedule-task.php') </script>";

$conn->close();
?>
