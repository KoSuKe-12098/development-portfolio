<?php
		require_once "classes/classItems.php";
		include "classes/classUser.php";
		$items = new items;

		$result = $items->getItemInfo();
		$result3 = $items->getCartQuantity($loginid);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>NEIGHBORHOOD</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<script src="https://kit.fontawesome.com/fd43627e85.js"></script>
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
					<li><a href="user.php">my page</a></li>
					<li><a href="logout.php">logout</a></li>
				</ul>
			</nav>
			<div class="header_content ml-auto">
				<!-- <div class="search header_search">
					<form action="UserAction.php">
						<input type="search" class="search_input" required="required">
						<button type="submit" id="search_button" class="search_button"><img src="images/magnifying-glass.svg" alt=""></button>
					</form>
				</div> -->
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
				

			<div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="index.php">NEIGHBOR HOOD</a></div>
		<!-- <div class="search"> -->
			<!-- <form action="UserAction.php">
				<input type="search" class="search_input menu_mm" required="required">
				<button type="submit" id="search_button_menu" class="search_button menu_mm"><img class="menu_mm" src="images/magnifying-glass.svg" alt=""></button>
			</form> -->
		<!-- </div> -->
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="index.php">home</a></li>
				<li class="menu_mm"><a href="categories.php">items</a></li>
				<li class="menu_mm"><a href="cantact.php">contact</a></li>
				<li class="menu_mm"><a href="user.php">my page</a></li>
				<li class="menu_mm"><a href="logout.php">logout</a></li>
			</ul>
		</nav>
	</div>

	<!-- Home -->

	<div class="home">
		
		<!-- Home Slider -->

		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/collection_04.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_title">New Collection</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/collection_06.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_title">New Collection</div>
						</div>	
					</div>
				</div>

				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/collection_14.jpg)"></div>
					<div class="home_slider_content">
						<div class="home_slider_content_inner">
							<div class="home_slider_title">New Collection</div>
						</div>	
					</div>
				</div>

			</div>
			
			<!-- Home Slider Nav -->

			<div class="home_slider_next d-flex flex-column align-items-center justify-content-center"><img src="images/arrow_r.png" alt=""></div>

			<!-- Home Slider Dots -->

			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot active">01.<div></div></li>
									<li class="home_slider_custom_dot">02.<div></div></li>
									<li class="home_slider_custom_dot">03.<div></div></li>
								</ul>
							</div>
						</div>
					</div>
				</div>		
			</div>
		</div>
	</div>

	<!-- New Arrivals -->

	<div class="arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">only the best</div>
						<div class="section_title">new arrivals</div>
					</div>
				</div>
			</div>
			<div class="row products_container">

				<!-- Product -->
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

				<!-- Product -->
				<!-- <div class="col-lg-4 product_col">
					<div class="product">
						<div class="product_image">
							<img src="images/191XBNH-PTM15_in-thumb-350xauto-10788.jpg" alt="">
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
								<div class="product_name"><a href="product.php?id=<?php  echo $id ?>">CLAW SAVAGE . DP NARROW</a></div>
								<div class="product_price">¥47,520</div>
							</div>
							<div class="product_options">
								<div class="product_fav product_option">+</div>
							</form>
							</div>
						</div>
					</div>
				</div> -->

				<!-- Product -->
				<!-- <div class="col-lg-4 product_col">
					<div class="product">
						<div class="product_image">
							<img src="images/191TSNH-SHM06_wh-thumb-350xauto-11186.jpg" alt="">
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
								<div class="product_name"><a href="product.php?id=<?php  echo $id ?>">ALOHA . SWORDFISH / R-SHIRT . SS</a></div>
								<div class="product_price">¥20,520</div>
							</div>
							<div class="product_options">
								<div class="product_fav product_option">+</div>
							</div>
						</div>
					</div>
				</div> -->

			</div>
		</div>
	</div>

	<!-- Gallery -->

	<div class="gallery">
		<div class="gallery_image" style="background-image:url(images/maxresdefault.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">

				</div>
			</div>
		</div>	
		<div class="gallery_slider_container">
			
			<!-- Gallery Slider -->
			<div class="owl-carousel owl-theme gallery_slider">
				
				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/191UCNH-JKM04_blk.jpg">
						<img src="images/191UCNH-JKM04_blk.jpg" alt="">
					</a>
				</div>

				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/191AQNH-JKM03_cam.jpg">
						<img src="images/191AQNH-JKM03_cam.jpg" alt="">
					</a>
				</div>

				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/191MSNH-FW01_blk.jpg">
						<img src="images/191MSNH-FW01_blk.jpg" alt="">
					</a>
				</div>

				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/191FPNH-CSM01_pink.jpg">
						<img src="images/191FPNH-CSM01_pink.jpg" alt="">
					</a>
				</div>

				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox　" href="images/191OKNH-PTM01_blue.jpg">
						<img src="images/191OKNH-PTM01_blue.jpg" alt="">
					</a>
				</div>

				<!-- Gallery Item -->
				<div class="owl-item gallery_item">
					<a class="colorbox" href="images/191STNH-CSM03_sax.jpg">
						<img src="images/191STNH-CSM03_sax.jpg" alt="">
					</a>
				</div>

			</div>
		</div>	
	</div>


<!-- Footer -->

<footer class="footer bg-dark" style="margin-top: 70px;">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="footer_logo"><a href="index.php" class="text-white" style="font-size:40px;">NEIGHBOR HOOD</a></div>
					<nav class="footer_nav">
						<ul>
							<li><a href="index.php" class="text-white">home</a></li>
							<li><a href="categories.php" class="text-white">items</a></li>
                            <li><a href="contact.php" class="text-white">contact</a></li>
							<li><a href="user.php" class="text-white">my page</a></li>
                            <li><a href="logout.php" class="text-white">logout</a></li>
						</ul>
					</nav>
					<div class="copyright text-white"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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