<?php 
$servername = "localhost";
$username = "piyush";
$password = "";
$dbname = "ecommerce";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
session_start();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$mail=$_SESSION['email'];
$sql = "delete from mycart where email='$mail'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
header("location:index.php");
} 
else {
    echo "Error: " . $sql . "<br>". $conn->error;
}
$conn->close();
?>
