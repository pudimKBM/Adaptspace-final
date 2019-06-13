<!DOCTYPE html>

<html lang="en">

<?php include 'head.html' ?>

<body class="bg-black">
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
	<?php include("header.php");?>
	<link rel="stylesheet" href="css/cart.css">



	<section class="m-footer shadow-footer bg-black">
		<div class=" p-4">
			<h1 class="title text-center text-primary mb-3 w-100">Carrinho</h1>
			<div class="row">
				<div class="card p-1 col-lg-6 col-md-6 col-sm-12">

					<div class="card-header w-100">
						<h3 class="title text-secondary text-center">Calculo do frete</h3>
					</div>
					<form class="card-body form-group text-center">
						<label for="postcode">Digite seu CEP e clique no Botão para calcular o valor.</Label>
						<input class="form-control w-50 mx-auto" id="cep_destino" type="number" name="postcode" placeholder="CEP">

						<button id="calcFrete" type="button" onclick="LoadFrete();" class="btn btn-primary text my-2">
							Calcular Frete</button>
						<br>
						<span class="text row mt-3">
							<span class="ml-auto mr-2 align-middle">R$</span> <input class="form-control w-25 mr-auto" id="valor_frete" type="text"
							 name="valor_frete" disabled />
						</span>
					</form>
					<?php
								$totalQ =  ("SELECT sum(product.price * command.quantity) as total FROM product, command 
WHERE command.id_produit = product.id AND command.statut = 'ordered' AND command.id_user =  $idsess;" );
$resultTotal = $connection->query($totalQ);
if ($resultTotal->num_rows >0 ){
	while($rowq = $resultTotal->fetch_assoc()){
		$total = $rowq['total'];
		$total2 =  number_format($total, 2, '.', '');
	}
}

?>
					<div class="card bg-secondary w-100 text-light text text-center pt-3">
						<div class="row">
							<p class="mx-auto">Subtotal R$ <span class="font-weight-bold" id="subtotal">
									<?= $total2?></span></p>

						</div>
						<div class="row mb-3">
							<span class="ml-auto mr-2 align-middle">Total R$</span>
							<input type="text" class="form-control font-weight-bold w-25 mr-auto" id="totalcheckout" value="???" disabled>
						</div>

					</div>
					<div class="card-header">
						<h3 class="title text-center text-secondasry">Dados para pagamento</h1>
					</div>

					<div class="card-body">
						<form class="form-group" action="library/vendor/pagseguro/pagseguro-php-sdk/public/Checkout/createPaymentRequestLightbox.php"
						 method="post" onsubmit="PagSeguroLightbox(this); return false;">
							<div class="row">
								<div class="col-lg-4 col-sm-12">
									<label for="nome">Nome</label>
									<input type="text" id="nome" name="nome" class="form-control" placeholder="Digite seu nome" class="form-control"
									 required>
								</div>
								<div class="col-lg-4 col-sm-12">
									<label for="nome2">Sobrenome</label>
									<input type="text" id="nome2" name="nome2" placeholder="Digite seu sobrenome" class="form-control" required>
								</div>
								<div class="col-lg-4 col-sm-12">
									<label for="nasc">Data de nascimento </label>
									<input type="date" id="datanas" name="nasc" class="form-control" required>
								</div>

								<div class="col-lg-4 col-sm-12">
									<label for="vat">Sexo</label>
									<select class="form-control col" name="sex" required>
										<option class="dropdown-item">M</option>
										<option class="dropdown-item">F</option>
									</select>
								</div>
								<div class="col-lg-4 col-sm-12">
									<label for="street">Rua</label>
									<input type="text" name="rua" id="rua" placeholder="Rua Domingos de morais" class="form-control" required>
								</div>

								<div class="col-lg-4 col-sm-12">
									<label for="cidade">Cidade</label>
									<input type="text" id="cidade" placeholder="Sao Paulo" name="cidade" class="form-control" required>
								</div>

								<div class="col-lg-4 col-sm-12">
									<label for="estado">Estado</label>
									<input type="text" id="estado" name="est" placeholder="SP" class="form-control" maxlength="2" style="text-transform: uppercase;"
									 required>
								</div>
								<div class="col-lg-4 col-sm-12">
									<label for="cep"> CEP </label>
									<input type="text" id="cep" name="cep" placeholder="" class="form-control" required disabled>
								</div>
								<div class="col-lg-4 col-sm-12">
									<label for="postal-code"> Número </label> <input type="number" name="numero" id="numeroC" placeholder="Número da casa"
									 class="form-control" required>
								</div>
								<div class="col-lg-4 col-sm-12">
									<label for="bairro"> Bairro </label> <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="form-control"
									 required>
								</div>
								<input id="val" type="text" name="comp2" hidden />
								<div class="col-lg-4 col-sm-12">
									<label> Complemento </label>
									<input type="text" name="comp" id="complemento" placeholder="Complemento" class="form-control">
								</div>
								<div class="col-lg-4 col-sm-12">
									<label for="postal-code" class=" form-control-label"> CPF </label>
									<input type="number" id="cpf" name="cpf" placeholder="CPF somente em numeros" maxlength="11" class="form-control"
									 required>
								</div>
								<div class="col-lg-4 col-sm-12">
									<label for="CPF" class=" form-control-label"> Celular 1 </label>
									<input type="tel" name="tel1" id="celular" placeholder="(11)xxxx-xxxx" class="form-control" required>
								</div>
								<div class="col-lg-4 col-sm-12">
									<label for="tel" class=" form-control-label"> Celular 2 </label>
									<input type="tel" id="celular" name="tel2" placeholder="(11)xxxx-xxxx" class="form-control">
								</div>
								<div class="row w-100">
									<hr>
									<div class="col-lg-4 col-sm-12 mx-auto text center">
										<input class="btn btn-light" id="comp" type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/pagamentos/120x53-comprar.gif"
										 name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" disableled />
									</div>

								</div>

								<div class="row">
									<div class="col-lg-12 col-sm-12 mx-auto text center">
										<div class="alert alert-warning alert-dismissible fade show p-2" role="alert" id="alertForm">
											<strong>Oi!</strong>
											<br> Primeiro você deve calcular o frete, depois preencha o formulario de Dados de pagamento e clique em
											comprar. ; )
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									</div>
								</div>
						</form>


					</div>

				</div>


			</div>
			<div class="card p-1 col-lg-6 col-md-6 col-sm-12">
				<div class="card-header text-center">
					<h3 class="title text-secondary">Produtos</h3>
				</div>
				<div class="card-body" style="overflow-y: scroll; max-height:50em;">
					<?php

// get products
$queryproduct = "SELECT  product.name as 'name',
          product.id as 'id', 
		  product.price as 'price',
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
		$product_id = $rowproduct['id'];
        $thumb = $rowproduct['thumb'];
        $id_productdb = $rowproduct['id_trans'];
        $name_product = $rowproduct['name'];
        $category_product = $rowproduct['category'];
        $quantity_product = $rowproduct['quantity'];
        $price_product = $rowproduct['price'];
        $tam = $rowproduct['Tamanho'];
        ?>
					<div class="row mb-5">
						<div class="col-lg-3 col-sm-12">
							<img class="img-fluid mx-auto" src="<?= $thumb?>" alt="">
						</div>
						<div class="col-lg-5 col-sm-12 mx-sm-auto">
							<div class="row text text-center w-100">
								<div class="row w-100 m-0">
									<p class="w-100 m-0 text-canter product-data">Produto</p>
								</div>
								<hr>
								<div class="row w-100 m-0 text-center">
									<p class="w-100 mb-2 text-center">
										<strong class="product-data">
											<?= $name_product; ?> -
											<?= $tam; ?>
										</strong>
									</p>
								</div>
							</div>
							<div class="row text w-100 p-2">
								<div class="w-100">
									<p class=" product-data mr-1 text-center">Quantidade</p>
									<input class="qtd_input form-control" 
									type="number" 
									name="num-product1" 
									data-idcommand="<?= $id_productdb ?>"
									data-idproduct = "<?= $product_id?>"
									data-price = "<?= $price_product?>"
									step=1 
									value="<?= $quantity_product; ?>">
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-sm-12 mx-sm-auto text text-center">
							<div class="row">
								<p class="w-100 text-canter">
									Preço
								</p>
							</div>
							<div class="row">
								<p class="w-100 text-canter text-primary">
									<strong>R$
										<?= number_format($price_product, 2, '.', ''); ?></strong>
								</p>
							</div>
						</div>

						<div class="col-lg-1 col-sm-12 mx-sm-auto text text-center">
							<a href="deletecommand.php?id=<?= $id_productdb; ?>">
								<i class="fas fa-times text-dark"></i>
							</a>
						</div>
					</div>
					<?php
    }
}
?>
				</div>
			</div>

		</div>
		</div>
	</section>
	<?php include 'footer.php'?>

	<?php include 'script.html';?>

	<script src="frete.js"></script>
	<script type="text/javascript">
		$('#nome').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#nome').on('change', function () {
			if ($('#nome').val() == "") {
				$('#nome').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#nome').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#nome2').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#nome2').on('change', function () {
			if ($('#nome2').val() == "") {
				$('#nome2').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#nome2').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#datanas').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#datanas').on('change', function () {
			if ($('#datanas').val() == "") {
				$('#datanas').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#datanas').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#rua').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#rua').on('change', function () {
			if ($('#rua').val() == "") {
				$('#rua').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#rua').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#cidade').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#cidade').on('change', function () {
			if ($('#cidade').val() == "") {
				$('#cidade').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#cidade').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#estado').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#estado').on('change', function () {
			if ($('#estado').val() == "") {
				$('#estado').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#estado').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#cep').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#cep').on('change', function () {
			if ($('#cep').val() == "") {
				$('#cep').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#cep').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#cep').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#cep').on('change', function () {
			if ($('#cep').val() == "") {
				$('#cep').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#cep').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#cpf').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#cpf').on('change', function () {
			if ($('#cpf').val() == "") {
				$('#cpf').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#cpf').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#celular').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#celular').on('change', function () {
			if ($('#celular').val() == "") {
				$('#celular').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#celular').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#tel2').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#tel2').on('change', function () {
			if ($('#tel2').val() == "") {
				$('#tel2').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#tel2').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#bairro').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#bairro').on('change', function () {
			if ($('#bairro').val() == "") {
				$('#bairro').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#bairro').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#numeroC').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#numeroC').on('change', function () {
			if ($('#numeroC').val() == "") {
				$('#numeroC').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#numeroC').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})
		$('#Complemento').css('border', '1px solid red');
		$("#comp").prop('disabled', true);
		$('#Complemento').on('change', function () {
			if ($('#Complemento').val() == "") {
				$('#Complemento').css('border', '1px solid red');
				$("#comp").prop('disabled', true);

			} else {
				$('#Complemento').css('border', '1px solid green');
				$("#comp").prop('disabled', false);
			}
		})

		$('#val').attr('value', $('#valor_frete').val());
		$(document).ready(function () {
			$("#comp").attr("disabled", "disabled");
			$("#cep_destino").on('change', function () {
				$("#cep").val($(this).val());
			});

			$("#calcFrete").click(function () {
				$("#comp").removeAttr("disabled");
				$("#alertForm").hide();

			});

		});

		$(document).ready(function () {

			$(".qtd_input").change(function () {
				updateCart($(this));
				recalcTotal();
			})
		});


	</script>

</body>

</html>