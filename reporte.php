<?php
require("Conexion.php");
session_start();
if(!isset($_SESSION["usuario"]))
{
    header("location:index.html");
}

$id_usuario = $_SESSION["usuario"];


$consul = mysqli_query($conectar,"select nombres from usuarios where id_usuario = '$id_usuario'"); 
while ($resultado_consulta = mysqli_fetch_row($consul))
{
    $nombre = $resultado_consulta[0];
}


if(isset($_POST['ver']))
{
    $id_maquina=$_POST['id_maqui'];
    $consulta = "select * from reportes where id_maquina = '$id_maquina'";
}
                   
else if(isset($_POST['filtrar']))
{
    $ano=$_POST['Combo_Ano'];
    $mes=$_POST['Combo_Mes'];
    $dia=$_POST['Combo_Dia'];
    $id_maquina=$_POST['maquinita'];
    $consulta = "select * from reportes where id_maquina = '$id_maquina' and fecha = '$ano-$mes-$dia'";
}
else if(isset($_POST['ver_todo']))
{
    $id_maquina=$_POST['maquinita_todo'];
    $consulta = "select * from reportes where id_maquina = '$id_maquina'";
}
else
{
    header("location:index.html");
}

//else
//{
    //$consulta = "select * from reportes where id_maquina = $id_maquina";
  //  $consulta = "select * from usuarios where id_usuario = $id_usuario";
//}

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <title>Reporte | Blue Monitor</title>
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
    <style type='text/css'>
   
        select{
            background: #eee url(arrow.png);
            background-position: 280px center;
            background-repeat: no-repeat;
            padding: 10px;
            font-size: 16px;
            border: 0;
            border-radius: 3px;
           -webkit-appearance: none;
           -moz-appearance: none;

           -webkit-transition: all 0.4s;
           -moz-transition: all 0.4s;
           transition: all 0.4s;

           -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.3);
        }
        select:hover{
            background-color: #ddd;
        }
    </style>
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
                <div class='collapse navbar-collapse navbar-right'>
                    <ul class='nav navbar-nav'>
                        <li >
                        <a href='portafolio.php'>

                        <img src='img/iconos/maquinaria.png' alt='logo' width='80' height='50'>

                        </a></li> 
                        <li class='active'>
                            <form action='reporte.php' method='post'>
                                <input type='hidden' name='maquinita_todo' value='$id_maquina' />
                                <input class='btn' type='submit' name='ver_todo' value='Ver Todo' />
                            </form>  
                        </li>
                        <li class='active'>
                        <form action='reporte.php' method='post'>
                              
                        <tr class='cart_menu' id='cart_menu'>  
                        <td class='image'>
                        
                            <select name='Combo_Ano'>
                                <option selected value='0'>AÑO</option>
                                <option value='2017'>2017</option>
                                <option value='2018'>2018</option>
                                <option value='2019'>2019</option>
                                <option value='2020'>2020</option>
                            </select>
                        </td>
                        <td class='image'>
                        
                        <select name='Combo_Mes'>
                            <option selected value='0'>MES</option>
                            <option value='1'>Enero</option>
                            <option value='2'>Febrero</option>
                            <option value='3'>Marzo</option>
                            <option value='4'>Abril</option>
                            <option value='5'>Mayo</option>
                            <option value='6'>Junio</option>
                            <option value='7'>Julio</option>
                            <option value='8'>Agosto</option>
                            <option value='9'>Septiembre</option>
                            <option value='10'>Octubre</option>
                            <option value='11'>Noviembre</option>
                            <option value='12'>Diciembre</option>
                        </select>
                        </td>
                        <td class='image'>
                        
                        <select name='Combo_Dia'>
                            <option selected value='0'>DIA</option>
                            <option value='01'>01</option>
                            <option value='02'>02</option>
                            <option value='03'>03</option>
                            <option value='04'>04</option>
                            <option value='05'>05</option>
                            <option value='06'>06</option>
                            <option value='07'>07</option>
                            <option value='08'>08</option>
                            <option value='09'>09</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                            <option value='13'>13</option>
                            <option value='14'>14</option>
                            <option value='15'>15</option>
                            <option value='16'>16</option>
                            <option value='17'>17</option>
                            <option value='18'>18</option>
                            <option value='19'>19</option>
                            <option value='20'>20</option>
                            <option value='21'>21</option>
                            <option value='22'>22</option>
                            <option value='23'>23</option>
                            <option value='24'>24</option>
                            <option value='25'>25</option>
                            <option value='26'>26</option>
                            <option value='27'>27</option>
                            <option value='28'>28</option>
                            <option value='29'>29</option>
                            <option value='30'>30</option>
                            <option value='31'>31</option>
                        </select>
                        </td>
                        <td class='image'>
                            <input type='hidden' name='maquinita' value='$id_maquina' />
                            <input class='btn btn_primary' align='center' type='submit' name='filtrar' value='Filtrar' />
                        </td>
                        </tr>
                        </form> 
                        </li>                                
                    </ul>

            </div>
                
            </div><!--/.container-->
                <div class='social'>
                    <ul>
                        <div class='top-number'><p><img src='img/iconos/Login.png' alt='logo' width='20' height='20'><font color='silver'>$nombre</font></p></div>
                        <div class='top-number'><p><a href='cerrar.php'>Cerrar Sesion</a></p></div>
                    </ul>
                </div> 

        </nav><!--/nav-->
        
    </header><!--/header-->

<section id='cart_items'>
            <div class='table-responsive cart_info'>
                <table class='table table-condensed'>
                    <thead>
                        <tr class='cart_menu' id='cart_menu'>
                            
                            <td class='image'><h3><b>FECHA</h3></b></td>
                            <td class='image'><h3><b>ENCENDIDO</h3></b></td>
                            <td class='image'><h3><b>APAGADO</h3></b></td>
                            <td class='image'><h3><b>TIEMPO</h3></b></td>
                                     
                        </tr>
                    </thead>                                        
                    <tbody> ";

                    $result = mysqli_query($conectar,$consulta); 
                    while ($row = mysqli_fetch_row($result))
                    { 
                    echo"                                          
                        <form action='calificacion' method='post'>
                            <tr>                                           
                                <td class='cart_price'>
                                    $row[2]
                                </td>
                                <td class='cart_price'>
                                    $row[3]
                                </td>                                                        
                                <td class='cart_price'>
                                    $row[4]
                                </td>
                                <td class='cart_price'>
                                    $row[5]
                                </td>
                            </tr>                       
                        </form>";
                    }  
                    echo "                               
                    </tbody>
                </table>
            </div>

        <a href='#' onclick='window.print();return false;'><img src='img/iconos/pdf.png' alt='logo' width='100' height='80'></a>


        </div>
    </section>
    

    <footer id='footer' class='midnight-blue'>
        <div class='container'>
            <div class='row'>
                <div class='col-sm-6'>
                    <!-- &copy; 2017 Carlos Tello. All Rights Reserved.-->
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