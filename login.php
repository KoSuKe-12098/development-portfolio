<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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
    <div class="login_logo" style="font-family: 'Lucida',serif;font-size: 30px;color: #2f2f2f;">
        <form action="UserAction.php" method="POST" class="text-center">
        <h1>LOGIN</h1>
        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="submit" name="login" value="Login" class="btn btn-primary w-50"><br><br>
        </form>
    </div>
    <!-- footer -->
    <footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="footer_logo"><a href="#">NEIGHBOR HOOD</a></div>
					<nav class="footer_nav">
						<ul>
							<!-- <li><a href="index.html">home</a></li>
							<li><a href="categories.html">items</a></li>
							<li><a href="contact.html">contact</a></li>
							<li><a href="logout.php">logout</a></li> -->
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
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/cart_custom.js"></script>
</body>
</html>