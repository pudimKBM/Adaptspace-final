<!doctype html>
<html lang="pt-br">


<?php include 'head.html' ?>
<body class="bg-black">
     <?php include 'header.php' ?>
     <!-- O QUE É A ADAPT SPACE? -->
    <section>
        <div class="container m-0 bg-black" style="max-width:100%;">
            <div class="row">
                <div class="col-md-6 col-sm-12 mx-auto text-center">
                    <div class="text-light h-100 p-5 mx-auto">
                        <div class="jumbotron bg-black mx-auto pt-5 my-auto">
                        <div class="">
                            <h1 class="display-4 text-secondary title">O que é a Adapt Space?</h1>
                            <p class="lead text">A Adapt Space é a plataforma de criação de produtos online para compras avulsas ou para criar campanhas para vender seu produto com apenas alguns cliques, sem investimento inicial e lucro escalável.</p>


                             <?php if (isset($_SESSION['id'])){ ?>
                            <div class=" col-12 mt-1">
                                <a href="admin/index.php" class="btn btn-secondary text text-dark">Crie sua Campanha</a>
                            </div>
                            <?php }else{  ?>
                                <a href="login.php" class="btn btn-secondary text text-dark">Crie sua Campanha</a>
                            <?php }?>

                            <div class="col-12 mt-1">
                                <a href="shop.php" class="btn btn-primary text">Conheça nossa loja</a>
                            </div>
                        </div>
                            

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 p-0 mh-100  ">
                    <div class="card bg-transparent border-0 h-100">
                        <!-- Imagem do lado do titulo -->
                        <img class="img-fluid my-auto mh-50" src="IMG/designer.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIM O QUE É A ADAPT SPACE? -->


    <!-- PERSONAS -->
    <section class="bg-light">
        <div class="parallax" id="personas"> <!--Para mudar a imagem do paralax abrir o arquvo css/style e achar #personas !!Sempre colocar as novas imagens na pasta IMG!! -->
            <div class="container p-3">
                <h1 class="text-dark title text-center pb-2">Quem pode se adaptar?</h1>
                <div class="card bg-transparent border-0">
                    <div id="carouselPersonas" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row text-center">
                                    <!-- Uma persona -->
                                    <div class="card p-2 col-md-3 col-sm-6 mx-auto mb-3 bg-primary text-light border-0">
                                        <div class="personas mx-auto mb-1 mb-md-0">
                                            <img class="img-fluid rounded-circle mb-3" src="https://via.placeholder.com/150x150">
                                            <h3 class="title">Parceiro</h3>
                                            <h4 class="text">Youtuber</h4>
                                            <h5 class="mb-0 text">100.000 Seguidores</h5>
                                            <hr>
                                            <p class="font-weight-bold text text-dark">Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit. Donec rhoncus turpis est, a venenatis odio
                                                tempor eget.</p>
                                        </div>
                                    </div>
                                    <!-- Fim uma persona -->

                                    <!-- Duas persona -->
                                    <div class="card p-2 col-md-3 col-sm-6 mx-auto bg-secondary text-light mx-auto">
                                        <div class="personas mx-auto mb-5 mb-md-0">
                                            <img class="img-fluid rounded-circle mb-3" src="https://via.placeholder.com/150x150">
                                            <h3 class="title">Gustavo</h3>
                                            <h4 class="text">Comprador</h4>
                                            <h5 class="mb-0 text"></h5>
                                            <hr>
                                            <p class="font-weight-bold text">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Donec rhoncus turpis est, a venenatis odio tempor
                                                eget. </p>
                                        </div>
                                    </div>
                                    <!-- Fim duas persona -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--FIM PERSONAS-->


    <!-- INICIO NEWSLETTER -->
    <section>
        <div class="bg-black text-light p-0">
            <div class="jumbotron bg-black m-0">
                <h1 class="title text-secondary">Assine nossa newsletter!</h1>
                <p class="lead text text-light">Receba nossa novidades em primeira mão, semanalmente!</p>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" aria-describedby="email"
                                    placeholder="Digite seu e-mail">
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary text">Receber meu Ebook!</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <!-- FIM NEWSLETTER-->


    <!-- PASSOAS PARA O SUCESSO -->
    <section>
        <div id="stepper" class="bg-light pb-5 w-100">
            <div class="container">
                <h1 class="text-primary text-center pt-5 title">Passos para o sucesso</h1>
                <div class="accordion" id="accordionExample">
                    <div class="card bg-light">
                        <!-- TITULO 1 -->
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-primary rounded-circle font-weight-bold" type="button"
                                    data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    1
                                </button>

                                <button class="btn btn-link text text-dark font-weight-bold" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Crie seu produto
                                </button>

                                <button class="btn btn-light float-right bg-transparent border-0" type="button"
                                    data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <i class="fas fa-chevron-down text-primary "></i>
                                </button>
                            </h5>
                        </div>
                        <!-- FIM  TITULO 1 -->


                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <!-- CONTEUDO TITULO 1 -->
                            <div class="card-body text-light text">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="container">
                                            <h5 class="card-title text-dark">Card title</h5>

                                            <p class="text-dark">Aqui tem um monte de texto interessante de como criar
                                                sua campanha na plataforma</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img class="img-fluid" src="IMG/designer.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- FIM CONTEDO TITULO 1 -->
                        </div>
                    </div>
                    <div class="card bg-light">
                        <!-- TITULO 2 -->
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-primary collapsed text rounded-circle font-weight-bold" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    2
                                </button>
                                <button class="btn btn-link collapsed text text-dark font-weight-bold" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Divulgue sua campanha
                                </button>
                                <button class="btn btn-light collapsed float-right bg-transparent border-0" type="button"
                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    <i class="fas fa-chevron-down text-primary "></i>
                                </button>
                            </h5>
                        </div>
                        <!-- FIM TITULO 2 -->

                        
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <!-- CONTEUDO TITULO 2 -->
                            <div class="card-body text-dark ">

                                <div class="row">
                                    <div class="col-md-6 col-sm-12 p-5 text-center">
                                        <img class="img-fluid" src="https://via.placeholder.com/350x350" alt="">
                                    </div>
                                    <div class="col-md-6 col-sm-12 p-5 text-center">
                                        <img class="img-fluid" src="https://via.placeholder.com/350x350" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mx-auto">
                                        <h3 class="text-primary title">Use sua criatividade, inove na sua divulgação</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 card-body text-dark pt-5">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla luctus justo
                                            luctus ligula cursus, et accumsan nisl posuere. Suspendisse dignissim quam
                                            augue, ut cursus tellus sodales vel. Cras eu porta neque.
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-sm-12 card-body text-dark pt-5">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla luctus justo
                                            luctus ligula cursus, et accumsan nisl posuere. Suspendisse dignissim quam
                                            augue, ut cursus tellus sodales vel. Cras eu porta neque. </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM CONTEUDO TITULO 2 -->
                        </div>
                    </div>
                    <div class="card bg-light">
                        <!-- TITULO 3 -->
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-primary collapsed text rounded-circle font-weight-bold" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    3
                                </button>
                                <button class="btn btn-link collapsed text text-dark font-weight-bold" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    O resto nós fazemos
                                </button>
                                <button class="btn btn-light collapsed float-right bg-transparent border-0" type="button"
                                    data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <i class="fas fa-chevron-down text-primary "></i>
                                </button>
                            </h5>
                        </div>
                        <!-- FIM TITULO 3 -->


                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <!-- CONTEUDO TITULO 3 -->
                            <div class="card-body text-light p-5">
                                <h3 class="text-primary title">Nós fazemos todo o trabalho complicado</h3>
                                <p class="text-dark text">
                                    hfsdjkahakfdsklhasdfhk
                                    sdakfhaskdjhfkjhsadfhkhjdfshf jasdhfsjdf jdfh
                                </p>
                                <a href="" class="btn btn-primary float-right">Venha criar sua campanha</a>
                            </div>
                            <!-- FIM CONTEUDO TITULO 3 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIM PASSOS PARA O SUCESSO -->


    <!-- TIME  -->
    <section class="bg-black">
        <div class="container w-100 text-center pb-5 bg-black">
            <h1 class="title text-secondary pb-1">Nosso time</h1>
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="container">
                        <!-- BOTOES DE PROXIMO E ANTERIOR -->
                        <div class="card bg-black border-0 justify-content-center">
                            <div id="" class="row pt-5 d-none d-md-block d-lg-block">
                                <div class="col-md-12 col-sm-6 pt-sm-5">
                                    <a class="btn btn-lg btn-primary" href="#carouselTeam" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <div class="col-md-12 col-sm-6 pt-sm-5">
                                    <a class="btn btn-lg btn-dark" href="#carouselTeam" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </div>
                            </div>
                            <!--mobile-->
                            <div class="row pt-3 pb-3 d-block d-sm-block d-md-none" id="team-mobile-controls">
                                <div class="col-sm-6">
                                    <a class="btn btn-lg btn-dark float-left" href="#carouselTeam" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </div>
                                <div class="col-sm-6 float-sm-right">
                                    <a class="btn btn-lg btn-primary float-right" href="#carouselTeam" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!------>
                        </div>
                        <!-- FIM BOTOES DE PROXIMO E ANTERIOR -->
                    </div>
                </div>
                <div id="" class="col-md-9 col-sm-12 p-sm-3">
                    <div id="carouselTeam" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <!-- ITEM DO TIME -->
                            <div class="carousel-item active w-100 h-100">
                                <div class="card bg-light border-0 p-5 text-center">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12 pb-2 h-100">
                                            <h3 class="title text-dark mx-auto pb-2">Beatriz Herculano</h3>
                                            <img id="team-img" class="img-fluid mx-auto rounded-circle" src="IMG/home/grad.jpg">
                                        </div>

                                        <div class="col-md-7 col-sm-12">
                                            <div class="row">

                                                <p class="text text-dark p-3 pt-5 align-middle">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                                    rhoncus turpis est, a venenatis odio tempor eget.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM ITEM DO TIME -->

                            <!-- ITEM DO TIME -->
                            <div class="carousel-item">
                                <div class="card bg-light border-0 p-5 text-center">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12 pb-2 h-100">
                                            <h3 class="title text-dark mx-auto pb-2">Beatriz Herculano</h3>
                                            <img id="team-img" class="img-fluid mx-auto rounded-circle" src="IMG/home/grad.jpg">
                                        </div>

                                        <div class="col-md-7 col-sm-12">
                                            <div class="row">

                                                <p class="text text-dark p-3 pt-5 align-middle">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                                    rhoncus turpis est, a venenatis odio tempor eget.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM ITEM DO TIME -->

                            <!-- ITEM DO TIME -->
                            <div class="carousel-item">
                                <div class="card bg-light border-0 p-5 text-center">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-12 pb-2 h-100">
                                            <h3 class="title text-dark mx-auto pb-2">Beatriz Herculano</h3>
                                            <img id="team-img" class="img-fluid mx-auto rounded-circle" src="IMG/home/grad.jpg">
                                        </div>

                                        <div class="col-md-7 col-sm-12">
                                            <div class="row">

                                                <p class="text text-dark p-3 pt-5 align-middle">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                                    rhoncus turpis est, a venenatis odio tempor eget.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM ITEM DO TIME -->
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- FIM TIME -->


    <!-- PARCEIROS -->
    <section>
        <div id="partners" class="card pt-2 pb-5 partners parallax">
            <div class="container">
                <h1 class="text-dark text-center title">Quem já se Adaptou?</h1>
                <div class="row pt-5">
                    <div class="col-sm-12 col-md-6 mx-auto text-center">
                        <div id="carouselPartners" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <!-- ITEM PARCEIROS -->
                                <div class="carousel-item active">
                                    <div class="card p-5">
                                        <div class="partners mb-5 mb-md-0">
                                            <img class="img-fluid rounded-circle mb-3" src="https://via.placeholder.com/150x150">
                                            <h3 class="texnesciuntt">Persona 1</h3>
                                            <h4 class="text">Youtuber</h4>
                                            <h5 class="mb-0 text">100.000 Seguidores</h5>
                                            <hr>
                                            <h5 class="font-weight-light text">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Donec rhoncus turpis est, a venenatis odio tempor
                                                eget. Morbi velit sapien, elementum at dui ac, elementum dapibus leo.
                                                Nullam eleifend lacus.</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- FIM ITEM PARCEIROS -->

                                <!-- ITEM PARCEIROS -->
                                <div class="carousel-item">
                                    <div class="card p-5">
                                        <div class="partners mx-auto mb-5 mb-md-0">
                                            <img class="img-fluid rounded-circle mb-3" src="https://via.placeholder.com/150x150">
                                            <h3 class="texnesciuntt">Persona 1</h3>
                                            <h4 class="text">Youtuber</h4>
                                            <h5 class="mb-0 text">100.000 Seguidores</h5>
                                            <hr>
                                            <h5 class="font-weight-light text">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Donec rhoncus turpis est, a venenatis odio tempor
                                                eget. Morbi velit sapien, elementum at dui ac, elementum dapibus leo.
                                                Nullam eleifend lacus.</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- FIM ITEM PARCEIROS -->

                                <!-- ITEM PARCEIROS -->
                                <div class="carousel-item">
                                    <div class="card p-5">
                                        <div class="partners mx-auto mb-5 mb-md-0">
                                            <img class="img-fluid rounded-circle mb-3" src="https://via.placeholder.com/150x150">
                                            <h3 class="texnesciuntt">Persona 1</h3>
                                            <h4 class="text">Youtuber</h4>
                                            <h5 class="mb-0 text">100.000 Seguidores</h5>
                                            <hr>
                                            <h5 class="font-weight-light text">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Donec rhoncus turpis est, a venenatis odio tempor
                                                eget. Morbi velit sapien, elementum at dui ac, elementum dapibus leo.
                                                Nullam eleifend lacus.</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- FIM ITEM PARCEIROS -->

                            </div>
                            <!-- CONTROLES DO TIME -->
                            <a id="carrossel-control" class="carousel-control-prev text-primary" href="#carouselPartners"
                                role="button" data-slide="prev">
                                <i class="fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a id="carrossel-control" class="carousel-control-next text-primary" href="#carouselPartners"
                                role="button" data-slide="next">
                                <i class="fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                            <!-- FIM CONTROLES DO TIME -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIM PARCEIROS -->


    <!-- ENDEREÇO -->
    <section class="bg-black m-footer shadow-footer">
        <div class="container bg-black rounded">
            <div class="card bg-black border-0 pt-5 pl-5 pr-5 ">
                <h1 class="text-center title text-light">Entre em contato</h1>
                <br>
                <div class="row">

                    <div class="col-md-4 col-sm-12 mx-auto">
                        <h6 class="text-light text">Nosso WhatsApp:</h6>
                        <span>
                            <a class=" btn btn-dark text text-light text-left w-100" href="#">
                                <i class="fab fa-whatsapp-square text-primary contact-icon"></i>
                                <span class="text ml-3">+55 11 94179-5974</span>
                            </a>
                        </span>
                        <br>
                        <br>
                        <h6 class="text-light text">Nosso Instagram:</h6>
                        <span>
                            <a class="btn btn-dark text-light text-left w-100" href="https://www.instagram.com/adaptspace/?hl=pt-br">
                                <i class="fab fa-instagram text-primary contact-icon"></i>
                                <span class="text ml-3">Adapt Space</span>
                            </a>
                        </span>
                    </div>
                </div>

                <div class="row pt-5">
                    <div class="col-md-4 col-sm-12 pt-md-5 pt-sm-2">
                        <h5 class="text text-light">
                            Se preferir você pode nos encontrar no nosso escritório
                        </h5>
                        <p class="text">
                            <a class="text-light" href="https://maps.google.com/maps?q=Rua%20dona%20antonia%20de%20queiroz%2C209&t=&z=13&ie=UTF8&iwloc">
                                Rua Dona Antônia de Queiroz, nº 209, Sala 44.
                            </a>
                        </p>
                    </div>
                    <div class="col-md-8 col-sm-12 pt-5">
                        <div class="mapouter float-left d-sm-none d-none d-md-block">
                            <div class="gmap_canvas">
                                <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=rua%20dona%20antonia%20de%20queiroz%2C209&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIM ENDEREÇO -->


    <?php include 'footer.php';?>

    <!-- Optional Java -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php include 'script.html';?>
    

</body>

</html>