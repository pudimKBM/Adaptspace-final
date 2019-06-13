<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if ($_SESSION['logged_in'] == 'True') {
    header('Location: index');
}
error_reporting(0);

?>
<head>
<!-- Required meta tags-->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<meta name="author" content="Hau Nguyen">
<meta name="keywords" content="au theme template">

<!-- Title Page-->
<title>Registro</title>

<!-- Fontfaces CSS-->
<link href="css/font-face.css" rel="stylesheet" media="all">
<link href="vendor2/font-awesome-4.7/css/font-awesome.min.css"
	rel="stylesheet" media="all">
<link href="vendor2/font-awesome-5/css/fontawesome-all.min.css"
	rel="stylesheet" media="all">
<link href="vendor2/mdi-font/css/material-design-iconic-font.min.css"
	rel="stylesheet" media="all">

<!-- Bootstrap CSS-->
<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet"
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
<meta charset="UTF-8">
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

<body>

<div  class="conteiner">

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
						<div id="test2" class="login-form">
							<form method="post">
								<div class="form-group">
									<label>Nome</label> <input class="au-input au-input--full"
										type="text" name="firstname" placeholder="Nome"
										required="required">
								</div>
								<div class="form-group">
									<label>Sobrenome</label> <input
										class="au-input au-input--full" type="text" name="lastname"
										placeholder="Sobrenome" required="required">
								</div>
								<div class="form-group">
									<label>E-mail</label> <input class="au-input au-input--full"
										type="email" name="email" placeholder="Email"
										required="required">
								</div>
								<div class="form-group">
									<label>Senha</label> <input class="au-input au-input--full"
										type="password" name="password" placeholder="Senha"
										required="required">
								</div>
								<div class="login-checkbox">
									<label> <b>Você quer:</b> </label> <label> <input type="radio"
										name="type" value="admin">Criar um produto
									</label> <label> <input type="radio" name="typl][0-e" value="client">Comprar
										um produto
									</label>

								</div>
								<div class="login-checkbox">
									<label> <input type="checkbox" name="aggree"
										required="required"><i>Aceito os <a href="Termos e condicoes.php">termos e políticas de privacidade</i></a>
									</label>
								</div>
                                <?php require 'includes/signupconfirmation.php'; ?>
                                <button
									class="au-btn au-btn--block au-btn--green m-b-20"
									id="confirmed" name="sign" class="signup" type="submit">Registrar-se</button>

								<!--   <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                    </div>
                                </div> -->
							</form>
							<div class="register-link">
								<p>
									<strong>Já tem uma conta?</strong> <a href="login.php"><strong>Faça seu Login</a></strong>
								</p>
								<p>
								<strong>Esqueceu sua Senha? </strong><a href="forget-pass.php"><strong> Clique Aqui</strong></a>
							</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	</div>
	
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