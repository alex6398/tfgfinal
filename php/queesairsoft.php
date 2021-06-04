<?php
 include_once '../init.php';

?>
<!doctype html>
<html lang="es">

<head>
    <!-- meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet' type='text/css' />
    
    <!--favicon-->
    <link rel="icon" type="image/png" href="../images/favicon/favicon-16x16.png" />
    <!-- estilos-->
    <link rel="stylesheet" href="../css/estilos.css" />
    <!--titulo-->
    <title>TACTICAL AIRSOFT</title>
</head>

<body>
    <header>
        <!--cabecera-->
        <div id="contenido_cabecera">
            <div id="cabecera" class="d-flex flex-wrap justify-content-around align-items-center">
                <!--logo-->
                <div>
                    <!--El logo nos enviara a la pagina principal-->
                    <a href="../index.php"><img src="../images/logo/logo2.png" alt="logo" width="200" height="100%"></a>
                </div>
                <div class="d-none d-lg-flex">
                    <div class="d-flex inline-block">
                        <?php
                        //se comprueba si existe una sesion iniciada de login 
                if(!isset($_SESSION['id'])){
                    //si no hay se mostrará los botones de registro e inicio
                ?>
                        <!--registro/inicio-->
                        <!--El boton al hacer click nos enviará a registro.php-->
                        <button type="button" class="btn btn-outline-primary me-2" onclick="location.href='./registro.php'">Registro</button>
                        <!--El boton al hacer click nos enviará a login.php-->
                        <button type="button" class="btn btn-outline-primary me-2" onclick="location.href='./login.php'">Inicio</button>
                        <?php
                }else{
                    //se guarda la variable de la id y se usa para hacer uso de una funcion de la clase usuario
                    $user_id = $_SESSION['id'];
                    $user = $usuario->userData($user_id);
                ?>
                        <!--usuariologin-->
                        <div class="dropdown" style="position:relative; z-index:10000;">
                            <a class="btn btn-outline-primary dropdown-toggle me-2" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <!--se pone el nombre del usuario-->
                                <?php echo $user->nombre; ?>
                            </a>
                            <!--datos del desplegable que vera el usuario-->
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <!--Enlace que nos enviará a informacion.php-->
                                <li><a class="dropdown-item" href="./informacion.php">Información personal</a></li>
                                <!--Enlace que nos enviará a mispedidos.php-->
                                <li><a class="dropdown-item" href="./mispedidos.php">Mis pedidos</a></li>
                                <!--Enlace que nos enviará a logout.php-->
                                <li><a class="dropdown-item" href="./logout.php">Cerrar sesion</a></li>
                            </ul>
                        </div>

                        <?php
                }
                ?>
                        <!--carrito-->
                        <!--Al hacer click nos enviará a la pagina carrito.php-->
                        <button type="button" class="btn btn-outline-primary" onclick="location.href='./carrito.php'"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="count">
                                <?php 
                            //se comprueba si existe una sesion carrito el cual ira contando el numero de articulos por id que hay en la cesta si no hay el numero sera cero
                          if(isset($_SESSION['carrito'])){
                            echo count($_SESSION['carrito']);
                          }else{ 
                            echo 0;
                          }
                        ?>
                            </span></button>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!--navbar-->
    <div class="sticky-top" style="background: linear-gradient(#007bff, #004982); ">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <!--navbar para móvil del navbar en pc-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--navbar para móvil del registro/inicio o de nombre del usuario y su desplegable-->
                <button type="button" class="btn btn-outline-primary navbar-toggler" data-bs-toggle="collapse" data-bs-target="#usuario" aria-controls="usuario"><i class="fa fa-user" aria-hidden="true"></i></button>
                <!--navbar para móvil del carrito -->
                <button type="button" class="btn btn-outline-primary navbar-toggler" onclick="location.href='./carrito.php'"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="count">
                            <?php 
                            //se comprueba si existe una sesión carrito el cual irá contando el numero de articulos por id que hay en la cesta, si no hay el número será cero
                          if(isset($_SESSION['carrito'])){
                            echo count($_SESSION['carrito']);
                          }else{ 
                            echo 0;
                          }
                        ?>
                        </span></button>
                <!--datos del desplegable del navbar para pc-->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Armas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!--Enlace que nos enviará a fusiles.php-->
                                <li><a class="dropdown-item" href="./fusiles.php">Fusiles</a></li>
                                <!--Enlace que nos enviará a escopetas.php-->
                                <li><a class="dropdown-item" href="./escopetas.php">Escopetas</a></li>
                                <!--Enlace que nos enviará a ametralladoras.php-->
                                <li><a class="dropdown-item" href="./ametralladoras.php">Ametralladoras</a></li>
                                <!--Enlace que nos enviará a pistolas.php-->
                                <li><a class="dropdown-item" href="./pistolas.php">Pistolas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Accesorios
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!--Enlace que nos enviará a culatas.php-->
                                <li><a class="dropdown-item" href="./culatas.php">Culatas</a></li>
                                <!--Enlace que nos enviará a silenciadores.php-->
                                <li><a class="dropdown-item" href="./silenciadores.php">Silenciadores</a></li>
                                <!--Enlace que nos enviará a visores.php-->
                                <li><a class="dropdown-item" href="./visores.php">Visores</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Equipamiento
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!--Enlace que nos enviará a cascos.php-->
                                <li><a class="dropdown-item" href="./cascos.php">Cascos</a></li>
                                <!--Enlace que nos enviará a chalecos.php-->
                                <li><a class="dropdown-item" href="./chalecos.php">Chalecos</a></li>
                                <!--Enlace que nos enviará a mochilas.php-->
                                <li><a class="dropdown-item" href="./mochilas.php">Mochilas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Consumibles
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!--Enlace que nos enviará a baterias.php-->
                                <li><a class="dropdown-item" href="./baterias.php">Baterias</a></li>
                                <!--Enlace que nos enviará a bolas.php-->
                                <li><a class="dropdown-item" href="./bolas.php">Bolas</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--Usuario toggle-->
                <!--datos del desplegable para móvil de registro/inicio o del nombre del usuario y su deplegable correspondiente-->
                <div class="collapse navbar-collapse" id="usuario">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown d-md-none">
                            <?php
                                //se comprueba si existe una sesión iniciada de login 
                                if(!isset($_SESSION['id'])){
                                //si no hay se mostrará los botones de registro e inicio
                            ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Usuario
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!--Enlace que nos enviará a registro.php-->
                                <li><a class="dropdown-item" href="./registro.php">Registro</a></li>
                                <!--Enlace que nos enviará a registro.php-->
                                <li><a class="dropdown-item" href="./login.php">Iniciar sesión</a></li>
                            </ul>
                            <?php
                            }else{
                                //se guarda la variable de la id y se usa para hacer uso de una función de la clase usuario
                                $user_id = $_SESSION['id'];
                                $user = $usuario->userData($user_id);
                            ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $user->nombre; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!--Enlace que nos enviará a informacion.php-->
                                <li><a class="dropdown-item" href="./informacion.php">Información personal</a></li>
                                <!--Enlace que nos enviará a mispedidos.php-->
                                <li><a class="dropdown-item" href="./mispedidos.php">Mis Pedidos</a></li>
                                <!--Enlace que nos enviará a logout.php-->
                                <li><a class="dropdown-item" href="./logout.php">Cerrar sesion</a></li>
                            </ul>
                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    <div id="contenido" class="container">
        <!--Texto sobre lo que es el airsoft-->
        <h2><b>QUE ES AIRSOFT</b></h2>
        <p class="justificar">El Airsoft no es sólo un juego y un deporte de estrategia, sino una de las actividades más populares de los últimos años. Las partidas de airsoft están basadas en la simulación militar totalmente seguras donde los proyectiles no dejan manchas de pintura ni moratones. ¡Un deporte de aventuras excelente!</p>
        <p class="justificar">El concepto “Airsoft” es un término anglosajón que se traduciría como “aire suave”. Esto viene a decir la forma y el tipo de munición empleada. Las réplicas de airsoft suelen tener cierto parecido a las armas de fuego reales para crear una experiencia más inmersiva y real. Estas irán acompañadas de diferentes campos, elementos y roles que sumergirán a los jugadores en entornos bélicos reales.</p>
        <p class="justificar">Esta actividad lúdico-deportiva se desarrolla mediante unos materiales específicos, al aire libre o en recintos apropiados, e involucra disciplinas técnicas relacionadas con la simulación, la táctica, el T.P.A. (Tiro Práctico de Airsoft) y la orientación. Por otro lado, el airsoft es un juego en equipo, ensalzando los valores de compañerismo, respeto al prójimo y, sobre todo, sentimientos donde impera la deportividad y el honor.</p>
        <img src="../images/tienda_imagenes/queesairsoft.jpg" alt="sobrenosotros.jpg" class="img-fluid">
    </div>
<!-- Footer -->
    <footer class=" text-center text-white" style="background-color: #121212;">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Seccion: Social media -->
            <section class="mb-4">
                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/TacticalAirsof1" role="button"><i class="fa fa-twitter"></i></a>
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/tacticalairsoft_2021/" role="button"><i class="fa fa-instagram"></i></a>
            </section>
            <!-- Seccion: Social media -->

            <!-- Seccion: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row justify-content-center">
                    <!--Grid columna-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 ">
                        <h5 class="text-uppercase">tactical airsoft</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <!--Enlace que nos enviará sobrenosotros.php-->
                                <a href="./sobrenosotros.php" class="text-white" style="text-decoration: none;">Sobre nosotros</a>
                            </li>
                            <li>
                                <!--Enlace que nos enviará queesairsoft.php-->
                                <a href="./queesairsoft.php" class="text-white" style="text-decoration: none;">Que es airsoft</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid columna-->

                    <!--Grid columna-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Su cuenta</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <!--Enlace que nos enviará informacion.php-->
                                <!--Se comprueba que exite la sesion de usuario sino esta el enlace no nos enviará a informacion.php-->
                                <?php if(!isset($_SESSION['id'])){ ?>
                                <a href="#" class="text-white" style="text-decoration: none;">Información personal</a>
                                <?php  }else{?>
                                <a href="./informacion.php" class="text-white" style="text-decoration: none;">Información personal</a>
                                <?php }?> 
                            </li>
                            <li>
                                <!--Enlace que nos enviará mispedidos.php-->
                                <!--Se comprueba que exite la sesion de usuario sino esta el enlace no nos enviará a mispedidos.php-->
                                <?php if(!isset($_SESSION['id'])){ ?>
                                <a href="#" class="text-white" style="text-decoration: none;">Mis pedidos</a>
                                <?php  }else{?>
                                <a href="./mispedidos.php" class="text-white" style="text-decoration: none;">Mis pedidos</a>
                                <?php }?> 
                            </li>
                        </ul>
                    </div>
                    <!--Grid columna-->
                    <!--Grid columna-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Contacto</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <p class="text-white">Tactical Airsoft</p>
                            </li>
                            <li>
                                <p class="text-white">Telefono: <b>635730289</b></p>
                            </li>
                            <li>
                                <p class="text-white">Email <b>tacticalairsoft@hotmail.es</b></p>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Seccion: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 " style="background-color: rgba(0, 0, 0, 0.2);"> <!--se mete un color mas oscuro para el div del copyright respecto al resto del footer -->
            © 2021 Copyright
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    
    <!--scripts necesarios para el funcionamiento de del bootstrap -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
