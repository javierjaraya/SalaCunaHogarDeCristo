<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../../index.php");
}
$perfil = $_SESSION["idPerfil"];
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
                                        <h4>Agregar Apoderado</h4>
                                    </div>
                                    <div class="body" style="text-align: center;">
                                        <div class="row-fluid">
                                            <!-- CONTENIDO AQUI -->

                                            <!-- INICIO FORMULARIO -->
                                            <form id="fm-apoderado" class="form-horizontal well">
                                                <fieldset>
                                                    <legend style="background-color: #d1d1ff;">Datos Apoderado</legend>

                                                    <div class="control-group">
                                                        <label class="control-label" for="RunApoderado">Run Apoderado</label>
                                                        <div class="controls">
                                                            <input class="input-xlarge focused" id="RunApoderado" name="RunApoderado" type="text" placeholder="112223334">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="NombresApoderado">Nombres</label>
                                                        <div class="controls">
                                                            <input type="text" name="NombresApoderado" class="input-xlarge" id="NombresApoderado">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="ApellidosApoderado">Apellidos</label>
                                                        <div class="controls">
                                                            <input type="text" name="ApellidosApoderado" class="input-xlarge" id="ApellidosApoderado">
                                                        </div>
                                                    </div>    

                                                    <div class="control-group">
                                                        <label class="control-label" for="SexoApoderado">Sexo</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="radio" id="SexoMApoderado" name="SexoApoderado" value="Masculino">&nbsp;Masculino
                                                            </label>
                                                            <label class="checkbox">
                                                                <input type="radio" id="SexoFApoderado" name="SexoApoderado" value="Femenino">&nbsp;Femenino
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="QuintilApoderado">Quintil</label>
                                                        <div class="controls">
                                                            <select id="QuintilApoderado" name="QuintilApoderado">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="FechaNacimientoApoderado">Fecha Nacimiento</label>
                                                        <div class="controls">
                                                            <input type="date" name="FechaNacimientoApoderado" class="input-xlarge" id="FechaNacimientoApoderado">
                                                        </div>
                                                    </div> 
                                                    <div class="control-group">
                                                        <label class="control-label" for="TelefonoApoderado">Telefono</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" id="TelefonoApoderado" name="TelefonoApoderado">
                                                        </div>
                                                    </div> 
                                                    <div class="control-group">
                                                        <label class="control-label" for="DireccionApoderado">Direccion</label>
                                                        <div class="controls">
                                                            <input type="text" name="DireccionApoderado" class="input-xlarge" id="DireccionApoderado">
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
                                                </fieldset>
                                                <fieldset>
                                                    <legend style="background-color: #d1d1ff;">Datos del Menor</legend>
                                                    <div class="control-group">
                                                        <label class="control-label" for="RunMenor">Run</label>
                                                        <div class="controls">
                                                            <input class="input-xlarge focused" id="RunMenor" name="RunMenor" type="text" placeholder="112223334">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="NombresMenor">Nombres</label>
                                                        <div class="controls">
                                                            <input type="text" name="NombresMenor" class="input-xlarge" id="NombresMenor">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="ApellidosMenor">Apellidos</label>
                                                        <div class="controls">
                                                            <input type="text" name="ApellidosMenor" class="input-xlarge" id="ApellidosMenor">
                                                        </div>
                                                    </div>    

                                                    <div class="control-group">
                                                        <label class="control-label" for="SexoMenor">Sexo</label>
                                                        <div class="controls">
                                                            <label class="checkbox">
                                                                <input type="radio" id="SexoMMenor" name="SexoMenor" value="Masculino">&nbsp;Masculino
                                                            </label>
                                                            <label class="checkbox">
                                                                <input type="radio" id="SexoFMenor" name="SexoMenor" value="Femenino">&nbsp;Femenino
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="FechaNacimientoMenor">Fecha Nacimiento</label>
                                                        <div class="controls">
                                                            <input type="date" name="FechaNacimientoMenor" class="input-xlarge" id="FechaNacimientoMenor">
                                                        </div>
                                                    </div> 
                                                    <div class="control-group">
                                                        <label class="control-label" for="TelefonoMenor">Telefono</label>
                                                        <div class="controls">
                                                            <input type="text" class="input-xlarge" id="TelefonoMenor" name="TelefonoMenor">
                                                        </div>
                                                    </div> 
                                                    <div class="control-group">
                                                        <label class="control-label" for="DireccionMenor">Direccion</label>
                                                        <div class="controls">
                                                            <input type="text" name="DireccionMenor" class="input-xlarge" id="DireccionMenor">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="FechaMatriculaMenor">Fecha Matricula</label>
                                                        <div class="controls">
                                                            <input type="date" name="FechaMatriculaMenor" class="input-xlarge" id="FechaMatriculaMenor">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="IdNivelMenor">Nivel</label>
                                                        <div class="controls">
                                                            <select id="IdNivelMenor" name="IdNivelMenor">
                                                                <option value="1">Menor</option>
                                                                <option value="2">mayor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <button type="button" onclick="guardarApoderado()" class="btn btn-primary">Guardar Apoderado</button>
                                                        <button type="button" onClick="location.href = 'administrarApoderadoDirectora.php'" class="btn">Cancelar</button>
                                                    </div>
                                                </fieldset>

                                                <input type="hidden" id="accion" name="accion" value="">
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
                        <span class="pull-left">© <a href="" target="_blank">Sala Cuna Hogar De Cristo</a> 2016</span>
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

                                                            })

                                                            function guardarApoderado() {
                                                                document.getElementById("accion").value = "AGREGAR";
                                                                if (validarApoderado() && validarMenor()) {
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
                                                                                $.messager.show({
                                                                                    title: 'Aviso',
                                                                                    msg: result.mensaje
                                                                                });
                                                                                window.location = "administrarApoderadoDirectora.php";
                                                                            }
                                                                        }
                                                                    });
                                                                }
                                                            }

                                                            function validarApoderado() {
                                                                if (Rut(document.getElementById('RunApoderado').value)) {
                                                                    if (document.getElementById('NombresApoderado').value != "") {
                                                                        if (document.getElementById('ApellidosApoderado').value != "") {
                                                                            if (document.getElementById('SexoMApoderado').checked || document.getElementById('SexoFApoderado').checked) {
                                                                                if (document.getElementById('FechaNacimientoApoderado').value != "") {
                                                                                    if (document.getElementById('DireccionApoderado').value != "") {
                                                                                        var telefono = document.getElementById('TelefonoApoderado').value;
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
                                                                                $.messager.alert("Alerta", "Debe seleccionar su sexo");
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
                                                            function validarMenor() {
                                                                if (Rut(document.getElementById('RunMenor').value)) {
                                                                    if (document.getElementById('NombresMenor').value != "") {
                                                                        if (document.getElementById('ApellidosMenor').value != "") {
                                                                            if (document.getElementById('SexoMMenor').checked || document.getElementById('SexoFMenor').checked) {
                                                                                if (document.getElementById('FechaNacimientoMenor').value != "") {
                                                                                    if (document.getElementById('DireccionMenor').value != "") {
                                                                                        var telefono = document.getElementById('TelefonoMenor').value;
                                                                                        if (telefono != "" && telefono.length > 5) {
                                                                                            if (!isNaN(telefono)) {
                                                                                                if (document.getElementById('FechaMatriculaMenor').value != "") {
                                                                                                    return true;
                                                                                                } else {
                                                                                                    $.messager.alert("Alerta", "Ingrese una fecha de matricula");
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
                                                                                $.messager.alert("Alerta", "Debe seleccionar su sexo");
                                                                            }
                                                                        } else {
                                                                            $.messager.alert("Alerta", "Debe ingresar sus apellidos");
                                                                        }
                                                                    } else {
                                                                        $.messager.alert("Alerta", "Debe ingresar sus nombres");
                                                                    }
                                                                } else {
                                                                    $.messager.alert("Alerta", "El run del menor ingresado no es valido");
                                                                }
                                                                return false;
                                                            }


        </script>
    </body>
</html>