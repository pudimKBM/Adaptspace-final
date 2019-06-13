<?php session_start(); 
?>

<header>
    <!-- <div class="fixed-header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-black ">
            <a class="navbar-brand title text-primary" href="index.php">
                <img src="IMG/Logo-header.png" alt="" srcset="" style="max-width: 130px;">
            </a>
            <button class="navbar-toggler border-primary text-light" type="button" data-toggle="collapse" data-target="#navbarLinks" aria-controls="navbarLinks" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarLinks">
                <ul class="navbar-nav mr-auto mx-auto">
                    <li class="nav-item active mx-auto p-2">
                        <a class="btn btn-outline-light text" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active mx-auto p-2">
                        <a class="btn btn-outline-light text" href="shop.php">Loja</a>
                    </li>
                    <li class="nav-item active mx-auto p-2">
                        <a class="btn btn-outline-light text" href="http://adapt-influencers.esy.es/">Sobre Nós</a>
                    </li>
                    <li class="nav-item active mx-auto p-2">

                        <?php //if (isset($_SESSION['id'])){ 
                             //if (!isset($_SESSION['role']) ){ ?>
                                <a class="btn btn-primary display-inline text" href="admin/designer-unique.php?id=1&category=Camisetas&icon=phone">Criar produto</a>
                             <?php // }else{ ?>
                                <a class="btn btn-primary display-inline text" href="admin/designer.php?id=1&category=Camisetas&icon=phone">Criar produto</a>
                             <?php //}?>
                        <?php //}else{  ?>
                        <a class="btn btn-primary display-inline text" href="login.php">Criar produto</a>
                        </a>
                        <?php //}?>
                    </li>
                </ul>
                <a class="nav-link text text-light text-center pb-2 text" href="cart.php">
                    <i class="fas fa-shopping-cart"></i> Carrinho
                </a>
                <?php //if (isset($_SESSION['id'])){ ?>
                <a class="nav-link text text-light text-center pb-2 text" href="admin/index.php">
                    <i class="far fa-user-circle contact-icon"></i> Perfil
                </a>
                <a href="includes/logout.php" 
                    class="nav-link text text-light text-center pb-2 text">
                    <i class="fas fa-sign-out-alt contact-icon"></i> Sair
                </a>
                <?php// }else{  ?>
                <a class="nav-link text text-light text-center pb-2 text" href="login.php">
                    <i class="far fa-user-circle contact-icon"></i> Login
                </a>
                <?php// }?>

            </div>
        </nav>
    </div> -->
    <div class="fixed-header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-black">
            <a class="navbar-brand title text-primary" href="index.php">
                <img src="IMG/Logo-header.png" alt="" srcset="" style="max-width: 130px;">
            </a>
            <button class="navbar-toggler border-primary text-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mx-auto">
                    <li class="nav-item active mx-auto p-2">
                        <a class="btn btn-outline-light text" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active mx-auto p-2">
                        <a class="btn btn-outline-light text" href="shop.php">Loja</a>
                    </li>
                    <li class="nav-item active mx-auto p-2">
                        <a class="btn btn-outline-light text" href="http://adapt-influencers.esy.es/">Sobre Nós</a>
                    </li>
                    <li class="nav-item active mx-auto p-2">

                        <?php if (isset($_SESSION['id'])){ 
                             if (!isset($_SESSION['role']) ){ ?>
                        <a class="btn btn-primary display-inline text" href="admin/designer-unique.php?id=1&category=Camisetas&icon=phone">Criar
                            produto</a>
                        <?php  }else{ ?>
                        <a class="btn btn-primary display-inline text" href="admin/designer.php?id=1&category=Camisetas&icon=phone">Criar
                            produto</a>
                        <?php }?>
                        <?php }else{  ?>
                        <a class="btn btn-primary display-inline text" href="login.php">Criar produto</a>
                        </a>
                        <?php }?>
                    </li>
                </ul>
                <a class="nav-link text text-light text-center pb-2 text" href="cart.php">
                    <i class="fas fa-shopping-cart"></i> Carrinho
                </a>
                <?php if (isset($_SESSION['id'])){ ?>
                <a class="nav-link text text-light text-center pb-2 text" href="admin/index.php">
                    <i class="far fa-user-circle contact-icon"></i> Perfil
                </a>
                <a href="includes/logout.php" class="nav-link text text-light text-center pb-2 text">
                    <i class="fas fa-sign-out-alt contact-icon"></i> Sair
                </a>
                <?php }else{  ?>
                <a class="nav-link text text-light text-center pb-2 text" href="login.php">
                    <i class="far fa-user-circle contact-icon"></i> Login
                </a>
                <?php }?>

            </div>
        </nav>
    </div>
</header>


<div class="">
    <nav class="navbar navbar-dark bg-black ">
        <a class="navbar-brand title text-primary" href="#">
            <img src="IMG/Logo-header.png" alt="" srcset="" style="max-width: 130px;">
        </a>
    </nav>
</div>

