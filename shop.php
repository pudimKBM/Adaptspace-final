<html lang="en">

<?php include 'head.html'; ?>
 <link href="css/shop.css" rel="stylesheet" type="text/css">

<body class="text bg-black">
  <?php include 'header.php';?>
  <div class="card bg-secondary rounded-0 border-0 p-4">
    <h3 class="title">Lojinha</h3>
  </div>

  <!--Banner no inicio da página-->
  <div id="banner" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner">
      <!-- PARA COLOCAR MAIS UMA IMAGEM COPIAR E COLAR ISSO AQUI vvv-->
      <div class="carousel-item d-block">
        <img class="d-block w-100" src="IMG/banner2.JPG" alt="Second slide">
      </div>
      <!-- PARA COLOCAR MAIS UMA IMAGEM COPIAR E COLAR ISSO AQUI ^^^-->
    </div>
    <!-- setas de proximo e anterior -->
    <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Fim do banner -->
<section class="m-footer shadow-footer bg-black">
<div class="container ">

<!--Lista de Produtos-->
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
  
  <!--Produto-->
  <div class="col-lg-4 col-md-4 col-6 my-3">

    <div class="box">

      <!--Imagem do Produto-->
      <div class="box-image">
        <a href="product-detail.php?id=<?=$id_best?>" class="d-block">
          <img class="img-thumbnail border-white rounded-top" src="<?= $thumbnail_best; ?>">
          <!--
            <img id="zoom_01" class="img-thumbnail" src='productsimg/small/image1.png' data-zoom-image="productsimg/large/image1.jpg" />
          -->
        </a>

        <button type="button" class="btn btn-primary rounded-0 text show-on-hover d-none d-lg-block" data-toggle="modal" data-target="#modalProduct1">
          Visualização Rápida
        </button>

      </div>

      <!-- O MOUDAU -->
      <div class="modal fade" id="modalProduct1">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title title mx-auto" id=<?= $nomeid?>></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <img id="zoom_01" class="img-thumbnail" src='<?= $thumbnail_best; ?>' 
              data-zoom-image="<?= $thumbnail_best; ?>" />
              <!--
                <img class="img-thumbnail" src="productsimg/5b7eb558c0bda.png">
              -->
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

      <div class="bg-light">
        <div class="bg-secondary rounded text-center mx-3 py-2">
          <span class="number text-light" data-countdown="<?=$exp_date?>"></span>
        </div>
      </div>

      <!--Texto do Produto-->
      <div class="bg-light box-text text-center">
        <div>
          <p class="text my-0"><?= $name_best; ?></p>
        </div>
        <div class="text">
          <span>R$</span>
          <span><?php  echo number_format($price_best, 2, ',', ''); ?></span>
        </div>
        <div>
          <a href="product-detail.php?id=<?=$id_best?>" class="text btn btn-orange px-4 my-2">
            Comprar
          </a>
        </div>
      </div>

    </div>

  </div>
  
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

</div>
</section>
<?include 'footer.php';?>

  <!--=========================================================================================================-->
 
   <?include 'script.html';?>
  <script src="js/jquery.elevatezoom.js"></script>

  <!--=========================================================================================================-->

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

  <!--Efeito Zoom na foto dos Produtos-->
  <script>
    $('#zoom_01').elevateZoom({
      cursor: "crosshair",
      zoomWindowFadeIn: 500,
      zoomWindowFadeOut: 750,
      zoomWindowOffetx: 20,
      zoomWindowWidth: 500,
      zoomWindowHeight: 500,
      //scrollZoom: true,
    });
  </script>

  <!--=========================================================================================================-->

</body>

</html>