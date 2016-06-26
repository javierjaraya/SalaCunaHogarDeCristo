<!DOCTYPE html>
<?php session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../../index.php");
}
$perfil = $_SESSION["idPerfil"];
$RunPersona= htmlspecialchars($_REQUEST['runPersona']);
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

        <!-- LIBRERIAS PARA AGREGAR APODERADOS -->
        <script type="text/javascript" src="../../Files/Complementos/lib/jquery-easyui-1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="../../Files/Complementos/lib/jquery-easyui-1.4.2/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../Files/Complementos/lib/jquery-easyui-1.4.2/plugins/jquery.datagrid.js"></script>

    </head>
    <body >
        <!-- AQUI VA EL MENU SUPERIROR-->
        <?php
        if ($perfil == 1) {
            include '../Menus/directoraSuperior.php';
        } else if ($perfil == 2) {
            include '../Menus/educadoraSuperior.php';
        } else if ($perfil == 3) {
            include '../Menus/apoderadoSuperior.php';
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
                        include '../Menus/educadoraLeft.php';
                    } else if ($perfil == 3) {
                        include '../Menus/apoderadoLeft.php';
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
                                        <h4>Borrar Menor</h4>
                                    </div>
                                    <div class="body" style="text-align: center;">
                                        <div class="row-fluid">
                                            <!-- CONTENIDO AQUI -->

                                            <!-- INICIO FORMULARIO -->
                                            <form id="fm-menor" class="form-horizontal well">
                                                <fieldset>
                                                    <legend>Datos Menor</legend>

                                                    <div class="control-group">
                                                        <label class="control-label" for="Run">Run</label>
                                                        <div class="controls">
                                                            <input class="input-xlarge focused" id="Run" name="Run" type="text" placeholder="112223334">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="Nombres">Nombres</label>
                                                        <div class="controls">
                                                            <input type="text" name="Nombres" class="input-xlarge" id="Nombres">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="Apellidos">Apellidos</label>
                                                        <div class="controls">
                                                            <input type="text" name="Apellidos" class="input-xlarge" id="Apellidos">
                                                        </div>
                                                    </div>    

                                                    <div class="control-group">
                                                        <label class="control-label" for="Sexo">Sexo</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="radio" id="SexoM" name="Sexo" value="Masculino">&nbsp;Masculino
                                                            </label>
                                                            <label class="checkbox">
                                                                <input type="radio" id="SexoF" name="Sexo" value="Femenino">&nbsp;Femenino
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="FechaNacimiento">Fecha Nacimiento</label>
                                                        <div class="controls">
                                                            <input type="date" name="FechaNacimiento" class="input-xlarge" id="FechaNacimiento">
                                                        </div>
                                                    </div> 
                                                    <div class="control-group">
                                                        <label class="control-label" for="Telefono">Telefono</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" id="Telefono" name="Telefono">
                                                        </div>
                                                    </div> 
                                                    <div class="control-group">
                                                        <label class="control-label" for="Direccion">Direccion</label>
                                                        <div class="controls">
                                                            <input type="text" name="Direccion" class="input-xlarge" id="Direccion">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="FechaMatricula">Fecha Matricula</label>
                                                        <div class="controls">
                                                            <input type="date" name="FechaMatricula" class="input-xlarge" id="FechaMatricula">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="IdNivel">Nivel</label>
                                                        <div class="controls">
                                                            <select id="IdNivel" name="IdNivel">
                                                                <option value="1">Menor</option>
                                                                <option value="2">mayor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="RunApoderado">Run Apoderado</label>
                                                        <div class="controls">
                                                            <input type="text" name="RunApoderado" class="input-xlarge" id="RunApoderado">
                                                        </div>
                                                    </div>  

                                                    <div class="form-actions">
                                                        <button type="button" onclick="borrarMenor()" class="btn btn-danger">Borrar Menor</button>
                                                        <button type="button" onclick="cancelar()" class="btn">Cancelar</button>
                                                    </div>
                                                </fieldset>

                                                <input type="hidden" id="accion" name="accion" value="">
                                                <input type="hidden" id="RunEditar" name="RunEditar" value="<?php echo $RunPersona; ?>">
                                            </form>
                                            <!-- FIN FORMULARIO-->
                                        </div>
                                    </div>
                                </div>
                            </div>                  

                        </div>
                    </div>
                    <div class="span2">
                        <!-- VENTANA CONTACTO DE CHAT-->
                        <aside class="social-sidebar sidebar-full">
                            <div class="social-sidebar-content">
                                <div class="sidebar-right ">

                                    <div class="chat-users">
                                        <div class="no-user">User not found</div>
                                        <!-- LISTA DE USUARIO CONTECTADOS-->
                                        <ul class="user-list" id="listaUsuarios">

                                        </ul>
                                        <!-- FORMULARIO BUSCAR CONTACTO Y CONFIGURACION-->
                                        <form class="user-filter">
                                            <div class="input-prepend open">
                                                <div class="btn-group dropup">
                                                    <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-cog"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-left">
                                                        <li><a href="#">Sonido Chat</a></li>
                                                        <li><a href="#">Configuracion Avanzada...</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">Turn Off Chat</a></li>
                                                    </ul>
                                                </div>
                                                <input type="text" class="input-filter" placeholder="Buscar usuario...">
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
                        <span class="pull-left">© <a href="" target="_blank">uExel</a> 2013</span>
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
        <script src="../../Files/js/controlador-chat.js"></script>
               
        <!-- Libreria para Validar Rut-->
        <script src="../../Files/js/validarut.js"></script>
        <script>
            //APODERADOS
            $(function () {
                obtenerDatosMenor();

            })

            function obtenerDatosMenor() {                
                var runEditar = document.getElementById("RunEditar").value;
                var url_json = '../Servlet/administrarMenor.php?accion=BUSCAR_BY_ID&RunPersona=' + runEditar;
                $.getJSON(
                        url_json,
                        function (dato) {                            
                            document.getElementById("Run").value = dato.RunPersona;
                            document.getElementById("Nombres").value = dato.Nombres;
                            document.getElementById("Apellidos").value = dato.Apellidos;
                            if (dato.Sexo.localeCompare("Femenino") == 0) {
                                document.getElementById("SexoF").checked = true;
                            } else {
                                document.getElementById("SexoM").checked = true;
                            }
                            document.getElementById("FechaNacimiento").value = dato.FechaNacimiento;
                            document.getElementById("Telefono").value = dato.Telefono;
                            document.getElementById("Direccion").value = dato.Direccion;
                            document.getElementById("FechaMatricula").value = dato.FechaMatricula;
                            document.getElementById("IdNivel").value = dato.IdNivel;                                                 
                            document.getElementById("RunApoderado").value = dato.RunApoderado;
                            
                        }
                );
            }

            function borrarMenor() {
                document.getElementById("accion").value = "DESHABILITAR";

                $('#fm-menor').form('submit', {
                    url: "../Servlet/administrarMenor.php",
                    onSubmit: function () {
                        return $(this).form('validate');
                    },
                    success: function (result) {
                        console.log(result);
                        var result = eval('(' + result + ')');
                        if (result.errorMsg) {
                            $.messager.alert('Error', result.errorMsg);
                        } else {
                            window.location = "administrarMenorDirectora.php";
                        }
                    }
                });
            }

            function cancelar() {
                window.location = "administrarMenorDirectora.php";
            }

        </script>
    </body>
</html>