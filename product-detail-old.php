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
<head>
	<title><?= $name_product ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
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
		href="vendor/n/css/n.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>



<body  class="">

	<!-- Header -->
	<?php include('header.php'); ?>

	<!-- breadcrumb -->

	<form method="post">
		<!-- Product Detail -->
		<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="col-md-6 col-sm-12 p-t-30 respon5">
				<div  class="wrap-slick3 flex-sb flex-w">
					<div class="row slick3 mx-auto">
						<?php
		
							// get categories
							$querypic = "SELECT * FROM `product` WHERE id_picture= '{$id_pic}' ";
							$total = $connection->query($querypic);
							if ($total->num_rows > 0) {
								// output data of each row
								while ($rowpic = $total->fetch_assoc()) {
									$pics = $rowpic['thumbnail'];
							?>
					
						<div class="item-slick3 " data-thumb="<?= $pics; ?>">
							<div class="wrap-pic-w ">
								<img src="<?= $pics; ?>" alt="IMG-PRODUCT">
							</div>
						</div>
							<?php }}?>
					</div>

				</div>
			</div>
			
			<div class="col-md-6 col-sm-12  p-t-30 respon5">
				<section class="card p-5">
					<div class="row">
						<h4 class="product-detail-name m-text16">
							<?= $name_product; ?>
						</h4>
					</div>
					<div class="row">
						<p class="s-text15 ">
							<?= $description; ?>
						</p>
					</div>
					<hr>
					<div class="row">
						<span class="m-text17 text-success font-weight-bold m-b-30">
							R$ <?= number_format($price_product, 2, ',', ''); ;?>
						</span>
					</div>
				
					
				
				
					<div class="row" style="padding-top: 5%;">
						<div class="flex-m flex-w p-b-10">
							<div class="dropdown-success rs2-select2 rs3-select2 bo4 of-hidden ">
									<select class="custom-select col" name="size">
										<option class="dropdown-item">Tamanho</option>
										<option class="dropdown-item" >P</option>
										<option class="dropdown-item" >M</option>
										<option class="dropdown-item">G</option>
										<option class="dropdown-item">GG</option>
									</select>
							</div>
						</div>
						<button  
							type="submit" 
							value="buy" 
							name="buy" 
							class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" 
							style="width: 82%;"> 
								Comprar
						</button> 
						<div  class="row countdonw_container w-100 m-t-10 m-t-20" style="align-content: center;">
							<div class="text-center mx-auto " >
								<span class="countdown_name" style="align-content: center; font-size: 2em" data-countdown="<?=$exp_date?>"></span>
							</div >						
						</div>

						<div class="row w-100" style="font-size: 1em;align-content: center;" >
							<span class="mx-auto">DIAS : HORAS : MIN : SEG </span>
						</div>
					
						
						<div class="block2-btn-addcart w-size1 trans-0-4"></div>

						<div class="flex-r-m flex-w p-t-10">
							<div class="w-size16 flex-m flex-w">
								<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
									<input type="number" name="id_prod" value='<?= $id_productdb;?>' hidden /> 
										
									<input type="number" name="id_usr_create" value='<?=  $id_usr;?>' hidden />
										
									<input class="size8 m-text18 t-center num-product"
										type="number" name="quantity" value="1" hidden>
								</div>
								</div>
							</div>
						</div>
						<section class="card p-2">
							
								<p class="font-weight-bold">Informações Importantes</p>
								<br>
								<ul>
									<li><p>Disponível até <?= $next_date2;?>.
									O transporte começa em <?=$next_date; ?></p></li>.
									
								</ul>
								
								
							
						</section>
					</div>
					
					
				</section>
				
				
									
				<?php 


					if (isset($_POST['buy'])) {
									
						if (! isset($_SESSION['logged_in'])) {
							echo "<meta http-equiv='refresh' content='0;url=http://adaptspace.com.br/login.php' />";
						}else if($_POST['size'] == "Tamanho"){
							
						}
						else {
							$quantity = $_POST['quantity'];
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
	</form>
	





	<!-- Footer -->
	<?php include 'footer.php'?>


	<!-- Back to top -->
	
	<script type="text/javascript">

		
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
		$(document).ready(function(){
		$('[data-countdown]').each(function() {
		  var $this = $(this), finalDate = $(this).data('countdown');
		  $this.countdown(finalDate, function(event) {
		    $this.html(event.strftime('%D : %H : %M : %S'));
		  });
		});
	})
	</script>

	<script type="text/javascript"
		src="src/js/jquery.countdown.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
