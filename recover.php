<!DOCTYPE html>
<html lang="en">
<?php
  
  
error_reporting(E_ALL);
include 'db.php';
$email = $_GET['email'];
$valid = "SELECT * FROM `users` WHERE `email`= '$email'";
$queryval = $connection->query($valid);
if($queryval->num_rows > 0){
    while ($rows = $queryval->fetch_assoc()) {
        $datef = $rows['rec_date'];
   }
}

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

						<!--Ícone do Look na Página(melhor mascote)-->
						<div class="row">
							<a href="#" class="mx-auto"> 
								<img src="IMG/adaptspac.png" style="width: 150px" alt="CoolAdmin">
							</a>
						</div>

						<div class="row">

							<div class="login-form col-12">
								<?php 
								date_default_timezone_set('America/Sao_Paulo');
								$datax = date('d-m-Y');
								if($datef > $datax ){ 
								?>
							
								<form  method="post">
									<div class="form-group">
										<label>Insira aqui uma nova <strong>Senha</strong></label> 
										<input class="w-100" type="password" name="senha" placeholder="Nova senha">
									</div>
									<div class="row">
										<?php include 'includes/fecoverscript.php' ?>
										<button class="btn btn-primary px-5 my-3 mx-auto" type="submit">Enviar</button>
									</div>
								</form>
								<?php
									}else if($datax > $datef) 
									{
								?>
									<h1> Link expirado</h1>
								<?php
									} 
									if (!isset($_GET['email']))
									{
								?>
									<h1> Está tudo bem ?</h1>
								<?php } ?>
							</div>

						</div>

					<!--Fim da Borda desenhada do Painel-->
					</div>
				<!--Fim do Painel-->
				</div>
			
			<!--Fim das Col e mx-auto-->
			</div>
		<!--Fim da Row-->
		</div>
	<!--Fim do Container my-5-->
	</div>
</section>

	
	<?php include 'footer.php';?>
	<?php include 'script.html';?>

</body>

</html>
<!-- end document-->