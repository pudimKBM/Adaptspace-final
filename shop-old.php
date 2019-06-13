<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
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
<!--===============================================================================================-->
</head>
<body class="">
<?php 
session_start();
if ($_SESSION['logged_in']) {
	$idsess = $_SESSION['id'];
	$d =xd;
}
?>
	<?php include 'header.php';?>

	<!-- Slide1 -->
	<section class="slide1" >
		<div class="wrap-slick1">
			<div class="slick1">
                    <!--<video  controls loop poster mute class="item-slick1 item1-slick1">
			        <source src="IMG/videoplayback.mp4" type="video/mp4">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">

						<div class="wrap-btn-slide1 w-size1 animated visible-false zoomIn visible-true" data-appear="zoomIn">
							
							
						</div>
					</div>
				</video>-->

				<div class="item-slick1 item1-slick1"
					style="background-image: url(IMG/0.png);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">

						<div class="wrap-btn-slide1 w-size1 animated visible-false zoomIn visible-true" data-appear="zoomIn">
							
							
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
		    <h5 class="text-center " >
		<span class=> Plataforma oficial de influenciadores, celebridades, ações sociais e artistas independentes.</span><br><br><br>
		  </h5>

					<!-- Product -->
					<div class="row">
					<?php
    
    include 'db.php';
    
    $queryfirst = "SELECT * FROM `product` WHERE validate = 1 ORDER BY `product`.`id` DESC ";
	$resultfirst = $connection->query($queryfirst);
    if ($resultfirst->num_rows > 0) {
	
        // output data of each row
        while ($rowfirst = $resultfirst->fetch_assoc()) {
			
            $id_best = $rowfirst['id'];
            $name_best = $rowfirst['name'];
            $price_best = $rowfirst['price'];
            $thumbnail_best = $rowfirst['thumbnail'];
			$totalsold = $rowfirst['total'];
			$id_create = $rowfirst['id_usr'];
			$exp_date = "{$rowfirst['exp_date']}";
			
			
			
            
            ?>
			
						<div class="col-sm-12 col-md-6 col-lg-4 " id="<?= $id_best;?>">
							<!-- Block2 -->
							
							<div class="block2">
                                    <a href="/product-detail.php?id=<?=$id_best?>">
								    <div
									class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="<?= $thumbnail_best; ?>" alt="IMG-PRODUCT">
                                        
									
									    
								    </div>
							        </a>
							
								<div  class="row countdonw_container" style="align-content: center;margin-left: 25%;">
										<div class="text-center" >
											<span class="countdown_name" style="align-content: center;" data-countdown="<?=$exp_date?>"></span>
										</div >
										
								</div>
								<div class="row" style="font-size: 1.2em;align-content: center;margin-left: 20%;" >
											<span>DIAS : HORAS : MIN : SEG </span>
										</div>
								<p id=<?= $nomeid?>></p>

								<div class="block2-txt" style="margin-left: 20%;">
									<a class="block2-name dis-block l-text1 p-b-5" style="font-size: 1em; color: #333;font-family: Arial;font-weight: bold;">
										<?= $name_best; ?>
									</a> <span class="block2-price l-text1 p-r-5" style="font-size: 1.2em; color: #333;font-family: Arial;font-weight: bold;">
										R$<?php  echo number_format($price_best, 2, ',', ''); ?>
									</span>
									
					<div style="padding-top: 5%;">
						
					<a href="/product-detail.php?id=<?=$id_best?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" style="width: 82%;">Comprar</a>
						<!-- 					<div class="flex-m flex-w"> -->
						<!-- 						<div class="s-text15 w-size15 t-center"> -->
						<!-- 							Color -->
						<!-- 						</div> -->

						<!-- 						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16"> -->
						<!-- 							<select class="selection-2" name="color"> -->
						<!-- 								<option>Choose an option</option> -->
						<!-- 								<option>Gray</option> -->
						<!-- 								<option>Red</option> -->
						<!-- 								<option>Black</option> -->
						<!-- 								<option>Blue</option> -->
						<!-- 							</select> -->
						<!-- 						</div> -->
						<!-- 
											</div> -->
						
											<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
										<!--<a class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" href="product-detail.php?id" > Comprar</a> -->
											
										</div>
						

						<div class="flex-r-m flex-w p-t-10">
							<div class="w-size16 flex-m flex-w">
								<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
									<input type="number" name="id_prod" value='<?= $id_best;?>' hidden /> 
									
									<input type="number" name="id_usr_create" value='<?= $id_create;?>' hidden />
									
									<input class="size8 m-text18 t-center num-product"
										type="number" name="quantity" value="1" hidden>
								</div>

								</form>
								
							<div
							
									class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
									<!-- Button -->
								</div>
							</div>
						</div>
					</div>
				
								</div>
							</div>
						</div>
					<input hidden type="text"    class ="mano" id="<?=$nomeid2?>"  value="<?=$exp_date ?>" >
					
						
					
 <?php 


}}if (isset($_POST['buy'])) {
			      
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

					<!-- Pagination -->

				</div>
			</div>
		</div>
	</section>


	<!-- Blog -->
	

	<!-- Instagram -->
	 <h4 class="text-center " style="padding-bottom: 45px;">
		<span class=>Aviso: As entregas serão feitas a partir do término de cada campanha.</br><br>
		  <i>Escolha o tamanho e clique em comprar</i></span>
		  </h4>
		
			<div class="row">
	<section class="instagram p-t-20">
		<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">@ Siga nosso Instagram</h3>
		</div>

		<div id="instafeed" class="flex-w">
			
			
		</div>
		
		
	</section>
	</div>

	<!-- Shipping -->




	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top"> <i class="fa fa-angle-double-up"
			aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>


	<script type="text/javascript" src="js/instafeed.min.js"></script>
	<script type="text/javascript" src="js/ista.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript"
		src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript"
		src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript"
		src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript"
		src="vendor/lightbox2/js/lightbox.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript"
		src="vendor/sweetalert/sweetalert.min.js"></script>
		<script type="text/javascript"
		src="vendor/sweetalert/sweetalert.min.js"></script>
		<script type="text/javascript"
		src="src/js/jquery.countdown.js"></script>
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
				swal(nameProduct, "Adicionado a wishlist !", "success");
			});
		});
		$('[data-countdown]').each(function() {
		  var $this = $(this), finalDate = $(this).data('countdown');
		  $this.countdown(finalDate, function(event) {
		    $this.html(event.strftime('%D : %H : %M : %S'));
		  });
		});
	
		
	</script>

	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<?php include 'footer.php';?>

</body>
</html>
