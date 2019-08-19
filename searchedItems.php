<?php

    require_once "classes/classItems.php";

    $items = new items;

    $id = $_GET["id"];

    $result = $items->specificSearch($id);







?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Categories</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/malihu-custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/categories.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="index.php">NEIGHBOR HOOD</a></div>
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
						<button type="submit" id="search_button" class="search_button"><img src="images/magnifying-glass.svg" alt=""></button>
					</form>
				</div>
				<div class="shopping">
					<!-- Cart -->
					<a href="cart.php">
						<div class="cart">
							<img src="images/shopping-bag.svg" alt="">
							<div class="cart_num_container">
								<div class="cart_num_inner">
									<div class="cart_num">4</div>
								</div>
							</div>
						</div>
					</a>
				
			<div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="index.php">NEIGHBOR HOOD</a></div>
		<div class="search">
			<form action="UserAction.php">
				<input type="search" class="search_input menu_mm" required="required">
				<button type="submit" id="search_button_menu" class="search_button menu_mm"><img class="menu_mm" src="images/magnifying-glass.svg" alt=""></button>
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


    <div class="col-12 product_col">
					<div class="product text-center">
					<?php foreach($result as $row) {
						$image = $row["itemimage"]; ?>
						<div class="product_image">
							<img src="images/<?php echo $image ?>" alt="">
						</div>
						<div class="rating rating_4">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<div class="product_content clearfix">
							<div class="product_info">
								<div class="product_name"><a href="product.php?id=<?php  echo $row["itemid"] ?>"><?php echo $row["itemname"]?></a></div>
								<div class="product_pric"><h3>¥<?php echo $row["itemprice"] ?></h3></div>
								<div class="product_comment"><?php echo $row["itemcomment"] ?></div><br>
							</div>
						</div>
					<?php } ?>
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
					<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script>NEIGHBOR　HOOD CO. LTD, ALL RIGHTS RESERVED <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>