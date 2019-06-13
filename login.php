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
	<?php include 'header.php';?>
	<section class="m-footer shadow-footer bg-black">
		<div class="container my-5">

			<div class="row">

				<!--Ocupa Apenas Metade da tela, ou toda se for Mobile, e Centraliza-->
				<div class="col-lg-6 col-md-6 col-12 mx-auto">

					<!--Painel-->
					<div class="bg-light rounded border p-2">

						<!--Borda desenhada do painel-->
						<div class="rounded border p-3">

							<!--Ícone do Look na Página(melhor mascote)-->
							<div class="row">
								<a href="#" class="mx-auto"> 
									<img src="IMG/adaptspac.png" style="width: 150px" alt="CoolAdmin">
								</a>
							</div>

							<!--Div-Row do form de Login-->
							<div class="row">

								<div class="login-form col-12">
									<form action="" method="post">
										<div class="row">
											<!--Email-->
											<div class="form-group mx-auto">
												<label>E-mail</label> <input class="w-100" type="email" name="emaillog" placeholder="Email">
											</div>
											<!--Senha-->
											<div class="form-group mx-auto">
												<label>Senha</label> <input class="w-100"
													type="password" name="passworddb" placeholder="Senha">
											</div>

										</div>

										<!--Botão de Entrar-->
										<div class="row">
											<button class="btn btn-primary px-5 my-3 mx-auto" type="submit" id="entrar" name="login">Entrar</button>
										</div>

										<?php require 'includes/loginconfirmation.php';?>
										
										<!--Não tem conta? Esqueceu sua Senha? Logo Abaixo...-->
										<div class="row m-3">
											<div class="col-12 mx-auto">
												<p class="text-center">
													Não tem conta ainda? <a class="text-primary" href="register.php">Cadastre-se aqui</a>
												</p>
												<p class="text-center">
													Esqueceu sua Senha <a class="text-primary" href="forget-pass.php">Clique aqui</a>
												</p>
											</div>
										</div>
										
									</form>
								</div>

							<!--Fim do Div-Row do form-->
							</div>

						<!--Fim da Borda desenhada do Painel-->
						</div>

					<!--Fim do Painel-->
					</div>

				</div>

			</div>
		</div>
	</section>
	
	<?php include 'footer.php';?>
	 <?php include 'script.html';?>

</body>

</html>
<!-- end document-->