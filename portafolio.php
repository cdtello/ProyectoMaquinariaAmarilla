<?php
require("Conexion.php");
session_start();
if(!isset($_SESSION["usuario"]))
{
    header("location:index.html");
}

$id_usuario = $_SESSION["usuario"];
$consul = mysqli_query($conectar,"select nombres from usuarios where id_usuario = '$id_usuario'"); 
if(isset($_POST['ver']))
{
    $id_maquina=$_POST['id_maquina'];
}
while ($resultado_consulta = mysqli_fetch_row($consul))
{
    $nombre = $resultado_consulta[0];
}
                    


if(isset($_POST['filtrar']))
{
    $fecha=$_POST['fecha'];
    $consulta = "hola mundo";
}

else
{
    //$consulta = "select * from reportes where id_maquina = $id_maquina";
    $consulta = "select * from maquinas where id_usuario = $id_usuario";
}

echo"
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <title>Portafolio | Blue Monitor</title>
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/font-awesome.min.css' rel='stylesheet'>
    <link href='css/prettyPhoto.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>
    <link href='css/main.css' rel='stylesheet'>
    <link href='css/responsive.css' rel='stylesheet'>
    <!--[if lt IE 9]>
    <script src='js/html5shiv.js'></script>
    <script src='js/respond.min.js'></script>
    <![endif]-->       
    <link rel='shortcut icon' href='images/ico/favicon.ico'>
    <link rel='apple-touch-icon-precomposed' sizes='144x144' href='images/ico/apple-touch-icon-144-precomposed.png'>
    <link rel='apple-touch-icon-precomposed' sizes='114x114' href='images/ico/apple-touch-icon-114-precomposed.png'>
    <link rel='apple-touch-icon-precomposed' sizes='72x72' href='images/ico/apple-touch-icon-72-precomposed.png'>
    <link rel='apple-touch-icon-precomposed' href='images/ico/apple-touch-icon-57-precomposed.png'>
</head><!--/head-->
<body>

        <header id='header'>
   

        <nav class='navbar navbar-inverse' role='banner'>
            <div class='container'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                        <span class='sr-only'>Toggle navigation</span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                    </button>
                    <img src='img/iconos/logo.png' alt='logo' width='300' height='90'>
                
                </div>
                    <tr class='cart_menu' id='cart_menu'> 
                        <td class='image'> .                     
                        </td>
                    </tr>
                <div class='social'>
                    <ul>
                        <div class='top-number'><p><img src='img/iconos/Login.png' alt='logo' width='20' height='20'><font color='silver'>$nombre</font></p></div>
                        <div class='top-number'><p><a href='cerrar.php'>Cerrar Sesion</a></p></div>
                    </ul>
                </div> 
            </div>

        </nav><!--/nav-->
        
    </header><!--/header-->
    <section id='portfolio'>
        <div class='container'>
            <div class='center'>
               <h2>Maquinaria</h2>
               <p class='lead'>Seleccione para ver reporte de maquina</p>
            </div>
        

      
            <div class='row'>
                <div class='portfolio-items'>

                    <!--/.portfolio-item-->";
                    $result = mysqli_query($conectar,$consulta); 
                    while ($row = mysqli_fetch_row($result))
                    {
                    echo"
                    <form action='reporte.php' method='post'>
                    <div class='portfolio-item apps col-xs-12 col-sm-4 col-md-3'>
                        <div class='recent-work-wrap'>
                            
                            <img class='img-responsive' src='img/iconos/Logo2.png' alt=''>
                            <div ><p>$row[0]</p></div>
                            <div ><p>$row[2]</p></div>
                            <input type='hidden' name='id_maqui' id='id_maqui' value='$row[0]'/>                          

                        <div class='overlay' >
                            <input class='btn btn_primary' align='center' type='submit' name='ver' value='' style='width:200px;height:200px;background-color:transparent;background-image:url(img/iconos/ver2.png);' />
                        </div>

                        </div>
                   </div>
                   </form>
                    <!--/.portfolio-item-->";
                    }
                    echo"
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
    

    <footer id='footer' class='midnight-blue'>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-6'>
                    &copy; 2013 <a target='_blank' href='http://shapebootstrap.net/' title='Free Twitter Bootstrap WordPress Themes and HTML templates'>ShapeBootstrap</a>. All Rights Reserved.
                </div>

            </div>
        </div>
    </footer><!--/#footer-->

    <script src='js/jquery.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/jquery.prettyPhoto.js'></script>
    <script src='js/jquery.isotope.min.js'></script>
    <script src='js/main.js'></script>
    <script src='js/wow.min.js'></script>
</body>
</html>";
?>