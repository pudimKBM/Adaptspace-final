<!DOCTYPE html>
<html lang="en">

<head>
<? 
session_start();

if (!isset($_SESSION['id'])   ){
	
	header('location : ../index.php');
}else{
	
}

?>
<!-- Required meta tags-->
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<meta name="author" content="Hau Nguyen">
<meta name="keywords" content="au theme template">

<!-- Title Page-->
<title>Dashboard</title>

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
		<?php include 'navheader.php';?>
		<!-- END MENU SIDEBAR-->
  <?php




$x= $_SESSION['id'];
include 'db.php';
// get total users
if ($_SESSION['id'] == 43 || $_SESSION['id'] == 44 ) {
    $queryusers = "SELECT count(id) as total FROM users";
    $resultusers = $connection->query($queryusers);
    
    if ($resultusers->num_rows > 0) {
        while ($rowusers = $resultusers->fetch_assoc()) {
            $totalusers = $rowusers['total'];
        }
    }
    // get total ordered commands
    $queryorder = "SELECT count(id) as total, statut FROM command WHERE statut = 'ordered' ";
    $resultorder = $connection->query($queryorder);
    
    if ($resultorder->num_rows > 0) {
        while ($roworder = $resultorder->fetch_assoc()) {
            $totalorder = $roworder['total'];
        }
    }
    // get total paid commands
    $querypaid = "SELECT count(id) as total, statut FROM command WHERE statut = 'paid'";
    $resultpaid = $connection->query($querypaid);
    
    if ($resultorder->num_rows > 0) {
        while ($rowpaid = $resultpaid->fetch_assoc()) {
            $totalpaid = $rowpaid['total'];
        }
    }
} else {
    // get total ordered commands
    $queryorder = "SELECT count(id) as total, statut FROM command WHERE statut = 'ordered' and id_usr_create = $x ";
    $resultorder = $connection->query($queryorder);
    
    if ($resultorder->num_rows > 0) {
        while ($roworder = $resultorder->fetch_assoc()) {
            $totalorder = $roworder['total'];
        }
    }
    
    // get total paid commands
    $querypaid = "SELECT count(id) as total, statut FROM command WHERE statut = 'paid' and id_usr_create = $x";
    $resultpaid = $connection->query($querypaid);
    
    if ($resultorder->num_rows > 0) {
        while ($rowpaid = $resultpaid->fetch_assoc()) {
            $totalpaid = $rowpaid['total'];
        }
    }
}

?>
		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- HEADER DESKTOP-->
			<?php include 'navheaderp.php';?>
			<!-- HEADER DESKTOP-->
<?php 
    if ($_SESSION['Rrole'] == 'admin'){
										require_once 'vendor/autoload.php';
										
											include 'db.php';
										$querycanvas = "SELECT CONVERT(dat, date) as 'DATA',COUNT(id) as 'qtd' FROM `command` WHERE statut = 'paid' id_usr_create = {$_SEESION['id']} GROUP BY CONVERT(dat, date)" ;
										$querycanvasresult = $connection->query($querycanvas);
										$sequencedat = new \Ds\Vector();
										$sequenceqtd =  new \Ds\Vector();
										 if ($querycanvasresult->num_rows >0) {
											while ($rowsvec = $querycanvasresult->fetch_assoc()) {
												$dat = $rowsvec['DATA'];
												$qtd = $rowsvec['qtd'];
												$sequenceqtd->push($qtd);
												$sequencedat->push($dat);
											}
											 
										 }

    }elseif($_SESSION['id'] == 43 ||$_SESSION['id'] == 44 ){
                                        require_once 'vendor/autoload.php';
										
											include 'db.php';
										$querycanvas = "SELECT CONVERT(dat, date) as 'DATA',COUNT(id) as 'qtd' FROM `command` GROUP BY CONVERT(dat, date)" ;
										$querycanvasresult = $connection->query($querycanvas);
										$sequencedat = new \Ds\Vector();
										$sequenceqtd =  new \Ds\Vector();
										 if ($querycanvasresult->num_rows >0) {
											while ($rowsvec = $querycanvasresult->fetch_assoc()) {
												$dat = $rowsvec['DATA'];
												$qtd = $rowsvec['qtd'];
												$sequenceqtd->push($qtd);
												$sequencedat->push($dat);
											}
											 
										 }
        
    }

									
									
										?>
			<!-- MAIN CONTENT-->
			<div class="main-content">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="alert alert-info" role="alert">
  									Atualize a pagina para obter os dados mais recentes!
								</div>
								<div class="overview-wrap">
									<h2 class="title-1">Visão Geral</h2>
									<?php if($_SESSION['role'] == "admin"){  ?>
									<a href="../admin/designer.php?id=1&category=Camisetas&icon=phone" class="au-btn au-btn-icon au-btn--blue">
										<i class="zmdi zmdi-plus"></i>Criar produto
									</a>
									<?php } else {?>
										<a href="../admin/designer-unique.php?id=1&category=Camisetas&icon=phone" class="au-btn au-btn-icon au-btn--blue">
										<i class="zmdi zmdi-plus"></i>Criar produto
									</a>
									<?php }?>
								</div>
							</div>
						</div>
						<div class="row m-t-25">
							<div class="col-sm-6 col-lg-3">
								<div class="overview-item overview-item--c1">
									<div class="overview__inner">
										<div class="overview-box clearfix">
											<div class="icon">
												<i class="zmdi zmdi-account-o"></i>
											</div>
											<div class="text">
												<h2> <?php echo $totalorder?></h2>
												<span>Total de pedidos</span>
											</div>
										</div>
										<div class="overview-chart">
											<canvas id="widgetChart1"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3">
								<div class="overview-item overview-item--c2">
									<div class="overview__inner">
										<div class="overview-box clearfix">
											<div class="icon">
												<i class="zmdi zmdi-shopping-cart"></i>
											</div>
											<div class="text">
												<h2><?php echo  $totalpaid?></h2>
												<span>Total pagos</span>
											</div>
										</div>
										<div class="overview-chart">
											<canvas id="widgetChart2"></canvas>
										</div>
									</div>
								</div>
							</div>
<!-- 							<div class="col-sm-6 col-lg-3"> -->
<!-- 								<div class="overview-item overview-item--c3"> -->
<!-- 									<div class="overview__inner"> -->
<!-- 										<div class="overview-box clearfix"> -->
<!-- 											<div class="icon"> -->
<!-- 												<i class="zmdi zmdi-calendar-note"></i> -->
<!-- 											</div> -->
<!-- 											<div class="text"> -->
<!-- 												<h2>1,086</h2> -->
<!-- 												<span>this week</span> -->
<!-- 											</div> -->
<!-- 										</div> -->
<!-- 										<div class="overview-chart"> -->
<!-- 											<canvas id="widgetChart3"></canvas> -->
<!-- 										</div> -->
<!-- 									</div> -->
<!-- 								</div> -->
<!-- 							</div> -->
							<div class="col-sm-6 col-lg-3">
								<div class="overview-item overview-item--c4">
									<div class="overview__inner">
										<div class="overview-box clearfix">
											<div class="icon">
												<i class="zmdi zmdi-money"></i>
											</div>
											<div class="text">
												<h2>R$0</h2>
												<span>Ganho Total</span>
											</div>
										</div>

										
										<div class="overview-chart">
											<canvas id="widgetChart4"></canvas>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg">
								<div class="au-card recent-report">
									<div class="au-card-inner">
										<h3 class="title-2">Dados Recentes</h3>
										<div class="chart-info">
											<div class="chart-info__left">
												<div class="chart-note">
													<span class="dot dot--green"></span> <span>Produtos</span>
												</div>
											</div>
											<div class="chart-info__right">
												<div class="chart-statis">
													<span class="index incre"> <i
														class="zmdi zmdi-long-arrow-up"></i>25%
													</span> <span class="label">Produtos</span>
												</div>
											</div>
										</div>
										<div class="recent-report__chart">
											<canvas id="recent-rep-chart"></canvas>
										</div>
									</div>
								</div>
							</div>
						
						</div>
						<div class="row">
							<div class="col-lg">
								<h2 class="title-1 m-b-25">Ganho por Itens</h2>
								<div class="table-responsive table--no-card m-b-40">
									<table
										class="table table-borderless table-striped table-earning">
										<thead>
											<tr>
												<th>Data</th>
												<th>ID do Pedido</th>
												<th>Nome</th>
												<th class="text-right">Preço</th>
												<th class="text-right">Quantidade</th>
												<th class="text-right">Tamanho</th>
												<th class="text-right">Total</th>
											</tr>
										</thead>
										<tbody>
						<?php

include '../db.php';
if ($_SESSION['role'] !== 'admin') {
    $queryfirst = "SELECT
product.id as 'id',
product.name as 'name',
product.price as 'price',


SUM(command.quantity),
command.statut as 'statut',
command.id_produit,
command.quantity as 'quantity',
command.id_user as 'user',
command.dat as 'data',
command.Tamanho as 'size',
command.id as 'traid'






FROM product, command
WHERE product.id = command.id_produit and id_usr_create = $x
GROUP BY command.id
ORDER BY SUM(command.id_user) DESC ";
    $resultfirst = $connection->query($queryfirst);
    if ($resultfirst->num_rows > 0) {
        // output data of each row
        while ($rowfirst = $resultfirst->fetch_assoc()) {
            $traid =$rowfirst['traid'];
            $size =$rowfirst['size'];
            $dat =$rowfirst['data'];
            $idp = $rowfirst['id'];
            $name = $rowfirst['name'];
            $statut = $rowfirst['statut'];
            $quantity = $rowfirst['quantity'];
            $price = $rowfirst['price'];
            $user = $rowfirst['user'];
            
            // get user name
            $queryuser = "SELECT firstname, lastname FROM users WHERE id = '$user'";
            $resultuser = $connection->query($queryuser);
            if ($resultuser->num_rows > 0) {
                // output data of each row
                while ($rowuser = $resultuser->fetch_assoc()) {
                    $userfirstname = $rowuser['firstname'];
                    $userlasttname = $rowuser['lastname'];
                    $total= $price*$quantity;
                    ?>
						
											<tr>
												<td><?= $dat;?></td>
												<td><?= $traid; ?></td>
												<td><?= $name; ?></td>
												<td class="text-right">R$ <?= $price; ?></td>
												<td class="text-right"><?= $quantity;?></td>
												<td class="text-right"><?= $size;?></td>
												<td class="text-right" id="xd">R$<?= $total; ?></td>
											</tr>
											
											
											
										
							<?php
                
}
            }
        }
    }
   
   
				
} else {
    $queryfirst = "SELECT
product.id as 'id',
product.name as 'name',
product.price as 'price',

SUM(command.quantity),
command.statut as 'statut',
command.id_produit,
command.quantity as 'quantity',
command.id_user as 'user',
command.dat as 'data',
command.Tamanho as 'size',
command.id as 'traid'

FROM product, command
WHERE product.id = command.id_produit and id_usr_create = $x
GROUP BY command.id
ORDER BY SUM(command.id_user) DESC ";
    $resultfirst = $connection->query($queryfirst);
    if ($resultfirst->num_rows > 0) {
        // output data of each row
        while ($rowfirst = $resultfirst->fetch_assoc()) {
            
            $traid =$rowfirst['traid'];
            $size =$rowfirst['size'];
            $dat =$rowfirst['data'];
            $idp = $rowfirst['id'];
            $name = $rowfirst['name'];
            $statut = $rowfirst['statut'];
            $quantity = $rowfirst['quantity'];
            $price = $rowfirst['price'];
            $user = $rowfirst['user'];
            
            // get user name
            $queryuser = "SELECT firstname, lastname FROM users WHERE id = '$user'";
            $resultuser = $connection->query($queryuser);
            if ($resultuser->num_rows > 0) {
                // output data of each row
                while ($rowuser = $resultuser->fetch_assoc()) {
                    $userfirstname = $rowuser['firstname'];
                    $userlasttname = $rowuser['lastname'];
                    $total= $price*$quantity;
                    ?>
  
											<tr>
												<td><?= $dat;?></td>
												<td><?= $traid; ?></td>
												<td><?= $name; ?></td>
												<td class="text-right">R$ <?= $price; ?></td>
												<td class="text-right"><?= $quantity;?></td>
												<td class="text-right"><?= $size;?></td>
												<td class="text-right">R$<?= $total; ?></td>
											</tr>
											
    
  <?php }} }} }?>
   </tbody>
									</table>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="copyright">
									<p>
										Copyright © 2018 AdaptSpace. Todos os direitos reservados.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT-->
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
	<script src="js/main.js" ></script>

	<script>
	<?php   $seq = $sequencedat->toArray();
			$seq_enc = json_encode($seq);
		$seq2 = 	$sequenceqtd->toArray();
		$seq2_enc = json_encode($seq2);
	?>
	 const brandProduct = 'rgba(0,181,233,0.8)'
    const brandService = 'rgba(0,173,95,0.8)'

    var elements = 10
    var data1 = <?php echo $seq2_enc ."\n"?>
    var data2 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90, 115, 115]

    var ctx = document.getElementById("recent-rep-chart");
    if (ctx) {
      ctx.height = 250;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: <?php echo $seq_enc ."\n" ; ?>,
          datasets: [
            {
              label: 'My First dataset',
              backgroundColor: brandService,
              borderColor: 'transparent',
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data1

            }
//            {
//              label: 'My Second dataset',
//              backgroundColor: brandProduct,
//              borderColor: 'transparent',
//              pointHoverBackgroundColor: '#fff',
//              borderWidth: 0,
//              data: data2
//
//            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                drawOnChartArea: true,
                color: '#f2f2f2'
              },
              ticks: {
                fontFamily: "Poppins",
                fontSize: 12
              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                maxTicksLimit: 5,
                stepSize:20,
                max: 100,
                fontFamily: "Poppins",
                fontSize: 12
              },
              gridLines: {
                display: true,
                color: '#f2f2f2'

              }
            }]
          },
          elements: {
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4,
              hoverBorderWidth: 3
            }
          }


        }
      });
    }
	</script>
	

</body>

</html>
<!-- end document-->
