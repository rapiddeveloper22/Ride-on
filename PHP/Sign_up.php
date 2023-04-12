<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RideOn";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

echo "Success";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$name = "test";
$age = mysqli_real_escape_string($conn, $_POST['age']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phno']);
$username = mysqli_real_escape_string($conn, $_POST['user']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);

// Attempt insert query execution
$sql = "INSERT INTO user (name, age, email, phone, username, password) VALUES ('$name', '$age', '$email', '$phone', '$username', '$password')";
if (mysqli_query($conn, $sql)) {
    header("location: http://localhost/Ride-On/Frontend/Homepage.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
