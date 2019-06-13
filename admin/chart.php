<!DOCTYPE html>
<html lang="en">
<?php
session_start();
  
  
include '../db.php';
if($_SESSION['role'] != 'client' ){
    
}else if (!isset($_SESSION['role'])){

}
?>

<head>
<!-- Required meta tags-->
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<meta name="author" content="Hau Nguyen">
<meta name="keywords" content="au theme template">

<!-- Title Page-->
<title>Charts</title>

<!-- Fontfaces CSS-->
<link href="css/font-face.css" rel="stylesheet" media="all">
<link href="vendor/font-awesome-4.7/css/font-awesome.min.css"
	rel="stylesheet" media="all">
<link href="vendor/font-awesome-5/css/fontawesome-all.min.css"
	rel="stylesheet" media="all">
<link href="vendor/mdi-font/css/material-design-iconic-font.min.css"
	rel="stylesheet" media="all">

<!-- Bootstrap CSS-->
<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet"
	media="all">

<!-- Vendor CSS-->
<link href="vendor/animsition/animsition.min.css" rel="stylesheet"
	media="all">
<link
	href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css"
	rel="stylesheet" media="all">
<link href="vendor/wow/animate.css" rel="stylesheet" media="all">
<link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet"
	media="all">
<link href="vendor/slick/slick.css" rel="stylesheet" media="all">
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="vendor/perfect-scrollbar/perfect-scrollbar.css"
	rel="stylesheet" media="all">

<!-- Main CSS-->
<link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="">
	<div class="page-wrapper">
		<!-- HEADER MOBILE-->
				<!-- END MENU SIDEBAR-->
	<?php include ('navheader.php'); ?>
		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- HEADER DESKTOP-->
			<?php include ('navheaderp.php');?>
			<!-- END HEADER DESKTOP-->
    
			<!-- MAIN CONTENT-->
            <?php 
            
            include 'db.php';
            ?>
                   
			<div class="main-content">
				<div class="section__content section__content">
					<div class="container-fluid">
						<div class="row">
                        
							<div class="col-lg">
								<div class="card">
                                <form  action="Ipinfo.php"  method="POST">
									<div class="card-header">
										<strong class="st" >Informaçoes Pessoais</strong>
                                    </div>
                                    
									<div class="card-body card-block">
										<div class="form-group">
                                            <div class="row">
                                                <div class="col-md">
                                                    <label for="company" class=" form-control-label">Nome</label>
                                                    <input type="text" id="nome" name="nome1"
                                                        placeholder="Digite seu nome" class="form-control" required>
                                                </div>
                                                <div class="col-md">
                                                        <label for="company" class=" form-control-label">Sobrenome</label>
                                                    <input type="text" id="nome2" name="nome2"
                                                       placeholder="Digite seu sobrenome" class="form-control" required>
                                                </div>
                                                <div class="col-sm-2">
                                                <div class="form-group">
                                                    
                                                    <label for="vat" class=" form-control-label"></label>Data de nasc <input
                                                        type="date" id="datanas" name="data" 
                                                        class="form-control"required>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    
                                                    <label for="vat" class=" form-control-label"></label>Sexo <input
                                                        type="text" id="sex" placeholder="M" name="sex" 
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="street" class=" form-control-label">Rua</label>
                                                    <input type="text" id="rua" name="rua" 
                                                        placeholder="Rua Domingos de morais" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="row form-group">
                                                    <div class="col-8">
                                                        <div class="form-group">
                                                            <label for="city" class=" form-control-label">Cidade</label>
                                                            <input type="text" id="cidade" placeholder="Sao Paulo"  name ="cidade"
                                                                class="form-control"required>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="country" class=" form-control-label">Estado</label>
                                                    <input type="text" id="estado" placeholder="Sao Paulo" name="estado" 
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="country" class=" form-control-label">País</label>
                                                    <input type="text" id="pais" placeholder="Brasil" name="pais" 
                                                        class="form-control"required>
                                                </div>
                                            </div>
                                            
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label"> CEP </label> <input type="number" id="cep" name="cep"
                                                         value="" placeholder="Postal Code" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label"> Numero </label> <input type="number" id="numeroC"
                                                     name="numcas"  placeholder="Postal Code" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label"> Bairro </label> <input type="text" id="bairro" name='bairro' class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label  class=" form-control-label"> Complemento </label> <input type="text" id="complemento"
                                                      name="complemento"  placeholder="Complemento" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="tel" class=" form-control-label"> Telefone </label> <input type="tel" id="telefone"
                                                      name="tel" placeholder="(11)xxxx-xxxx" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label for="tel" class=" form-control-label"> Celular </label> <input type="tel" id="celular"
                                                      name="tel2" placeholder="(11)xxxx-xxxx" class="form-control"rquired>
                                                </div>
                                            </div>
                                        </div>        
                                    </div>
                                   
                                    <button type="submit" value="submit" name="submit" class="btn col-md-3 btn-success btn-lg" style="
                                            margin-bottom: 5%;
                                            margin-left: 70%; ">
											<i class="fa fa-dot-circle-o"></i> Enviar
										</button>
                               
								</div>
                                
							</div>
						</div>
						
					</div>
				</div>
                </form>
                
			</div>
		</div>

	</div>
		<!-- END PAGE CONTAINER-->

	</div>
	</div>

	<!-- Jquery JS-->
	<script src="vendor/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap JS-->
	<script src="vendor/bootstrap-4.1/popper.min.js"></script>
	<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
	<!-- Vendor JS       -->
	<script src="vendor/slick/slick.min.js">
    </script>
	<script src="vendor/wow/wow.min.js"></script>
	<script src="vendor/animsition/animsition.min.js"></script>
	<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
	<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
	<script src="vendor/circle-progress/circle-progress.min.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="vendor/chartjs/Chart.bundle.min.js"></script>
	<script src="vendor/select2/select2.min.js">
    </script>

	<!-- Main JS-->
	<script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
