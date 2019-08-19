<?php
	session_start();
	require_once "classes/classItems.php";
	
	$loginid = $_SESSION["loginid"];
	$items = new items;

	$result = $items->getItemInfo();
	$result2 = $items->getCartInfo($loginid);
	$result3 = getCartQuantity($loginid);
	
	// foreach($result2 as $row){
		
	// 	$quantity = $row["cartquantity"];
	// 	$price = $row["cartprice"];
	// 	$itemid = $row["itemid"];
	// 	$loginid = $row["loginid"];
		
	// }

	$Shipping = 500;


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cart</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Wish shop project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/cart.css">
	<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header">
			<div class="header_inner d-flex flex-row align-items-center justify-content-start">
				<div class="logo"><a href="#">NEIGHBOR HOOD</a></div>
				<nav class="main_nav">
					<ul>
						<li><a href="index.php">home</a></li>
						<li><a href="categories.php">items</a></li>
						<li><a href="contact.php">contact</a></li>
						<li><a href="logout.php">logout</a></li>
					</ul>
				</nav>
				<div class="header_content ml-auto">
					<div class="search header_search">
						<form action="UserAction.php">
							<input type="search" class="search_input" required="required">
							<button type="submit" id="search_button" class="search_button"><img
									src="images/magnifying-glass.svg" alt=""></button>
						</form>
					</div>
					<div class="shopping">
						<!-- Cart -->
						<a href="cart.php">
						<div class="cart">
							<img src="images/shopping-bag.svg" alt="">
							<div class="cart_num_container">
								<div class="cart_num_inner">
									<div class="cart_num"><?php echo $result3 ?></div>
								</div>
							</div>
						</div>
					</a>
				

						<div
							class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</div>
		</header>

		<!-- Menu -->

		<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
			<div class="menu_close_container">
				<div class="menu_close">
					<div></div>
					<div></div>
				</div>
			</div>
			<div class="logo menu_mm"><a href="UserAction.php">NEIGHBOR HOOD</a></div>
			<div class="search">
				<form action="#">
					<input type="search" class="search_input menu_mm" required="required">
					<button type="submit" id="search_button_menu" class="search_button menu_mm"><img class="menu_mm"
							src="images/magnifying-glass.svg" alt=""></button>
				</form>
			</div>
			<nav class="menu_nav">
				<ul class="menu_mm">
					<li class="menu_mm"><a href="index.php">home</a></li>
					<li class="menu_mm"><a href="categoryies.php">items</a></li>
					<li class="menu_mm"><a href="contact.php">contact</a></li>
					<li class="menu_mm"><a href="logout.php">logout</a></li>
				</ul>
			</nav>
		</div>


		<!-- Home -->

		<div class="home">
			<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/cart.jpg"
				data-speed="0.8"></div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_container">
							<div class="home_content">
								<div class="home_title">Shopping Cart</div>
								<div class="breadcrumbs">
									<ul>
										<li><a href="index.php">Home</a></li>
										<li>Shopping Cart</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Cart -->

		<div class="cart_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_title">your shopping cart</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="cart_bar d-flex flex-row align-items-center justify-content-start">
							<div class="cart_bar_title_name">Name</div>
							<div class="cart_bar_title_content ml-auto">
								<div
									class="cart_bar_title_content_inner d-flex flex-row align-items-center justify-content-end">
									<div class="cart_bar_title_price">Price</div>
									<div class="cart_bar_title_quantity">Quantity</div>
									<div class="cart_bar_title_total">Total</div>
									<div class="cart_bar_title_button"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<div class="row">
				<div class="col">
					<div class="cart_products">
						<?php foreach($result2 as $row){ ?>
							<ul>
								<li
									class=" cart_product d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
									
									<div class="cart_product_name"><a href="product.php?id=<?php echo $row["itemid"]?>"><?php echo $row["itemname"]?></a></div>
									<div class="cart_product_info ml-auto">
										<div
											class="cart_product_info_inner d-flex flex-row align-items-center justify-content-md-end justify-content-start">
											<!-- Product Price -->
											<div class="cart_product_price"><?php echo $row["cartprice"]?></div>
											<!-- Product Quantity -->
											<div class="product_quantity_container">
											<?php echo $row["cartquantity"] ?>
											</div>
											<!-- Products Total Price -->
											<div class="cart_product_total"><?php echo $items->specificComputeItem($row["cartquantity"],$row["cartprice"])?></div>
											<!-- Product Cart Trash Button -->
											<div class="cart_product_button">
											<form action="UserAction.php" method="post">
												<input type="hidden" name="itemid" value="<?php echo $row["itemid"]?>">
												<input type="submit" name="deleteitem" value="Delete" style="width: 50px;">
											</form>
											</div>
										</div>
									</div>
								</li>
							</ul>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="row cart_extra">
				
					<!-- Cart Total -->
					<div class="col-lg-5 offset-lg-1">
						<div class="cart_total">
							<div class="cart_title">cart total</div>
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Subtotal</div>
									<div class="cart_total_price ml-auto">¥<?php echo $subtotal = $items->getSubTotal($loginid) ?></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Shipping</div>
									<div class="cart_total_price ml-auto">¥<?php echo $Shipping?></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Total</div>
									<div class="cart_total_price ml-auto">¥<?php echo $total = $subtotal + $Shipping ?></div>
								</li>
							</ul>
							<form action="UserAction.php" method="post">
								<input type="hidden" name="loginid" value="<?php echo $loginid?>">
								<button type="submit" name="total_button" value="cart_total_button"
									class="cart_total_button">PLACE TO ORDER</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Footer -->

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="footer_logo"><a href="index.php">NEIGHBOR HOOD</a></div>
						<nav class="footer_nav">
							<ul>
								<li><a href="index.php">home</a></li>
								<li><a href="categories.php">items</a></li>
								<li><a href="contact.php">contact</a></li>
								<li><a href="logout.php">logout</a></li>
							</ul>
						</nav>
						<div class="copyright">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script>NEIGHBOR　HOOD CO. LTD, ALL RIGHTS RESERVED
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/cart_custom.js"></script>
</body>

</html>