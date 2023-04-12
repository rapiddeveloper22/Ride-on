<?php
$user = $_POST["user"];
$brand = $_POST["brand"];
$type = $_POST["type"];
$year = $_POST["yop"];
$bill = $_POST["amount"];
$phone = $_POST["phno"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RideOn";

// echo "sd";
// echo "ew";

$yearOfPurchase = (int) $year;

// Calculate the current year
$currentYear = (int) date("Y");

// Initialize the price
$price = (int) $bill;


// Calculate the number of years since the year of purchase
$numberOfYears = $currentYear - $yearOfPurchase;

// Apply the depreciation percentage of 5% on each year
for ($i = 0; $i < $numberOfYears; $i++) {
  $price *= 0.80;
}

$price = (int) $price;


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// echo "de";
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO cycle (username,brand, ttype, yop, bill, Phone, maxa)
  VALUES ('$user', '$brand', '$type', '$year', '$bill', '$phone','$price')";
  
  
  if ($conn->query($sql) == TRUE) {
  // echo "de";
  header("location:http://localhost/Ride-On/Frontend/Sell_success.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


mysqli_close($conn);
?>