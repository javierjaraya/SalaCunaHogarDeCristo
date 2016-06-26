<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../../index.php");
}
$perfil = $_SESSION["idPerfil"];
//$nombreUsuario = $_SESSION["nombre"];
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Sala cuna Hogar de Cristo</title>
        <!-- end: Meta -->
        <link id="page_favicon" href="../../Files/img/logo.png" rel="icon" type="image/x-icon" />
        <!-- start: CSS -->
        <link href="../../Files/Complementos/bootstrap/css/bootstrap-flat.css" rel="stylesheet">        
        <link href="../../Files/Complementos/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link  href="../../Files/css/style.css" rel="stylesheet">

        <link  href="../../Files/css/chat.css" rel="stylesheet">  
        <link href="../../Files/css/chat.plugin.css" rel="stylesheet">
        <link  href="../../Files/js/charts/jquery.easy-pie-chart.css" rel="stylesheet">  
        <link  href="../../Files/Complementos/lib/selectize/selectize.css" rel="stylesheet">  
        <link  href="../../Files/css/component.css" rel="stylesheet"> 
        <link  href="../../Files/css/style-responsive.css" rel="stylesheet">


        <script src="../../Files/js/jquery.js"></script>
        <script src="../../Files/Complementos/lib/selectize/selectize.js"></script>        
        <script src="../../Files/Complementos/bootstrap/js/bootstrap.min.js"></script>        

        <script src="../../Files/js/charts/jquery.sparkline.min.js?v1.4.0"></script>
        <script src="../../Files/js/charts/jquery.easy-pie-chart.js?v1.4.0"></script>
        <script src="../../Files/js/charts/raphael.2.1.0.min.js?v1.4.0"></script>
        <script src="../../Files/js/charts/justgage.1.0.1.min.js?v1.4.0"></script>

        <script src="../../Files/Complementos/lib/scroll-slim/jquery.slimscroll.min.js"></script>
        <script src="../../Files/js/common.js"></script>

    </head>
    <body >
        <!-- AQUI VA EL MENU SUPERIROR-->
        <?php
        if ($perfil == 1) {
            include '../Menus/directoraSuperior.php';
        } else if ($perfil == 2) {
            include '../Menus/apoderadoSuperior.php';
        } else if ($perfil == 3) {
            include '../Menus/educadoraSuperior.php';
        }
        ?>
        <!-- FIN MENU SUPERIOR-->
        <!-- start: Header -->
        <div class="wrap">

            <!-- ALERTA -->
            <div class="container-fluid" style="display: none;">
                <div class="row-fluid">
                    <div class="alert alert-block alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Aqui contenido alerta
                    </div>                  
                </div>
            </div>
            <!-- FIN ALERTA -->

            <div class="container-fluid">
                <div class="row-fluid">

                    <!-- AQUI VA EL MENU LEFT-->
                    <?php
                    if ($perfil == 1) {
                        include '../Menus/directoraLeft.php';
                    } else if ($perfil == 2) {
                        include '../Menus/apoderadoLeft.php';
                    } else if ($perfil == 3) {
                        include '../Menus/educadoraLeft.php';
                    }
                    ?>
                    <!-- FIN MENU LEFT-->

                    <div id="content" class="span9" >

                        <!-- AQUI VA EL MENU INTERIOR-->

                        <!-- FIN MENU INTERIOR-->

                        <hr>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="social-box social-bordered social-blue">
                                    <div class="header">
                                        <h4>Tabla</h4>
                                    </div>
                                    <div class="body" style="text-align: center;">
                                        <div>
                                            <a class="btn btn-success btn-block" style="width: 200px;float: right; margin-bottom: 1%" onClick="location.href='agregarMenor.php'">
                                                Agregar Menor <i class="icon-book" ></i>
                                            </a>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead> 
                                                        <tr> 
                                                            <th>Run</th> 
                                                            <th>Nombres</th> 
                                                            <th>Apellidos</th> 
                                                            <th>Sexo</th>
                                                            <th>Fecha Nacimiento</th>
                                                            <th>Telefono</th>
                                                            <th>Apoderado</th>
                                                            <th>Quintil</th>
                                                            <th>Accion</th>
                                                        </tr> 
                                                    </thead>
                                                    <tbody id="tablaMenores">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                  

                        </div>
                    </div>
                    <div class="span2">
                        
                                                <aside class="social-sidebar sidebar-full">
                                                    <div class="social-sidebar-content">
                                                        <div class="sidebar-right ">
                        
                                                            <div class="chat-users">
                                                                <div class="no-user">User not found</div>
                                                                <ul class="user-list">
                                                                    <li>
                                                                        <a data-firstname="Cesar" data-lastname="Mendoza" data-status="online" data-userid="1" href="#">
                                                                            <img class="img-circle" src="../../Files/img/shaan.png" alt="">
                                                                            <span>shawn kan</span>
                                                                            <i class="icon-circle user-status online"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="2" href="#">
                                                                            <img class="img-circle" src="../../Files/img/shaan.png" alt="">
                                                                            <span>majoo bla</span>
                                                                            <i class="icon-circle user-status offline"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-firstname="Tobei" data-lastname="Tsumura" data-status="online" data-userid="3" href="#">
                                                                            <img class="img-circle" src="../../Files/img/content/half.png" alt="">
                                                                            <span>lol man</span>
                                                                            <i class="icon-circle user-status online"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-firstname="John" data-lastname="Doe" data-status="offline" data-userid="4" href="#">
                                                                            <img class="img-circle" src="../../Files/img/shaan.png" alt="">
                                                                            <span>John Doe</span>
                                                                            <i class="icon-circle user-status offline"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="5" href="#">
                                                                            <img class="img-circle" src="../../Files/img/content/half.png" alt="">
                                                                            <span>majoo bla</span>
                                                                            <i class="icon-circle user-status offline"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="6" href="#">
                                                                            <img class="img-circle" src="../../Files/img/shaan.png" alt="">
                                                                            <span>majoo bla</span>
                                                                            <i class="icon-circle user-status offline"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="7" href="#">
                                                                            <img class="img-circle" src="../../Files/img/content/shaan.png" alt="">
                                                                            <span>majoo bla</span>
                                                                            <i class="icon-circle user-status offline"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="8" href="#">
                                                                            <img class="img-circle" src="../../Files/img/content/half.png" alt="">
                                                                            <span>majoo bla</span>
                                                                            <i class="icon-circle user-status offline"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="9" href="#">
                                                                            <img class="img-circle" src="../../Files/img/content/smile.png" alt="">
                                                                            <span>majoo bla</span>
                                                                            <i class="icon-circle user-status offline"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <form class="user-filter">
                                                                    <div class="input-prepend open">
                                                                        <div class="btn-group dropup">
                                                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="icon-cog"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu pull-left">
                                                                                <li><a href="#">Chat Sounds</a></li>
                                                                                <li><a href="#">Advanced Settings...</a></li>
                                                                                <li class="divider"></li>
                                                                                <li><a href="#">Turn Off Chat</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <input type="text" class="input-filter" placeholder="Search user...">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                        
                                                    </div>
                        
                                                </aside>

                    </div> 
                </div>  

            </div><!--/#content.span19-->

            <div class="clearfix"></div>
            <div class="container-fluid m-t-large">
                <footer>
                    <p>
                        <span class="pull-left">© <a href="" target="_blank">Sala Cuna Hogar de Cristo</a> 2016</span>
                        <span class="hidden-phone pull-right">Powered by: <a href="#">uAdmin Dashboard</a></span>
                    </p>
                </footer>
            </div>
        </div>
        <script src="../../Files/js/modernizr.custom.js"></script>
        <script src="../../Files/js/toucheffects.js"></script>
        <!-- Chat Magic Happens here-->
        <script src="../../Files/js/chat/jquery-ui-1.10.1.custom.min.js"></script>
        <script src="../../Files/js/chat/jquery.slimscroll.min.js"></script>
        <script src="../../Files/js/chat/jquery.simplecolorpicker.js"></script>
        <script src="../../Files/js/chat/uipro.min.js"></script>
        <script src="../../Files/js/chat/jquery.ui.chatbox.js"></script>
        <script src="../../Files/js/chat/chatboxManager.js"></script>
        <script src="../../Files/js/chat/jquery.livefilter.js"></script>
        <script src="../../Files/js/chat/app.js"></script>
        <script src="../../Files/js/chat/demo-settings.js"></script><!--
        --><script src="../../Files/js/chat/sidebar.js"></script>
        <script src="../../Files/js/custom.js"></script>

        <script>
            /*<![CDATA[*/
            $(function () {
                App.init();
                SideBar.init({shortenOnClickOutside: false});
                $.uiPro({
                    rightMenu: '.rightPanel',
                    threshold: 15
                });
            });
            /*]]>*/
        </script>
        <script>
            $(function () {
                $(".chat-messages-list .content").slimScroll({start: "bottom", railVisible: true, alwaysVisible: true, height: '400px'});
                $("#users-list .content").slimScroll({"height": '460px'});
            });
        </script>
        <!-- Chat ends here-->

        <script>
            //Menores
            $(function () {
                cargarMenores();
            })

            function cargarMenores() {
                $("#tablaMenores").empty();
                var url_json = '../Servlet/administrarMenor.php?accion=LISTADO';
                $.getJSON(
                        url_json,
                        function (datos) {
                            console.log(datos);
                            $.each(datos, function (k, v) {
                                var contenido = "<tr>";
                                contenido += "<td>" + v.RunPersona + "</td>";
                                contenido += "<td>" + v.Nombres + "</td>";
                                contenido += "<td>" + v.Apellidos + "</td>";
                                contenido += "<td>" + v.Sexo + "</td>";
                                contenido += "<td>" + v.FechaNacimiento + "</td>";
                                contenido += "<td>" + v.Telefono + "</td>";
                                contenido += "<td>" + v.RunApoderado + "</td>";
                                contenido += "<td>" + v.SituacionSocioeconomica + "</td>";
                                contenido += "<td>";
                                contenido += "<button type='button' class='btn btn-warning btn-circle icon-pencil'  onclick='editar(" + v.RunPersona + ")'></button>";
                                contenido += "<button type='button' class='btn btn-danger btn-circle icon-trash'  onclick='borrar(" + v.RunPersona + ")'></button>";
                                contenido += "</td>";
                                contenido += "</tr>";
                                $("#tablaMenores").append(contenido);
                            });
                        }
                );
            }

            function editar(RunPersona) {
                window.location = "editarMenor.php?runPersona=" + RunPersona;
            }

            function borrar(RunPersona) {
                window.location = "borrarMenor.php?runPersona=" + RunPersona;
            }
        </script>

    </body>

</html>

