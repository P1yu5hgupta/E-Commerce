<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/product.css">
</head>
    
    <style>
    .autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

    </style>
<body>
<?php
$pname=$_GET['prodname'];
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
}?>

<div class="super_container">


	<header class="header">
		<div class="header_container">
			<div class="container">
                <div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo"><a href="index.php">E Commerce</a></div>
							<nav class="main_nav">
								<ul>
									<li class="hassubs">
										<a href="index.php">Home<img src="images/down.png" width="18px" height="18px"></a>
										<ul>
                                            <li><a href="categories.php">Categories</a></li>
											<li><a href="cart.php">Cart</a></li>
											<li><a href="checkout.php">Check out</a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="categories.php?cat='All Products...'">Categories<img src="images/down.png" width="18px" height="18px"></a>
										<ul>
                                            <li style="width:200px"><a href="categories.php?cat='All Products...'">All</a></li>
                                            <?php
                                            $sql = "SELECT c_name FROM category";
                                            $result = $conn->query($sql);
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) { ?>
                                            <li><a href="categories.php?cat='<?php echo $row['c_name']?>'"><?php echo $row['c_name']; ?></a></li>
											<?php } ?>
										</ul>
									</li>
								</ul>
							</nav>
							<div class="header_extra ml-auto">
								
                                
                               <div class="search">
									<form autocomplete="off" action="product.php" method="get">
                                        <div class="autocomplete">
                                    <input id="myInput" type="text" name="prodname" placeholder="Search" width="100px" height="20px" >
                                        </div>
                                            <button>
										<img src="images/search.png" width="18px" height="18px">
                                        </button>
                                    </form>
								</div>
                                 <div class="shopping_cart">
									<a href="cart.php">
                                        <img src="images/cart1.jpg" width="18px" height="18px">
										<div>Cart <span>(<?php
                                            if(isset($_SESSION['email'])){
                                                $mail=$_SESSION['email'];
                                            $sql="select count(*) as count from mycart where email='$mail'";
                                            $result=$conn->query($sql);
                                                $row=$result->fetch_assoc();
                                                echo $row['count'];
                                            }
                                            else
                                                echo 0;
                                            ?>)</span></div>
									</a>
								</div>
                                   
							</div>
                    <?php 
						if(isset($_SESSION['email']))
						{
						?>
                        <div class="hassubs">
										&nbsp;&nbsp;<img src="images/account.png" width="30px" height="30px">
                            <?php
                            echo $_SESSION['name'];
                            ?>
										<ul>
											 <li><a href="logout.php">LogOut</a></li>
										</ul>
									</div>
                            <?php
                            }
                            else { ?>
                    <div class="register">
                            <div class="lgin">
                                <a href="login.php"><img src="images/login.jpg" width="30px" height="30px"></a>
                                </div>
                                <div class="sgnup">
                                <a href="signup.php"><img src="images/sgnup.jpg" width="70px" height="20px"></a>
                                </div> 
					</div><?php } ?>
                    </div>
					</div>
                </div>
		
		
	</header>
	
			
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/categories.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title"><?php echo $pname; ?><span>.</span></div>
								<div class="home_text"><p>All about <?php echo $pname; ?> is here...</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Product Details -->

	<div class="product_details">
		<div class="container">
			<div class="row details_row">
                <?php
                $sql="select * from product where p_name='$pname'";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
                ?>
				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image">
						<div class="details_image_large"><img src="<?php echo $row['prod_image']; ?>" alt=""></div>
						<div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
							</div>
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
						<div class="details_name"><?php echo $row['p_name']; ?></div>
						<div class="details_discount">$<?php echo $row['price']; ?></div>
						<div class="details_price">$<?php echo $row['price']*(0.80); ?></div>

						<!-- In Stock -->
						<div class="in_stock_container">
							<div class="availability">Availability:</div>
							<span>In Stock</span>
						</div>
						<div class="details_text">
							<p><?php echo $row['description']; ?></p>
						</div>

						<!-- Product Quantity -->
						<div class="product_quantity_container" style="display: inline-block;">
                        <form action="addcart.php?prodid=<?php echo $row['p_name']?>" method="post">
							<div class="product_quantity clearfix" width="100px">
								<span>Qty</span>
								<input id="quantity_input" type="text" pattern="[0-9]*" value="1" name="quan" width="100px">
								<div class="quantity_buttons">
									<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
									<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
								</div>
							</div>
                            
                            
                            <div class=submit_button  style="display:inline-block; top-margin: 20px;"><button type=submit>Add to cart</button></div></form>
						</div>
                    </div>
				</div> 
			</div>

			<div class="row description_row">
				<div class="col">
					<div class="description_title_container">
						<div class="description_title">Description</div>
				    <div class="description_title">   &nbsp;&nbsp;Rating<span>(<?php echo $row['rating']; ?>)</span></div>
                    </div>
					<div class="description_text">
						<p><?php echo $row['description']; ?>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="products_title">Related Products</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<?php
                    $sql="select * from product where p_name<>'$pname' and cat_id=(select cat_id from product where p_name='$pname')";
                    $result=$conn->query($sql);
                    $n=$result->num_rows;
                    ?>
					<div class="product_grid" style="display:inline-block;">
                        <?php
                        if($n>0){
                        while($row=$result->fetch_assoc()){
                        ?>
						<!-- Product -->
						<div class="product">
                            <div class="product_image"><img src="<?php echo $row['prod_image']; ?>" alt=""></div>
							<div class="product_content">
								<div class="product_title"><a href="product.php?prodname=<?php echo $row['p_name']; ?>">
                                    <?php echo $row['p_name']; ?></a></div>
								<div class="product_price">$<?php echo $row['price']; ?></div>
							</div><?php }
                        }  else{
                            echo "No related Products...";
                        }
                            ?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">
				
				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Free Shipping Worldwide</div>
						<div class="icon_box_text">
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Free Returns</div>
						<div class="icon_box_text">
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">24h Fast Support</div>
						<div class="icon_box_text">
						</div>
					</div>
				</div>
            </div>
		</div>
	</div>

    
    </div>

    <script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
<?php
    $sql="select p_name from product";
    $result = $conn->query($sql);
    ?>
/*An array containing all the country names in the world:*/
var countries = [<?php while($row = $result->fetch_assoc()) { ?>"<?php echo $row['p_name']; ?>
    ",
    <?php }?>];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>
</body>
</html>