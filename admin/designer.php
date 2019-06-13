<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Adaptool Designer</title>
    <!-- collor picker CSS-->
    <link href="../node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css" rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Archivo+Black|Bangers|Charmonman|Chicle|Courgette|Fredoka+One|Indie+Flower|Josefin+Sans|Kaushan+Script|Lobster|Luckiest+Guy|Mali|Notable|Orbitron|Oswald|Pacifico|Permanent+Marker|Roboto+Mono|Sacramento|Satisfy|Shadows+Into+Light|Srisakdi|Ultra"
        rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidebar-designer.css">
    <link rel="stylesheet" href="css/designer.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="../css/shop.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php

session_start();

if (! isset($_SESSION['id'])  ) {
    header('location : ../index.php');
}
 else {

     
    $id_category = $_GET['id'];
    $name_category = $_GET['category'];
    $caticon = $_GET['icon'];
    
	
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


 
    ?>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false" style="overflow-y:scroll;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="wrapper">
                    <aside>
                        <nav id="sidebar" class="active w-auto h-100 bg-black">
                            <div class="sidebar-header bg-black">
                                <h3>Adaptool</h3>
                                <strong style="font-size: 0.9">Adapt</strong>
                            </div>
                            <ul class="list-unstyled components">

                                <li>
                                    <a id="m-shirt" data-toggle="modal" data-target="#modalChooseProduct">
                                        <i class="fas fa-tshirt icon-designer"></i>
                                        Produto
                                    </a>

                                </li>
                                <li>
                                    <a id="m-color" data-toggle="modal" data-target="#modalChooseColor">
                                        <i class="fas fa-palette icon-designer"></i>
                                        Cor
                                    </a>
                                </li>
                                <li>
                                    <a id="m-fontes" data-toggle="modal" data-target="#modalAddText">
                                        <i class="fas fa-comment-dots icon-designer"></i>
                                        Texto
                                    </a>

                                </li>
                                <li>

                                </li>
                                <li>
                                    <a id="m-icone" data-toggle="modal" data-target="#modalAddIcon">
                                        <i class="fas fa-archive icon-designer"></i>
                                        Icones
                                    </a>

                                </li>
                                <li>
                                    <a id="m-upload" data-toggle="modal" data-target="#modalUploadImg">
                                        <i class="fas fa-paper-plane icon-designer"></i>
                                        Upload
                                    </a>


                                </li>
                            </ul>
                        </nav>
                    </aside>
                    <section class="container">
                        <div>
                            <div class="row">
                                <div class="col-3 mt-2">
                                    <a class="btn btn-light btn-lg float-left text" id="flip">
                                        <i class=" fas fa-sync-alt"></i> <span class="d-none d-sm-none d-md-block">Virar
                                            produto</span>
                                    </a>
                                </div>
                                <div class="col-5 mt-2">
                                    <a class="">
                                        <div id="color-picker" class=" btn-lg ">
                                            <input type="text" class="form-control input-lg" profit="#16813d" hidden />
                                            <span class="input-group-append">
                                                <span class="input-group-text colorpicker-input-addon mx-auto text">
                                                    <i class=""></i><span class="d-none d-sm-none d-md-block ml-3">Escolher
                                                        cor do
                                                        Item</span>
                                                </span>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-3 mt-2">
                                    <button id="remove-obj" class="btn btn-light btn-lg float-right text">
                                        <i class="fas fa-trash-alt"></i><span class="d-none d-sm-none d-md-block">Remover
                                            Item
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div id="content" class="col-md-6 col-sm-12 ml-auto pt-3">
                                    <div id="shirtDiv" class="position-relative">
                                        <img id="tshirt" src="" style="width: 100%; height: auto;">
                                        <div id="canvas-area" class="border border-dark p-1" data-width="0.40"
                                            data-height="0.65" data-top="17%" data-left="29%" data-img="img/mockups/tshirtman.png"
                                            data-flip-img="img/mockups/back-tshirtman.png">
                                            <canvas id="canvas"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div id="" class="col">
                                    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert" id="alert-flip">
                                        <strong>Olá!</strong> Só para lembrar que apenas um dos lados do produto será
                                        estampado <i class="far fa-smile-wink"></i>.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="text-commands" class="card mt-5">
                                        <div class="card-body text-center">
                                            <h3>Editar texto</h3>
                                            <div class="row w-auto">
                                                <div class="col-md-3 col-sm-4 mt-1 w-auto"> <label for="italic" class="text"></label>
                                                    <button id="italic" class="btn btn-light">
                                                        <i class="fas fa-italic"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-sm-4 mt-1 w-auto ">
                                                    <label for="bold" class="text"></label>
                                                    <button id="bold" class="btn btn-light">
                                                        <i class="fas fa-bold"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-sm-4 mt-1 w-auto ">
                                                    <label for="underline" class="text"></label>
                                                    <button id="underline" class="btn btn-light">
                                                        <i class="fas fa-underline"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-sm-4 mt-1 w-auto ">
                                                    <label for="strike" class="text"></label>
                                                    <button id="strike" class="btn btn-light">
                                                        <i class="fas fa-strikethrough"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-sm-4 mt-1 w-auto ">
                                                    <label for="#select-font" class="text"></label>
                                                    <button id="select-font" class="btn btn-light" data-toggle="modal"
                                                        data-target="#modalSelectFont">
                                                        <i class="fas fa-font"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-sm-4 mt-1 w-auto ">
                                                    <label for="" class="text"></label>
                                                    <button id="text-left" class="btn btn-light">
                                                        <i class="fas fa-align-left"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-sm-4 mt-1 w-auto ">
                                                    <label for="" class="text"></label>
                                                    <button id="text-center" class="btn btn-light">
                                                        <i class="fas fa-align-center"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-sm-4 mt-1 w-auto ">
                                                    <label for="" class="text"></label>
                                                    <button id="text-right" class="btn btn-light">
                                                        <i class="fas fa-align-right"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-sm-4 mt-1 w-auto ">
                                                    <label for="" class="text"></label>
                                                    <button id="bring-front" class="btn btn-light">
                                                        <i class="fas fa-arrow-alt-circle-up"></i>
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-sm-4 mt-1 w-auto ">
                                                    <label for="" class="text"></label>
                                                    <button id="bring-back" class="btn btn-light">
                                                        <i class="fas fa-arrow-alt-circle-down"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
            <div class="carousel-item bg-black">
                <section>
                    <div class="container pb-5 mb-5">
                        <div class="row  bg-black">
                            <div class="col-lg-2 col-md-12 col-sm-12 text-center card mx-auto my-2">
                                <h3 class="title p-3">Preço</h3>
                                <div class="container">
                                    <img id="shirtfinished" class="img-fluid" alt="" >
                                    <div class="row p-3 border-bottom border-primary">
                                        <span class='mr-2'>Preço mínimo:</span>
                                        <span class="">R$45.00</span>
                                    </div>
                                    <div class="row p-3 border-bottom border-primary">
                                        <span class='mr-2'>Vender Por:</span>
                                        <br>
                                        <span class="text-left">R$<input type="number" name="preço-variavel" id="Prc"
                                                class="form-group" style="max-width:40%" step=0.01></td></span>
                                    </div>
                                    <div class="row border-bottom border-primary p-3 mb-3">
                                        <span class='mr-2'>Lucro:</span>
                                        <span class="" id="val"><strong>0,00</strong></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12 text-center card  mx-auto my-2">
                                <div class="container">
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">Itens</div>
                                        <div class="col-4">Ganho p/ unidade</div>
                                        <div class="col-4">Total</div>
                                    </div>
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">50</div>
                                        <div class="col-4" id="c"></div>
                                        <div class="col-4" id="c2"></div>
                                    </div>
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">100</div>
                                        <div class="col-4" id="d"></div>
                                        <div class="col-4" id="d2"></div>
                                    </div>
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">150</div>
                                        <div class="col-4" id="e"></div>
                                        <div class="col-4" id="e2"></div>
                                    </div>
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">200</div>
                                        <div class="col-4" id="f"></div>
                                        <div class="col-4" id="f2"></div>
                                    </div>
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">250</div>
                                        <div class="col-4" id="g"></div>
                                        <div class="col-4" id="g2"></div>
                                    </div>
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">300</div>
                                        <div class="col-4" id="h"></div>
                                        <div class="col-4" id="h2"></div>
                                    </div>
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">350</div>
                                        <div class="col-4" id="i"></div>
                                        <div class="col-4" id="i2"></div>
                                    </div>
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">400</div>
                                        <div class="col-4" id="j"></div>
                                        <div class="col-4" id="j2"></div>
                                    </div>
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">450</div>
                                        <div class="col-4" id="k"></div>
                                        <div class="col-4" id="k2"></div>
                                    </div>
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">500</div>
                                        <div class="col-4" id="l"></div>
                                        <div class="col-4" id="l2"></div>
                                    </div>
                                    <div class="row p-1 m-1 border-bottom border-primary">
                                        <div class="col-4">501 +</div>
                                        <div class="col-4" id="m"></div>
                                        <div class="col-4" id="m2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12 text-center card m-2 mx-auto my-2 pb-sm-5">
                                <?php $data = date("Y-m-d"); ?>
                                <h3 class="title p-3">Tempo de campanha</h3>

                                <label> Data Início: <input id="dataInicio" class="form-control" type="date" value=<?php
                                        echo $data?>
                                    disabled>
                                </label>

                                <form>
                                    <h5>Duração</h5>
                                    <div class="input-group p-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="dias" id="d7">
                                            </div>
                                            <span class="input-group-text">7 Dias</span>
                                        </div>
                                        <input type="date" id="dataFinal" class="form-control" aria-label="Text input with radio button" value=""
                                            disabled>
                                    </div>

                                    <div class="input-group p-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="dias" id="d14">
                                            </div>
                                            <span class="input-group-text">14 Dias</span>
                                        </div>
                                        <input type="date" id="dataFinal1" class="form-control" aria-label="Text input with radio button" value=""
                                            disabled>
                                    </div>

                                    <div class="input-group p-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="radio" name="dias" id="d21">
                                            </div>
                                            <span class="input-group-text">21 Dias</span>
                                        </div>
                                        <input type="date" id="dataFinal2" class="form-control" aria-label="Text input with radio button" value=""
                                            disabled>
                                    </div>
                                </form>

                                <input id="image1" type="text" value="" hidden>
                                <input id="image2" type="text" value="" hidden>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="carousel-item position-relative bg-black">
                <div class="container my-5">
                <section>
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-6 col-12 my-sm-0 my-3">
                            <div class="box bg-light rounded border p-3">
                                <!--Imagem do Produto-->
                                <div class="box-image">
                                    <a href="#" class="d-block">
                                        <img id="shirtFinish" class="img-thumbnail border mx-auto" src="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-sm-0 my-3">
                            <div class="box bg-light rounded border p-3">
                               
                                    <div class="box-text bg-light text-center border px-5">
                                        <div class="row">
                                            <input class="form-control mx-auto" type="text" name="" id="np" placeholder="Digite o titulo da campanha">
                                        </div>
                                        <div class="row mt-3  text-left">
                                            <textarea class="form-control mx-auto" name="" id="dp" cols="30" rows="10" placeholder="Digite a descrição da sua campanha"></textarea>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <span class="lead font-weight-bold mb-3 mx-auto text-primary" style="font-size: 2em;" id="preço">R$
                                                49,90</span>
                                        </div>

                                    <div>
                                        <form action="success.php" method="post">
                                        <input type="text" id="namef" name="namef" hidden> 
										<input type="text" id="descf" name="descf" hidden> 
                                        <input type="date" name="expdatef" id="expdatef" value="2018-01-01" hidden>
										<input type="text" id="prcf" name="prcf" hidden> 
										<input type="text" id="prcf2" name="prcf2" hidden> 
										<input id="imagef1" name="imagef1" type="text" value="" hidden> 
										<input id="imagef2" name="imagef2" type="text" value="" hidden>
										<input id="category" name="id_cat" type="number" value=<?= $id_category ?> hidden>
										<input id="category" name="id" type="number" value=<?= $_SESSION['id'] ?> hidden>
                                            <input type="submit" value="Começar campanha" id="finishBtn" class="ext btn btn-orange px-4 my-2">
                                            </form>
                                        </div>
                                        
                                    </div>
                              
                            </div>
                        </div>
                    </div>
                </section>
                </div>
            </div>
            <div class="row w-100 px-3 position-absolute mx-auto" style="bottom:20px;">
                <a class="btn btn-primary slide-control" href="#carouselExampleControls" role="button" data-slide="prev" id="prevProfit">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span> Anterior
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="btn btn-primary slide-control " href="#carouselExampleControls" role="button" data-slide="prev" id="prevFinish">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span> Anterior
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="btn btn-primary slide-control next ml-auto" href="#carouselExampleControls" role="button"
                    data-slide="next" id="nextShirt">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span> Criar Camiseta
                    <span class="sr-only">Próximo</span>
                </a>
                <a class="btn btn-primary slide-control next ml-auto" href="#carouselExampleControls" role="button"
                     id="nextProfit">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span> Próximo
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Modal Escolher fonte -->
    <div class="modal fade" id="modalSelectFont" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="title">Escolha
                        uma fonte para
                        o seu
                        texto.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Archivo Black';font-size: 1.3em; ">Archivo
                                    Black</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Bangers';font-size: 1.3em; ">Bangers</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Charmonman';font-size: 1.3em; ">Charmonman</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Chicle';font-size: 1.3em; ">Chicle</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Courgette';font-size: 1.3em; ">Courgette</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Fredoka One';font-size: 1.3em; ">Fredoka
                                    One</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Indie Flower';font-size: 1.3em; ">Indie
                                    Flower</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Josefin Sans';font-size: 1.3em; ">Josefin
                                    Sans</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Kaushan Script';font-size: 1.3em; ">Kaushan
                                    Script</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Lobster';font-size: 1.3em; ">Lobster</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Srisakdi';font-size: 1.3em; ">Srisakdi</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Ultra';font-size: 1.3em; ">Ultra</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Luckiest Guy';font-size: 1.3em; ">Luckiest
                                    Guy</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Mali';font-size: 1.3em; ">Mali</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Notable';font-size: 1.3em; ">Notable</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Orbitron';font-size: 1.3em; ">Orbitron</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Oswald';font-size: 1.3em; ">Oswald</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Pacifico';font-size: 1.3em; ">Pacifico</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Permanent Marker';font-size: 1.3em; ">Permanent
                                    Marker</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Roboto Mono';font-size: 1.3em; ">Roboto
                                    Mono</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Satisfy';font-size: 1.3em; ">Satisfy</button>
                                <button type="button" class="font-selector list-group-item list-group-item-action"
                                    style="font-family: 'Shadows Into Light';font-size: 1.3em; ">Shadows
                                    Into Light</button>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------ -->

    <!-- Modal Escolher Produto-->
    <div class="modal fade" id="modalChooseProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="title">Escolha seu Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col-4 p-2 text-center">
                        <a id="" class="change-product bg-light p-0 text-dark" data-width="0.40" data-height="0.65"
                            data-top="17%" data-left="29%" data-img="img/mockups/tshirtman.png" data-flip-img="img/mockups/back-tshirtman.png">
                            <img src="img/mockups/tshirtman.png" class="img-fluid bg-light" alt="">
                            Camiseta Masculina
                        </a>
                    </div>
                    <div class="col-4 p-2 text-center">
                        <a id="" class="change-product bg-light p-0 text-dark " data-width="0.41" data-height="0.65"
                            data-top="21%" data-left="29%" data-img="img/mockups/hoodie.png" data-flip-img="img/mockups/back-hoodie.png">
                            <img src="img/mockups/hoodie.png" class="img-fluid  bg-light" alt="">
                            Moletom com Touca
                        </a>
                    </div>
                    <div class="col-4 p-2 text-center">
                        <a id="" class="change-product bg-light p-0 text-dark " data-width="0.40" data-height="0.65"
                            data-top="25%" data-left="29%" data-img="img/mockups/tshirt-woman.png" data-flip-img="img/mockups/back-tshirt-woman.png">
                            <img src="img/mockups/tshirt-woman.png" class="img-fluid bg-light" alt="">
                            Camiseta Unisex
                        </a>
                    </div>
                    <div class="col-4 p-2 text-center">
                        <a id="" class="change-product bg-light p-0 text-dark " data-width="0.42" data-height="0.65"
                            data-top="17%" data-left="29%" data-img="img/mockups/longsleeve.png" data-flip-img="img/mockups/back-longsleeve.png">
                            <img src="img/mockups/longsleeve.png" class="img-fluid bg-light" alt="">
                            Moletom sem touca
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!---------------------------->

    <!-- Modal Escolher Cor -->
    <div class="modal fade" id="modalChooseColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="title">Escolha a cor do seu
                        produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body col-9 mx-auto">
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgba(197,22,37,1); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(152,18,54); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(255,205,222); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(231,48,125); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(1,100,175); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(17,166,122); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(254,221,104); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(2,165,84); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(245,143,69); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(247,79,32); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(255,255,255); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(151,153,155); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(71,49,99); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(23,34,65); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: rgb(35,62,37); width: 30px;height: 30px;"></button>
                    <button class="color-preview float-center position-relative m-1 border border-dark rounded-circle"
                        style="background-color: #222222; width: 30px;height: 30px;"></button>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------ -->

    <!-- Modal Adicionar Texto -->
    <div class="modal fade" id="modalAddText" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="title">Digite o texto para
                        seu
                        produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="texto" id="text-string">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="add-text">Adicionar
                        texto</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------ -->

    <!-- Modal Adicionar Texto -->
    <div class="modal fade" id="modalAddText" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="title">Digite o texto para
                        seu
                        produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="texto" id="text-string">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="add-text">Adicionar
                        texto</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------ -->

    <!-- Modal Adicionar Icone -->
    <div class="modal fade" id="modalAddIcon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="title">Escolha um Icone para
                        adicionar no
                        seu design!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark" style="overflow-y: scroll; max-height: 500px;">
                    <?php
     $list = scandir("img/icons");
     unset($list[0]);
     unset($list[1]);                                        
    foreach($list as $item){ ?>
                    <button class="btn btn-light add-icon" data-img="img/icons/<?=$item?>">
                        <img src="img/icons/<?=$item?>" class="img-fluid" style="width: 30px;height:30px" alt="">
                    </button>
                    <?php
     }?>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-light text-dark" href="https://fontawesome.com/license">FontAwesome
                        Licence</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------------ -->

    <!-- Modal Upload Imagem -->
    <div class="modal fade" id="modalUploadImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="title">Escolha um Escolha uma
                        imagem para
                        sua camiseta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formUpload" method="post" enctype="multipart/form-data"> 
                        <div class="row">
                            <input class="form-group mx-2" type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <div class="row">
                            <input class="form-group btn btn-primary ml-auto mr-3" type="submit" value="Fazer Upload" id="btnEnviar" name="submit">
                            <button type="button" class="form-group btn btn-secondary mr-3" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------- -->

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
    <script src="../node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="../node_modules/FormatMoney/FormatMoney.js"></script>
    <script src="../node_modules/fabric/dist/fabric.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script src="js/designer.js"></script>
    <script src="js/canvas.js"></script>
    <!-- <script src="js/script.js"></script> -->



    <script>

        
    </script>

<?php 
}?>
</body>

</html>