<!doctype html>
<html lang="pt-br">

<?php include 'header.php' ?>
<style>
    .img2{
  vertical-align: middle;
  border-style: none; 
  width : 100%;
}
@font-face {
	font-family: Cinematografica;
	src: url('../fonts/cinematografica/Cinematografica-Bold-trial.ttf');
}
.btn-outline-info{
    color: #fff;
    background-color: #0000007a;
    border-color: #fff;

    font-weight: bold ;

}
.btn-outline-info:hover {
    color: #17a2b8;
    background-color: transparent;
    background-image: none;
    border-color: #17a2b8;
}
.testimonials {
	padding-top: 7rem;
	padding-bottom: 7rem;
  }
  
  .testimonials .testimonial-item {
	max-width: 18rem;
  }
  
  .testimonials .testimonial-item img {
	max-width: 12rem;
	box-shadow: 0px 5px 5px 0px #adb5bd;
  }

  .features-icons {
	padding-top: 7rem;
	padding-bottom: 1rem;
  }
  
  .features-icons .features-icons-item {
	max-width: 20rem;
  }
  
  .features-icons .features-icons-item .features-icons-icon {
	height: 7rem;
  }
  
  .features-icons .features-icons-item .features-icons-icon i {
	font-size: 4.5rem;
  }
  
  .features-icons .features-icons-item:hover .features-icons-icon i {
	font-size: 5rem;
  }
  .features-icons-icon img{
    width: 45%;
  }
</style>
</style>
     <div id="mama" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">  
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img2" src="IMG/banner-luiz.png" alt="Ricky-boring">
                <div class="carousel-caption mb-5 d-none d-block d-md-block">
                </div>
            </div>
            <div class="carousel-item">
              <img class="img2" src="IMG/BANNER3.JPG">
                <div class="carousel-caption mb-5 d-none d-block d-md-block">
                    
                </div>
            </div>
        </div>
        
        

        <a class="carousel-control-prev" href="#mama" data-slide="prev">
            <span style="font-size: 2.1em; color:black;" class="fas fa-chevron-left"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#mama" data-slide="next">
            <span style="font-size: 2.1em; color:white;" class="fas fa-chevron-right"></span>
            <span class="sr-only">Avançar</span>
        </a>
        
    </div>
     <section class="features-icons bg-light text-center">
         <h3>O que é a Adapt Space?</h3>
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <img href="shop.php" src="IMG/moneyhome_Prancheta 1.png" class="icon-screen-desktop m-auto text-success">
              </div>
              <h3>Monetizamos Influência</h3>
              <p class="lead mb-0">A 1º Plataforma de criação de produtos exclusivos feitos pelo seu Influencer favorito num modelo Crowdfunding de produtos.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
               <img src="IMG/toolhome_Prancheta 1.png" class="m-auto text-success">
              </div>
              <h3>Fácil de usar</h3>
              <p class="lead mb-0">Permitimos que você gere fundos de graça - sem complicações ou riscos. Utilize nosso Designer para configurar e personalizar seu produto.</p>
              </div>    
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
               <img src="IMG/timehome_Prancheta 1.png" class="m-auto text-success">
              </div>
              <h3>Exclusivas</h3>
              <p class="lead mb-0">Ou para comprar uma das peças que estão online. Cuidado, além de exclusivas, as peças são numeradas.</p>
            </div>
          </div>
        </div>
      </div>
</section> 
    <section id="team" class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="text-center "><span class="font-in">Campanhas</span></h2>
            <div class="row pt-5">
                <!-- Team member -->
                <div class="col-sm-4 col-sm-offset-5 mx-auto text-center">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                       <a  href="product-detail.php?id=46"> <img class="img-fluid rounded-circle mb-3" src="IMG/luiz.jpg" style="width: 100%;"></a>
                       
                        <h3>@Luiz</h3>
                        <h4>Influencer</h4>
                        <h5 class="mb-0"><i class="fab fa-instagram "></i> 1 Milhão de Seguidores</h5>
                        <h5 class="font-weight-light">.</h5>
                    </div>
                </div>
                     <!-- Team member -->
                <div class="col-sm-4 col-sm-offset-5 mx-auto text-center">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <a href="product-detail.php?id=43"><img class="img-fluid rounded-circle mb-3" src="IMG/ebano-certa.jpg" style="width: 100%;"></a>
                        <h3>Ébano</h3>
                        <h4>Marca</h4>
                        <h5 class="mb-0"><i class="fab fa-instagram "></i> 124 Seguidores</h5>
                        <h5 class="font-weight-light"></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team -->

    <button class="back-to-top" type="button"> <span style="font-size: 1.2em; color: white;">
                      <i class="fas fa-caret-up"></i>
                        </span></button>
<!--
 <div class="p-5">
        <div class="container pt-3" >
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/bg-2.png);">
                        <div class="catagory-content">
                            <a href="#" class="btn btn-outline-info">CAMISETAS</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/bg-3.png);">
                        <div class="catagory-content">
                            <a href="#"  class="btn btn-outline-info">BLUSAS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
   <?php include 'footer.php' ?>
   

</body>

</html>
