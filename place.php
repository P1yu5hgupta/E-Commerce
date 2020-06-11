 <?php
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
$mail=$_SESSION['email'];
$address=$_SESSION['address'];
                    $mail=$_SESSION['email'];
                    $sql="SELECT product.p_name as p_name, product.price as price,product.prod_image as prod_image ,mycart.quan as quan FROM product INNER JOIN mycart ON mycart.prod_id = product.prod_id where mycart.email='$mail'";
                $res = $conn->query($sql);
                while($row = $res->fetch_assoc()){
                    $sql1 = "insert into myorders(email,p_name,address,date)
                    values('$mail',p_name,'$address',NOW())";
                    if ($conn->query($sql1) === TRUE) {
                    ?>
<script type='text/javascript'>
alert('Congrats! Your order has been placed !');
location="index.php";
</script>
<?php


                    }    
                    else{
                    echo "Error: " . $sql . "<br>". $conn->error;
                    }
                
                }
                $sql2 = "delete from mycart where email='$mail'";
                $resul = $conn->query($sql2);
                if ($conn->query($sql2) === TRUE) {
        
                }    
                else {
                echo "Error: " . $sql . "<br>". $conn->error;
                }

?>