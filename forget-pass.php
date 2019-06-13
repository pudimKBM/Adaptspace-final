<!DOCTYPE html>
<html lang="en">

<?php include 'head.html' ?>

<body class="">
<?php include('header.php'); ?>

<section class="m-footer shadow-footer bg-black">


	<div class="page-wrapper">
		<div class="page-content--bge5">
			<div class="container">
				<div class="login-wrap">
					<div class="login-content">
						<div class="login-logo">
						<style>
						img {
    max-width: 50%;
    height: auto;
						}
						</style>
							<a href="#"> <img  src="IMG/adaptspac.png" alt="CoolAdmin">
							</a>
						</div>
						<div class="login-form">
							<form  method="post">
								<div class="form-group">
									<label>E-mail</label> <input
										class="au-input au-input--full" type="email" name="email"
										placeholder="Email">
								</div>
								<?php include 'includes/recovery.php' ?>
								<button class="au-btn au-btn--block au-btn--green m-b-20"
									type="submit" name="submit" value="submit" >Enviar</button>
									
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<?php include 'footer.php';?>
	 <?php include 'script.html';?>

</body>

</html>
<!-- end document-->