<?php include 'head.html' ?>
<?php session_start(); ?>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-light-opaque">
            <a class="navbar-brand title text-primary" href="#">
                <img src="IMG/Logo-header.png" alt="" srcset="" style="max-width: 130px;">
            </a>
            <button class="navbar-toggler border-primary" type="button" data-toggle="collapse" data-target="#navbarLinks"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarLinks">
                <ul class="navbar-nav mr-auto mx-auto">
                    <li class="nav-item active mx-auto pb-2">
                        <a class="nav-link text" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active mx-auto pb-2">
                        <a class="nav-link text" href="#">Loja</a>
                    </li>
                    <li class="nav-item active mx-auto pb-2">
                        <a class="nav-link text" href="#">Sobre Nós</a>
                    </li>
                    <li class="nav-item active mx-auto pb-2">

                    <?php if (isset($_SESSION['id'])){ ?> 
                        <a class="btn btn-primary display-inline text" href="admin/index.php">Criar produto</a>
                    <?php }else{  ?>
                        <a class="btn btn-primary display-inline text" href="login.php">Criar produto</a>
                        </a>
                    <?php }?>
                    </li>
                </ul>

                 <?php if (isset($_SESSION['id'])){ ?> 
                    <a class="nav-link text text-light text-center pb-2 text" href="admin/index.php">
                            <i class="far fa-user-circle contact-icon"></i> Login
                        </a>
                    <?php }else{  ?>
                        <a class="nav-link text text-light text-center pb-2 text" href="login.php">
                            <i class="far fa-user-circle contact-icon"></i> Login
                        </a>
                    <?php }?>
                        
                <!-- <div class="dropdown">
                    <a class="nav-link dropdown-toggle text text-light" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-user-circle contact-icon"></i> Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text" href="#">Action</a>
                        <a class="dropdown-item text" href="#">Another action</a>
                        <div class="dropdown-divider text"></div>
                        <a class="dropdown-item text" href="#">Something else here</a>
                    </div>
                </div> -->

            </div>
        </nav>
    </header>