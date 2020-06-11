<?php
$quan=$_POST['quan'];
$prod=$_GET['prodid'];
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
$sql="select * from product where p_name='$prod'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$prodid=$row['prod_id'];
if(isset($_SESSION['email']))
{
$mail=$_SESSION['email'];
$sql="insert into mycart (prod_id,quan,email)
values($prodid,$quan,'$mail')";
}
else{?>
    <script type="text/javascript">
alert ("Login to your Account first");
location="login.php";
</script>
<?php }
if($conn->query($sql) === TRUE) { 
?>
<script type="text/javascript">
location="product.php?prodname=<?php echo $prod; ?>";
</script>
<?php
} 
else{
    echo "Error: " . $sql . "<br>". $conn->error;
}
$conn->close();
?>
