<?php
$servername = "localhost";
$username = "root";
$password = ""; // Use your MySQL password if you set one
$dbname = "student_management_system";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
echo "✅ Connected to database!";
?>


