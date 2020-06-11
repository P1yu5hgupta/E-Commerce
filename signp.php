<?php
$name=$_POST['name'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$add=$_POST['add'];
$gender=$_POST['gender'];
$img=$_POST['img'];
$servername = "localhost";
$username = "piyush";
$password = "";
$dbname = "ecommerce";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT email FROM user";
$result = $conn->query($sql);
$f=0;
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row['email']==$mail){
            $f=1;
        }
    }
if($f==1) {
?><script type='text/javascript'>
alert('UserId already exists');
location="signup.php";
</script>
<?php
}
else{
$sql = "INSERT INTO user
VALUES ('$name','$mail','$pass','$add','$gender','$img')";

if ($conn->query($sql) === TRUE) {
header("location:index.php");
} 
else {
    echo "Error: " . $sql . "<br>". $conn->error;
}
}
$conn->close();
?>
