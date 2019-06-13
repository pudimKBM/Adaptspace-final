<!DOCTYPE html>
	<?php
		session_start();

		if (! isset($_GET['id'])) {
			header('Location: index');
		}

		if (isset($_SESSION['logged_in'])) {
			$idsess = $_SESSION['id'];
		}
		$id_product = $_GET['id'];
		include 'db.php';

		// get products
		$queryproduct = "SELECT id, name, price, description, id_picture, thumbnail, id_usr, exp_date
					FROM product WHERE id = '{$id_product}'";
		$result1 = $connection->query($queryproduct);

		if ($result1->num_rows > 0) {
			// output data of each row
			while ($rowproduct = $result1->fetch_assoc()) {
				$id_usr = $rowproduct['id_usr'];
				$id_productdb = $rowproduct['id'];
				$name_product = $rowproduct['name'];
				$price_product = $rowproduct['price'];
				$id_pic = $rowproduct['id_picture'];
				$description = $rowproduct['description'];
				$thumbnail_product = $rowproduct['thumbnail'];
				$exp_date = $rowproduct['exp_date'];
				
				$next_date= date('d/m/Y', strtotime($exp_date. ' + 10 days'));
			
                $final_date= date('d/m/Y', $exp_date);
               $next_date2= date('d/m/Y', strtotime($exp_date));
			}
		}

	?>
<html lang="pt-br">
<?php include 'head.html' ?>
<link href="css/shop.css" rel="stylesheet" type="text/css">




<body class="text bg-black">
	<!-- Header -->
	<?php include 'header.php';?>


<section class="m-footer shadow-footer bg-black">
	<!--Product Page-->
	<form method="post">

		<div class="container my-5">
	
			<div class="row">
	
				<div class="col-lg-6 col-md-6 col-12 my-sm-0 my-3">
					<div class="box bg-light rounded border p-3">
						<!--Imagem do Produto-->
						<div class="box-image">
	
							<div class="d-block">
								<img class="img-thumbnail border" src="<?= $thumbnail_product; ?>">
							</div>
							
						</div>
					</div>
				</div>
	
				<div class="col-lg-6 col-md-6 col-12 my-sm-0 my-3">
					<div class="box bg-light rounded border p-3">
	
						<div class="box-text bg-light text-center border">
							<div class="row">
								<h4 class="title mb-3 mx-auto">
									<?= $name_product; ?>
								</h4>
							</div>
							<div class="row text-left">
								<p class="mb-3 px-3">
									<?= $description;?>
								</p>
							</div>
	
							<hr>
							<div class="row">
								<span class="lead font-weight-bold mb-3 mx-auto text-primary" style="font-size: 2em;">R$ <?= number_format($price_product, 2, ',', ''); ;?></span>
							</div>
	
							<div class="row">
								<select class="custom-select col-5 mx-auto mb-3" id="example" name="size">
									<option>Tamanho</option>
									<option>P</option>
									<option>M</option>
									<option>G</option>
									<option>GG</option>
								</select>
							</div>
	

							<input type="number" name="id_prod" value='<?= $id_productdb;?>' hidden /> 
										
							<input type="number" name="id_usr_create" value='<?=  $id_usr;?>' hidden>
											
							<input class="size8 m-text18 t-center num-product"
											type="number" name="quantity" value="1" hidden>
	
							<div class="bg-light">
								<div class="bg-secondary rounded text-center m-3 py-2">
									<span id="number" class="text-light" data-countdown="<?=$exp_date?>">
									</span>
								</div>
							</div>
	
							<div>
								<button type="submit" value="buy" name="buy" class="text btn btn-orange px-4 my-2">
									Comprar
								</button>
							</div>
	
						</div>
	
					</div>
	
					<?php 
	
	
						if (isset($_POST['buy'])) {
										
							if (! isset($_SESSION['logged_in'])) {
								echo "<meta http-equiv='refresh' content='0;url=login.php' />";
							}else if($_POST['size'] == "Tamanho"){
								
							}
							else {
								$quantity = $_POST['quantity'];
								var_dump($quantity);
								$size =$_POST['size'];
								$usrc_id =$_POST['id_usr_create'];
								$id_pd = $_POST['id_prod'];
							
								// inserting into command
								include 'db.php';
								
								$querybuy = "INSERT INTO command(id_produit, quantity,Tamanho, statut, id_user, id_usr_create)
						VALUES ('$id_pd','$quantity','$size','ordered', '$idsess', '$usrc_id')";
								
								if ($connection->query($querybuy) === TRUE) {
									$_SESSION['item'] += 1;
									
									echo "<meta http-equiv='refresh' content='0;url=cart.php' />";
								} else {
									echo "<h5 class='text-red'>Error: " . $querybuy . "</h5><br><br><br>" . $connection->error;
								}
								$connection->close();
							}
						}
	
	
					?>
	
				</div>
	
			</div>

		</div>

	</form>
</section>

	<?php include 'footer.php';?>
	<?php include 'script.html';?>

  <!--Data-Countdown Cronometro-->
  <script type="text/javascript" src="src/js/jquery.countdown.js"></script>
  
  <script type="text/javascript">
    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('%D : %H : %M : %S'));
      });
    });
  </script>

  <!--=========================================================================================================-->

</body>
