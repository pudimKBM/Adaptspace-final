<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if ($_SESSION['logged_in'] == 'True') {
    header('Location: ../index.php');
}
error_reporting(0);

?>

<head>
<!-- Required meta tags-->
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<meta name="author" content="Hau Nguyen">
<meta name="keywords" content="au theme template">

<!-- Title Page-->
<title>Entrar</title>

<!-- Fontfaces CSS-->
<link href="css/font-face.css" rel="stylesheet" media="all">
<link href="vendor2/font-awesome-4.7/css/font-awesome.min.css"
	rel="stylesheet" media="all">
<link href="vendor2/font-awesome-5/css/fontawesome-all.min.css"
	rel="stylesheet" media="all">
<link href="vendor2/mdi-font/css/material-design-iconic-font.min.css"
	rel="stylesheet" media="all">

<!-- Bootstrap CSS-->
<link href="vendor2/bootstrap-4.1/bootstrap.min.css" rel="stylesheet"
	media="all">

<!-- Vendor CSS-->
<link href="vendor2/animsition/animsition.min.css" rel="stylesheet"
	media="all">
<link
	href="vendor2/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css"
	rel="stylesheet" media="all">
<link href="vendor2/wow/animate.css" rel="stylesheet" media="all">
<link href="vendor2/css-hamburgers/hamburgers.min.css" rel="stylesheet"
	media="all">
<link href="vendor2/slick/slick.css" rel="stylesheet" media="all">
<link href="vendor2/select2/select2.min.css" rel="stylesheet"
	media="all">
<link href="vendor2/perfect-scrollbar/perfect-scrollbar.css"
	rel="stylesheet" media="all">

<!-- Main CSS-->
<link href="css/theme.css" rel="stylesheet" media="all">
<!-- header things -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
 
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css"
	href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css"
	href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css"
	href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css"
	href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css"
	href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css"
	href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css"
	href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css"
	href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css"
	href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css"
	href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<!-- Header -->
<?php include 'header.php'?>

<body class="">
<section>
	<div class="page-wrapper">
		<div class="page-content--bge5">
			<div class="container">
				<div class="login-wrap">
					<div class="login-content">
						<div class="login-logo">
							<a href="#"> <img
								src="IMG/adaptspac.png"
								style="width: 150px" alt="CoolAdmin">
							</a>
						</div>
						<div class="login-form">
							<form action="" method="post">
								<div class="form-group">
									<label>E-mail</label> <input
										class="au-input au-input--full" type="email" name="emaillog"
										placeholder="Email">
								</div>
									<div class="form-group">
										<label>Senha</label> <input class="au-input au-input--full"
											type="password" name="passworddb" placeholder="Senha">
									</div>
								</div> 
								
								<button class="au-btn au-btn--block au-btn--green m-b-20"
								type="submit" id="entrar" name="login">Entrar</button>
								<?php require 'includes/loginconfirmation.php';?>
								<div class="register-link">
									<p>
										Não tem conta ainda? <a href="register.php">Cadastre-se aqui</a>
									</p>
									<p>
										Esqueceu sua Senha <a href="forget-pass.php">Clique aqui</a>
									</p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>
	</section>

	<!-- Jquery JS-->
	<script src="vendor2/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS-->
	<script src="vendor2/bootstrap-4.1/popper.min.js"></script>
	<script src="vendor2/bootstrap-4.1/bootstrap.min.js"></script>
	<!-- Vendor JS       -->
	<script src="vendor2/slick/slick.min.js">
    </script>
	<script src="vendor2/wow/wow.min.js"></script>
	<script src="vendor2/animsition/animsition.min.js"></script>
	<script
		src="vendor2/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
	<script src="vendor2/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendor2/counter-up/jquery.counterup.min.js">
    </script>
	<script src="vendor2/circle-progress/circle-progress.min.js"></script>
	<script src="vendor2/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="vendor2/chartjs/Chart.bundle.min.js"></script>
	<script src="vendor2/select2/select2.min.js">
    </script>

	<!-- Main JS-->
	<script src="js/main0.js"></script>
	

</body>

</html>
<!-- end document-->