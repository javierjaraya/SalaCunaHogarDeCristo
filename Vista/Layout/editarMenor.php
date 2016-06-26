<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../../index.php");
}
$perfil = $_SESSION["idPerfil"];
$RunApoderado = htmlspecialchars($_REQUEST['runApoderado']);
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
                                        <h4>Apoderados</h4>
                                    </div>
                                    <div class="body" style="text-align: center;">
                                        <div class="row-fluid">
                                            <!-- CONTENIDO AQUI -->

                                            <!-- INICIO FORMULARIO -->
                                            <form id="fm-apoderado" class="form-horizontal well">
                                                <fieldset>
                                                    <legend>Datos Apoderado</legend>

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
                                                        <label class="control-label" for="Quintil">Quintil</label>
                                                        <div class="controls">
                                                            <select id="Quintil" name="Quintil">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
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
                                                        <label class="control-label" for="Estado">Estado</label>
                                                        <div class="controls">
                                                            <select id="Estado" name="Estado">
                                                                <option value="1">Habilitado</option>
                                                                <option value="2">Deshabilitado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="Clave">Clave</label>
                                                        <div class="controls">
                                                            <input type="password" name="Clave" class="input-xlarge" id="Clave">
                                                        </div>
                                                    </div>  
                                                    <div class="control-group">
                                                        <label class="control-label" for="ClaveRepetida">Repetir Clave</label>
                                                        <div class="controls">
                                                            <input type="password" name="ClaveRepetida" class="input-xlarge" id="ClaveRepetida">
                                                        </div>
                                                    </div>  
                                                    <div class="form-actions">
                                                        <button type="button" onclick="guardarApoderado()" class="btn btn-primary">Guardar Cambios</button>
                                                        <button type="button" onClick="location.href = 'administrarApoderadoDirectora.php'" class="btn">Cancelar</button>
                                                    </div>
                                                </fieldset>

                                                <input type="hidden" id="accion" name="accion" value="">
                                                <input type="hidden" id="RunEditar" name="RunEditar" value="<?php echo $RunApoderado; ?>">
                                            </form>



                                            <!-- FIN FORMULARIO-->
                                        </div>
                                    </div>
                                </div>
                            </div>                  

                        </div>
                    </div>
                    <div class="span2">
                        <!--
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
                        -->
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
            //CHAT
            $(function () {
                $(".chat-messages-list .content").slimScroll({start: "bottom", railVisible: true, alwaysVisible: true, height: '400px'});
                $("#users-list .content").slimScroll({"height": '460px'});
            });
        </script>
        <!-- Chat ends here-->
        <!-- Libreria para Validar Rut-->
        <script src="../../Files/js/validarut.js"></script>
        <script>
            //APODERADOS
            $(function () {
                obtenerDatosApoderado();

            })

            function obtenerDatosApoderado() {
                var runEditar = document.getElementById("RunEditar").value;
                var url_json = '../Servlet/administrarApoderado.php?accion=BUSCAR_BY_ID&RunPersona=' + runEditar;
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
                            document.getElementById("Quintil").value = dato.SituacionSocioeconomica;
                            document.getElementById("FechaNacimiento").value = dato.FechaNacimiento;
                            document.getElementById("Telefono").value = dato.Telefono;
                            document.getElementById("Direccion").value = dato.Direccion;
                            document.getElementById("Estado").value = dato.IdEstado;
                            document.getElementById("Clave").value = dato.Clave;
                            document.getElementById("ClaveRepetida").value = dato.Clave;
                        }
                );
            }

            function guardarApoderado() {
                document.getElementById("accion").value = "ACTUALIZAR";
                if (validar()) {
                    $('#fm-apoderado').form('submit', {
                        url: "../Servlet/administrarApoderado.php",
                        onSubmit: function () {
                            return $(this).form('validate');
                        },
                        success: function (result) {
                            console.log(result);
                            var result = eval('(' + result + ')');
                            if (result.errorMsg) {
                                $.messager.alert('Error', result.errorMsg);
                            } else {
                                window.location = "administrarApoderadoDirectora.php";
                            }
                        }
                    });
                }
            }

            function validar() {
                if (Rut(document.getElementById('Run').value)) {
                    if (document.getElementById('Nombres').value != "") {
                        if (document.getElementById('Apellidos').value != "") {
                            if (document.getElementById('FechaNacimiento').value != "") {
                                if (document.getElementById('Direccion').value != "") {
                                    var telefono = document.getElementById('Telefono').value;
                                    if (telefono != "" && telefono.length > 5) {
                                        if (!isNaN(telefono)) {
                                            var cadenaPass = document.getElementById('Clave').value;
                                            if (cadenaPass.length >= 4) {
                                                if (cadenaPass == document.getElementById('ClaveRepetida').value) {
                                                    return true;
                                                } else {
                                                    $.messager.alert("Alerta", "Las contraseñas no coinciden");
                                                }
                                            } else {
                                                $.messager.alert("Alerta", "La contraseña debe tener minimo 4 caracteres");
                                            }
                                        } else {
                                            $.messager.alert("Alerta", "El telefono contiene caracteres no validos");
                                        }
                                    } else {
                                        $.messager.alert("Alerta", "Debe ingresar una telefono de contacto con al menos 6 digitos");
                                    }
                                } else {
                                    $.messager.alert("Alerta", "Debe ingresar una direccion");
                                }
                            } else {
                                $.messager.alert("Alerta", "Debe ingresar una fecha de nacimiento");
                            }
                        } else {
                            $.messager.alert("Alerta", "Debe ingresar sus apellidos");
                        }
                    } else {
                        $.messager.alert("Alerta", "Debe ingresar sus nombres");
                    }
                } else {
                    $.messager.alert("Alerta", "El run ingresado no es valido");
                }
                return false;
            }

        </script>
    </body>
</html>