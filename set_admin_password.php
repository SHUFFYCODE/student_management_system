<?php
$mysqli = new mysqli("localhost", "root", "", "student_management_system");


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


$hashedPassword = password_hash("admin123", PASSWORD_DEFAULT);



$sql = "UPDATE users SET password = '$hashedPassword' WHERE username = 'admin'";


if ($mysqli->query($sql) === TRUE) {
    echo "Password updated successfully.";
} else {
    echo "Error updating password: " . $mysqli->error;
}


$mysqli->close();
?>


