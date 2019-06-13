<link rel="icon" type="image/png" href="../IMG/favicon.png" />
<header class="header-desktop">
<script src="https://unpkg.com/blip-chat-widget" type="text/javascript">
</script>
<script>
    (function () {
        window.onload = function () {
            new BlipChat()
            .withAppKey('YWRhcHRzcGFjZTpiZTk4M2QxZS0zY2VlLTQ4YTYtYmMwZS01ZGRiZjU1MDAwNzY=')
            .withButton({"color":"#6bd68e"})
            .build();
        }
    })();
</script>
<div class="section__content section__content--p30">
<div class="container-fluid" >
<div class="header-wrap">
<div class="header-button">
<div class="account-wrap">
<div class="account-item clearfix js-item-menu">
<div class="image">
    <!-- Hotjar Tracking Code for www.adaptspace.com.br -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:790770,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114440257-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114440257-1');
</script>
<img src="../IMG/favicon.png" style="max-width: 100%" alt="John Doe" />
</div>
<div class="content">
<?php 
session_start();

 include 'db.php';
$queryuser_db2 = "SELECT * FROM `users` WHERE id = '{$_SESSION['id']}'";
$resultuser_db2 = $connection->query($queryuser_db2);

if ($resultuser_db2->num_rows > 0) {
    while ($rowfirst = $resultuser_db2->fetch_assoc()) {
        $p = $rowfirst['firstname'];
        $email = $rowfirst['email'];
        $d = $rowfirst['lastname'];
        
   }
    
}

?>

<a class="js-acc-btn" ><?php echo   $p  ?> -  ID (<?php echo $_SESSION['id']?>) </a>
										</div>
										<div class="account-dropdown js-dropdown">
											<div class="info clearfix">
												<div class="image">
													<a href="#"> <img src="../IMG/favicon.png"
														alt="John Doe" />
													</a>
												</div>
												<div class="content">
													<h5 class="name">
														<a ><?= $p. " " . $d ; ?></a>
													</h5>
													<span class="email"><?= $email; ?></span>
												</div>
											</div>
											<div class="account-dropdown__footer">
												<a href="../includes/logout.php"> <i class="zmdi zmdi-power"></i>Logout
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			
       
       
       