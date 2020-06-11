<?php
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$servername = "localhost";
$username = "piyush";
$password = "";
$dbname = "ecommerce";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
$f=0;
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row['email']==$mail && $row['password']==$pass){
            $f=1;
            break;
        }
    }
if($f==0) {
?>
<script type="text/javascript">
alert ("Invalid Email and Password");
location="login.php";
</script>
<?php
}
else{
		$_SESSION['email']=$row['email'];
		$_SESSION['name']=$row['name'];
		$_SESSION['password']=$row['password'];
		$_SESSION['address']=$row['address'];
        $_SESSION['gender']=$row['gender'];
    header("location:index.php");
}
$conn->close();
?>