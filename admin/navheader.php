<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114440257-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114440257-1');
</script>
<header class="header-mobile d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid" style="">
					<div class="header-mobile-inner">
						<a class="logo" href="../index.php"> <img
							src="../admin/img/adaptool.png" alt="CoolAdmin" />
						</a>
						<button class="hamburger hamburger--slider" type="button">
							<span class="hamburger-box"> <span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<nav class="navbar-mobile">
				<div class="container-fluid">
					<ul class="navbar-mobile__list list-unstyled">
						<li><a href="index.php"> <i class="fas fa-chart-bar"></i>Dashboard
						</a></li>
						<!--<li><a href="chart.php"> <i class="fas fa-table"></i>Meu Espaço-->
						</a></li>
						<li><a href="../admin/designer.php?id=1&category=Camisetas&icon=phone"> <i class="far fa-check-square"></i>Criar Produto
						</a></li>

					</ul>
				</div>
			</nav>
		</header>
		<!-- END HEADER MOBILE-->

		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
				<a href="../index.php"> <img src="../admin/img/adaptool.png" alt="Cool Admin" />
				</a>
			</div>
			<div class="menu-sidebar__content js-scrollbar1">
				<nav class="navbar-sidebar">
					<ul class="list-unstyled navbar__list">
							<li><a href="../admin/index.php"> <i class="fas fa-tachometer-alt "></i>Dashboard
						</a></li>
						<!--<li><a href="chart.php"> <i class="fas fa-chart-bar"></i> Meu Espaço
						</a></li>-->

						<?php  if (!isset($_SESSION['role']) ) {?>
							<li><a href="../admin/designer-unique.php?id=1&category=Camisetas&icon=phone"> <i class="fas fa-table"></i>Criar Produto
						</a></li>
						<?php	} else{?>
							<li><a href="../admin/designer.php?id=1&category=Camisetas&icon=phone"> <i class="fas fa-table"></i>Criar Produto
							</a></li>
						<?php } ?>
						<li><a href="../includes/logout.php"> <i class="fas fa-sign-out-alt"></i>Sair
						</a></li>
					</ul>
				</nav>
			</div>
		</aside>