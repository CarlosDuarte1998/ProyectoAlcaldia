<?php
@session_start();

include "../Clases/BD.php";
$conn= new baseD();
if(isset($_SESSION['rol'])){
    if($_SESSION['rol']!=3){
        header("location: ../index.php");
    }
    else{
?>
<!doctype html>
<html lang="en">

<head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-2">
                <a href="./index.php"><img src="../images/logo_alcaldia.png" alt="" width="80px" class="img logo  mb-5"></a>
                <ul class="list-unstyled components mb-5">

                    <li>
                    <a href="?x=clientes.php"> <span class="material-icons"><img src="../images/icons/clientes.png" alt=""></span>  Clientes</a>
                    </li>
                    
                    <li>
                    <a href="?x=cargosvarios.php"> <span class="material-icons"><img src="../images/icons/cargos.png" alt=""></span>  Cargos Varios</a>
                    </li>
                    <li><a href="?x=contribuyentes.php"> <span class="material-icons"><img src="../images/icons/contribuyentes.png" alt=""></span>  Contribuyentes</a>
                    </li>                   
                    
                    <li>
                        <a href="?x=usuarios.php"> <span class="material-icons"><img src="../images/icons/usuarios.png" alt="">  Usuarios</a>
                    </li>
                    <!--<li>
                        <a target="blank" href="../graficas/graficas.php"> <span class="material-icons"><img src="../images/icons/graficas.png" alt="" width="30px" style="margin-left: 5px;"> Graficas</a>
                    </li> -->
                    <li>
                        <a href="../cerrar.php"> <span class="material-icons"><img src="../images/icons/salir.png" alt="" width="30px" style="margin-left: 5px;"> Salir</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="./index.php">Inicio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Ayuda</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><b><?php echo strtoupper($_SESSION['Nombre']);?> &nbsp</b></a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="../cerrar.php">Cerrar</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <?php
            if (isset($_GET['x'])) {
                include($_GET['x']);
            } else {
                include("../Pagina principal.html");
            }

            ?>
        </div>
    </div>



    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>

<?php
       }
    }
    else{
        header("location: ../login.php");
    }
?>