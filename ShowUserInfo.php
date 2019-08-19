<?php
	require_once "classes/classUser.php";
	// session_start();
	$id = $_SESSION["loginid"];
	$user = new user;
	$result = $user->specificSearchUser($id);


?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    <title>USER INFO</title>
</head>
<body>
<div class="registration_info" style="margin-top: 35px;margin-left: 489px;font-size: 36px;">
			<h1>USER INFO</h1>
			<?php
				foreach($result as $row){
					echo "Name :".$row["name"]."<br>";
					echo "Email :".$row["email"]."<br>";
					echo "Address :".$row["address"]."<br>";
					echo "Phone Number :".$row["phonenum"]."<br>";
					echo "Username :".$row["username"]."<br>";
					echo "Password :".$row["password"]."<br>";
					echo "<a href='updateUser.php?id=$id'>>>Update";
				}
			?>
	
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