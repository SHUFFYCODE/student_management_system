<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "student_management_system";


$conn = new mysqli($host, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Connected to MySQL successfully.";
}
?>


