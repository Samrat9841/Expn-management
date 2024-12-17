<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expnDetails";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT amount FROM info";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row['expense-amount'];
    }
}

echo json_encode($data);

$conn->close();
?>
