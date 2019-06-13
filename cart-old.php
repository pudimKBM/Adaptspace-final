<!DOCTYPE html>

<html lang="en">
<head>
<title>Cart</title>
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
<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="">
<?php
include 'db.php';

session_start();

if (! isset($_SESSION['logged_in']) or ! isset($_SESSION['id'])) {
    header('Location: login.php');
} 
else {
    $idsess = $_SESSION['id'];
}
  
  
?>
	<?php include 'header.php';?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m">
		<h2 class="l-text2 t-center" style="color: black;">CHECKOUT</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class=" container-fluid">
			<!-- Cart item -->
			<form class="col" action="library/vendor/pagseguro/pagseguro-php-sdk/public/Checkout/createPaymentRequestLightbox.php" method="post" onsubmit="PagSeguroLightbox(this); return false;">
			<div class="row">
			
							
							<div class="col-lg">
								<div class="card">
									<div class="card-header">
										<strong class="st">Checkout</strong>
                                    </div>
                                    <div class="row"> 
                                    
									        <div class="card-body card-block">
                                            
									        	<div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md">
                                                            <label for="company" class=" form-control-label">Nome</label>
                                                            <input type="tex t" id="nome" name="nome" placeholder="Digite seu nome" class="form-control" rquired>
                                                        </div>
                                                        <div class="col-md">
                                                                <label for="company" class=" form-control-label">Sobrenome</label>
                                                            <input type="text" id="nome2" name= "nome2" placeholder="Digite seu sobrenome" class="form-control" rquired>
                                                        </div>
                                                        <div class="col-sm">
                                                        <div class="form-group">
                                                            
                                                            <label for="vat" class=" form-control-label"></label>Data de nascimento <input type="date" id="datanas" name="nasc" class="form-control" max="2000-01-01" rquired>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            
                                                            <label for="vat" class=" form-control-label">Sexo</label><!--<input type="text" id="sex" name="sex" placeholder="M" class="form-control" rquired>-->
																					<select class="custom-select col" name="sex" required>
																						<option class="dropdown-item" >M</option>
																						<option class="dropdown-item">F</option>
																					</select>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-sm">
                                                        <div class="form-group">
                                                            <label for="street" class=" form-control-label">Rua</label>
                                                            <input type="text" name="rua" id="rua" placeholder="Rua Domingos de morais" class="form-control" rquired>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="row form-group">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    <label for="city" class=" form-control-label">Cidade</label>
                                                                    <input type="text" id="cidade" placeholder="Sao Paulo" name="cidade" class="form-control" rquired>
        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="col-sm">
                                                        <div class="form-group">
                                                            <label for="country" class=" form-control-label" >Estado</label>
                                                            <input type="text" id="estado" name="est" placeholder="SP" class="form-control" maxlength="2" style="text-transform: uppercase;" rquired>
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                </div> 
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <div class="form-group">
                                                            <label for="postal-code" class=" form-control-label"> CEP </label> <input type="number" id="cep" name="cep" placeholder="Postal Code" class="form-control" rquired>
                                                        </div>
                                                    </div>
													
                                                    <div class="col-sm">
                                                        <div class="form-group">
                                                            <label for="postal-code" class=" form-control-label"> Número </label> <input type="number" name="numero" id="numeroC" placeholder="Número da casa" class="form-control" rquired>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="form-group">
                                                            <label for="postal-code" class=" form-control-label"> Bairro </label> <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="form-control">
                                                        </div>
                                                    </div>
                                                    	 <input id="val" type="text" name="comp2"  hidden class="form-control"/>
                                                    <div class="col-sm">
                                                        <div class="form-group">
                                                            <label class=" form-control-label"> Complemento </label> <input type="text" name="comp" id="complemento" placeholder="Complemento" class="form-control">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
												<div class="col-sm">
                                                        <div class="form-group">
                                                            <label for="postal-code" class=" form-control-label"> CPF </label> <input type="number" id="cpf" name="cpf" placeholder="CPF somente em numeros" maxlength="11" class="form-control" rquired>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="form-group">
                                                            <label for="CPF" class=" form-control-label"> Celular1 </label> <input type="tel" name ="tel1" id="celular" placeholder="(11)xxxx-xxxx" class="form-control"  rquired>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm">
                                                        <div class="form-group">
                                                            <label for="tel" class=" form-control-label"> Celular2 </label> <input type="tel" id="celular" name= "tel2" placeholder="(11)xxxx-xxxx" class="form-control" rquired>
                                                        </div>
                                                    </div>
                                                </div>        
                                            </div>
                                          
                                           
										
						<input calss="col-md-6" id="comp" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/120x53-comprar.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                                            
                               
                                </div>
                                </div><?php
								$totalQ =  ("SELECT sum(product.price) as total FROM product, command 
WHERE command.id_produit = product.id AND command.statut = 'ordered' AND command.id_user =  $idsess;" );
$resultTotal = $connection->query($totalQ);
if ($resultTotal->num_rows >0 ){
	while($rowq = $resultTotal->fetch_assoc()){
		$total = $rowq['total'];
		$total2 =  number_format($total, 2, '.', '');
	}
}

?>
								<div
				class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">Total</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm"> Subtotal: </span> <span
						class="m-text21 w-size20 w-full-sm" id="XD2" maxlength="6" > <?=$total2; ?> </span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">  Frete: </span>

					<div class="w-size20 w-full-sm">
					

						<span class="s-text19"> Calculo de frete </span>
						<form>
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" id="cep_destino" type="text"
								name="postcode" placeholder="CEP" required>
						</div>
						
						<span class="m-text20"  style="allign-content: center;"  > R$ : </span> 
				 <input id="valor_frete" type="text" name="valor_frete"  disabled/></br>
						<div class="size14 trans-0-4 m-b-10">
							<!-- Button -->
							<button type="button" onclick="LoadFrete();"
								class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Calcular Frete</button>
						</div>
						
					</div>
				</div>

				<!--  -->
				

				
			</div>
			</form>
								</div>
			<div class="col-md-6">
			<div class=" container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<a></a>
					<table class="table-shopping-cart">

						<tr class="table-head">
							<th class="column-1"></th>
							<th class="col-md">Produto</th>
							<th class="column-3">Preço</th>
							<th class="col-sm-3 column-4 ">Quantidade</th>
							<th class="col-sm-1 column-5"></th>
							
						</tr>
	<?php

// get products
$queryproduct = "SELECT  product.name as 'name',
          product.id as 'id', product.price as 'price',
          product.thumbnail as 'thumb',
          category.name as 'category', command.id_user, command.statut,
          command.quantity as 'quantity',
          command.id as 'id_trans',
          command.Tamanho as 'Tamanho'
		  
FROM category, product, command
WHERE command.id_produit = product.id AND product.id_category = category.id AND command.statut = 'ordered' AND command.id_user =  $idsess;";
$result1 = $connection->query($queryproduct);

if ($result1->num_rows > 0) {
    // output data of each row
    while ($rowproduct = $result1->fetch_assoc()) {
		
        $thumb = $rowproduct['thumb'];
        $id_productdb = $rowproduct['id_trans'];
        $name_product = $rowproduct['name'];
        $category_product = $rowproduct['category'];
        $quantity_product = $rowproduct['quantity'];
        $price_product = $rowproduct['price'];
        $tam = $rowproduct['Tamanho'];
        
        ?>
						<tr class="table-row">


							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?= $thumb; ?>" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><?= $name_product; ?> - <?= $tam; ?></td>
							<td class="column-3"><?= $price_product; ?></td>
							
							<td class="col-sm-3 column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button
										class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product"
										type="number" name="num-product1"
										value="<?= $quantity_product; ?>">

									<button
										class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div><div class="row w-100 m-0">
									<p class="w-100 text-canter product-data">Quantidade</p>
								</div>
							</td>
						
						<td class="col-sm-1 column-5"><a href="deletecommand.php?id=<?= $id_productdb; ?>"><i
									class="material-icons red-text">excluir produto</i></a></td>
						</tr>
							<?php
    }
}
?>

					</table>
				</div>
			</div>

<!-- 			<div -->
<!-- 				class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm"> -->
<!-- 				<div class="flex-w flex-m w-full-sm"> -->
<!-- 					<div class="size11 bo4 m-r-10"> -->
<!-- 						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" -->
<!-- 							name="coupon-code" placeholder="Coupon Code"> -->
<!-- 					</div> -->

<!-- 					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10"> -->
						<!-- Button -->
<!-- 						<button -->
<!-- 							class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"> -->
<!-- 							Apply coupon</button> -->
<!-- 					</div> -->
<!-- 				</div> -->

<!-- 				<div class="size10 trans-0-4 m-t-10 m-b-10"> -->
					<!-- Button -->
<!-- 					<button -->
<!-- 						class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"> -->
<!-- 						Update Cart</button> -->
<!-- 				</div> -->
<!-- 			</div> -->

	<?php 
	
	
	?>
			<!-- Total -->
			
			</div>
		</div>
		</div>
	</section>
	<script>
		</script>



	<!-- Footer -->
	<?php include 'footer.php'?>

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top"> <i class="fa fa-angle-double-up"
			aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript"
		src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript"
		src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="frete.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
		$('#nome').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#nome').on('change', function(){
		if ($('#nome').val()== ""){
			$('#nome').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#nome').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#nome2').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#nome2').on('change', function(){
		if ($('#nome2').val()== ""){
			$('#nome2').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#nome2').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#datanas').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#datanas').on('change', function(){
		if ($('#datanas').val()== ""){
			$('#datanas').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#datanas').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#rua').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#rua').on('change', function(){
		if ($('#rua').val()== ""){
			$('#rua').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#rua').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#cidade').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#cidade').on('change', function(){
		if ($('#cidade').val()== ""){
			$('#cidade').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#cidade').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#estado').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#estado').on('change', function(){
		if ($('#estado').val()== ""){
			$('#estado').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#estado').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#cep').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#cep').on('change', function(){
		if ($('#cep').val()== ""){
			$('#cep').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#cep').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#cep').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#cep').on('change', function(){
		if ($('#cep').val()== ""){
			$('#cep').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#cep').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#cpf').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#cpf').on('change', function(){
		if ($('#cpf').val()== ""){
			$('#cpf').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#cpf').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#celular').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#celular').on('change', function(){
		if ($('#celular').val()== ""){
			$('#celular').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#celular').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#tel2').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#tel2').on('change', function(){
		if ($('#tel2').val()== ""){
			$('#tel2').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#tel2').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#bairro').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#bairro').on('change', function(){
		if ($('#bairro').val()== ""){
			$('#bairro').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#bairro').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#numeroC').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#numeroC').on('change', function(){
		if ($('#numeroC').val()== ""){
			$('#numeroC').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#numeroC').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		$('#Complemento').css('border', '1px solid red');
			$("#comp").prop('disabled', true);
		$('#Complemento').on('change', function(){
		if ($('#Complemento').val()== ""){
			$('#Complemento').css('border', '1px solid red');
			$("#comp").prop('disabled', true);

		}else{
		    $('#Complemento').css('border', '1px solid green');
		    $("#comp").prop('disabled', false);
		}
		})
		
		   console.log($('#val').val());
		    $('#val').attr('value',$('#valor_frete').val());



	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>