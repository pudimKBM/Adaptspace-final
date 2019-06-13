<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if ($_SESSION['logged_in'] == 'True') {
    header('Location: ../index.php');
}
error_reporting(0);

?>

<?php include 'head.html' ?>

<body class="text bg-black">
	<!-- Header -->
	<?php include 'header.php'?>
	<section class="m-footer shadow-footer bg-black">
	<div class="container my-5">

		<div class="row">

			<div class="col-lg-6 col-md-6 col-12 mx-auto">

				<div class="bg-light rounded border p-2">

					<div class="rounded border p-3">

						<div class="row">
							<a href="#" class="mx-auto"> 
								<img src="IMG/adaptspac.png" style="width: 150px" alt="CoolAdmin">
							</a>
						</div>

						<div id="test2" class="login-form col-12">
							<form method="post">
								<div class="form-group">
									<label>Nome</label> <input class="w-100"
										type="text" name="firstname" placeholder="Nome" required="required">
								</div>
								<div class="form-group">
									<label>Sobrenome</label> <input
										class="w-100" type="text" name="lastname" placeholder="Sobrenome" required="required">
								</div>
								<div class="form-group">
									<label>E-mail</label> <input class="w-100"
										type="email" name="email" placeholder="Email"
										required="required">
								</div>
								<div class="form-group">
									<label>Senha</label> <input class="w-100"
										type="password" name="password" placeholder="Senha"
										required="required">
								</div>
								<div class="login-checkbox">
									<div>
										<label> <b>Você quer:</b> </label> 
									</div>
									<label> <input type="radio" name="type" value="admin" class="mx-1"> Criar uma campanha </label> 
									<label> <input type="radio" name="type" value="client" class="mx-1"> Criar um produto </label>

								</div>
								<div class="login-checkbox">
									<label> <input type="checkbox" name="aggree" required="required" class="mx-1">
									<i>Aceito os <a href="Termos e condicoes.php">termos e políticas de privacidade</i></a>
									</label>
								</div>
																<?php require 'includes/signupconfirmation.php'; ?>
								
								<div class="row">
									<button class="btn btn-primary px-5 my-3 mx-auto"
									id="confirmed" name="sign" class="signup" type="submit">Registrar-se</button>
								</div>
							</form>

							<!--Não tem conta? Esqueceu sua Senha? Logo Abaixo...-->
							<div class="row">
								<div class="col-12 mx-auto">
									<p class="text-center">
										Não tem conta ainda? <a class="text-primary" href="register.php">Cadastre-se aqui</a>
									</p>
									<p class="text-center">
										Esqueceu sua Senha <a class="text-primary" href="forget-pass.php">Clique aqui</a>
									</p>
								</div>
							</div>
						</div>

					</div>

				</div>

			</div>

		</div>

	</div>
	</section>
	<?php include 'footer.php';?>
	 <?include 'script.html';?>
	
</body>

</html>
<!-- end document-->