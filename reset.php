<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expnDetails";



$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->begin_transaction();

try {
    // Fetch all rows ordered by the current id
    $result = $conn->query("SELECT sn FROM info ORDER BY sn ASC");

    if ($result->num_rows > 0) {
        $new_sn = 1;

        // Update each row with a new id
        while ($row = $result->fetch_assoc()) {
            $current_sn = $row['sn'];
            $conn->query("UPDATE info SET sn = $new_sn WHERE sn = $current_sn");
            $new_sn++;
        }

        // Commit transaction
        $conn->commit();
        echo "IDs resequenced successfully";
    } else {
        echo "No rows found to resequence";
    }
} catch (Exception $e) {
    // Rollback transaction in case of error
    $conn->rollback();
    echo "Error resequencing IDs: " . $e->getMessage();
}

$conn->close();
?>
