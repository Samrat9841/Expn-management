<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "expnDetails";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$sql = "INSERT INTO users (name, amount,category,date)
		VALUES ('".$_POST["expense-name"]."','".$_POST["expense-amount"]."','".$_POST["expense-category"]."','".$_POST["expense-date"]."')";

	
    }
?>