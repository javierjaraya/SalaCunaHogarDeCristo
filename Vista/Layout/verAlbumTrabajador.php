<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['autentificado'] != "SI") {
    header("Location: ../../../index.php");
}
$perfil = $_SESSION["idPerfil"];
$idAlbum = htmlspecialchars($_REQUEST['id']);
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

        <script type="text/javascript" src="../../Files/Complementos/lib/jquery-easyui-1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="../../Files/Complementos/lib/jquery-easyui-1.4.2/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="../../Files/Complementos/lib/jquery-easyui-1.4.2/plugins/jquery.datagrid.js"></script>

        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="../../Files/Complementos/lib/jquery-easyui-1.4.2/demo/demo.css">
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
                        <div class="row-fluid">
                            <div class="span2">
                                <button class="btn btn-success btn-circle btn-res"><i class="icon-download-alt" onClick="descargar(<?php echo $idAlbum; ?>)"></i>Descargar</button>
                            </div>                            
                            <div class="span2">
                                <button href="" class="btn btn-warning btn-circle btn-res"><i class="icon-edit" onclick="editar()"></i>Editar</button>
                            </div>
                            <div class="span2">
                                <button href="" class="btn btn-danger btn-circle btn-res"><i class="icon-trash" onclick="borrar()"></i>Borrar</button>
                            </div>
                        </div>
                        <!-- FIN MENU INTERIOR-->

                        <hr>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="social-box social-bordered social-blue">
                                    <div class="header">
                                        <h4 id="titulo-album"></h4>
                                    </div>
                                    <div class="body" style="text-align: center;">
                                        <div class="row-fluid">
                                            <!-- CONTENIDO AQUI -->                                                                                          
                                            <div id="descripcion-album" style="padding-bottom: 10px;"></div>
                                            <div class="galeria" id="galeria-fotos">                                                

                                            </div>
                                            <div id="fecha-album" style="padding-top: 10px; text-align: right;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>                               
                        </div>
                        <div class="row-fluid">
                            <div class="span12 ">
                                <div class="grid">
                                    <!-- <div class="grid-title5">
                                         <div class="pull-left">
                                             <div class="icon-title"><i class="icon-bar-chart"></i></div>
                                             <span>Fotografias</span> 
                                             <div class="clearfix"></div>
                                         </div>
                                         <div class="pull-right"> 
 
                                             <div class="icon-title"><a href="/Vista/gallery_plus.html"><i class="icon-eye-open"></i> Ir a galeria</a></div>
                                         </div>
                                         <div class="clearfix"></div>   
                                     </div>-->

                                    <!--<ul class="grid1 cs-style-4">
                                        <li>
                                            <figure>
                                                <div><img src="../../Files/img/content/4.png" alt="img04"></div>
                                                <figcaption>
                                                    <h3>Perfil</h3>
                                                    <span>Great Public Profiles</span>
                                                    <div class="btn-group btn-gallery">
                                                        <button class="btn btn-small  btn-warning"><i class="icon-trash"></i> DELETE</button>                                                                                                                      
                                                        <button class="btn  btn-small btn-warning"><i class="icon-eye-open"></i>VIEW</button>
                                                    </div>						
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <div><img src="../../Files/img/content/6.png" alt="img06"></div>
                                                <figcaption>
                                                    <h3>Quick Post</h3>
                                                    <span>uExel</span>
                                                    <div class="btn-group btn-gallery">
                                                        <button class="btn btn-small  btn-warning"><i class="icon-trash"></i> DELETE</button>                                                                                                                      
                                                        <button class="btn  btn-small btn-warning"><i class="icon-eye-open"></i>VIEW</button>
                                                    </div>						
                                                </figcaption>
                                            </figure>
                                        </li>
                                        <li>
                                            <figure>
                                                <div><img src="../../Files/img/content/3.png" alt="img02"></div>
                                                <figcaption>
                                                    <h3>Mobile</h3>
                                                    <span>uExel</span>
                                                    <div class="btn-group btn-gallery">
                                                        <button class="btn btn-small  btn-warning"><i class="icon-trash"></i> DELETE</button>                                                                                                                      
                                                        <button class="btn  btn-small btn-warning"><i class="icon-eye-open"></i>VIEW</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </li>

                                        <li>
                                            <figure>
                                                <div><img src="../../Files/img/content/5.png" alt="img05"></div>
                                                <figcaption>
                                                    <h3>Responsive</h3>
                                                    <span>uExel</span>
                                                    <div class="btn-group btn-gallery">
                                                        <button class="btn btn-small  btn-warning"><i class="icon-trash"></i> DELETE</button>                                                                                                                      
                                                        <button class="btn  btn-small btn-warning"><i class="icon-eye-open"></i>VIEW</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </li>
                                    </ul>-->
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
                        <span class="pull-left">© <a href="" target="_blank">Sala Cuna Hogar De Cristo</a> 2013</span>
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


        <input type="hidden" name="idAlbum" id="idAlbum" value="<?php echo $idAlbum; ?>">        
        <!-- LIBRERIAS GALERIA DE FOTOS -->
        <script type="text/javascript" src="../../Files/Complementos/lightbox/dist/js/lightbox.js"></script>
        <link rel="stylesheet" href="../../Files/Complementos/lightbox/dist/css/lightbox.css" type="text/css" />
    </body>

    <script type="text/javascript">

                                    $(function () {
                                        cargarFotos();
                                    });

                                    function cargarFotos() {
                                        var idAlbum = document.getElementById("idAlbum").value;
                                        var url_json = '../Servlet/administrarFotografia.php?accion=LISTADO_BY_ALBUM&idAlbum=' + idAlbum;
                                        $.getJSON(
                                                url_json,
                                                function (datos) {
                                                    $("#titulo-album").empty();
                                                    $("#titulo-album").append(datos.album.Titulo);
                                                    $("#descripcion-album").empty();
                                                    $("#descripcion-album").append(datos.album.Descripcion);
                                                    $("#fecha-album").empty();
                                                    $("#fecha-album").append("<small>Fecha Creación: " + datos.album.Fecha + "</small>");
                                                    $("#galeria-fotos").empty();
                                                    var cont = 0;
                                                    var imagenes = "";
                                                    $.each(datos.fotografias, function (k, v) {
                                                        imagenes += "<a class='thumbnail span3' href='../../" + v.Ruta + "' rel='lightbox[galeria]' title='" + v.Fecha + "'><img src='../../" + v.Ruta + "' width='300px' height='300px'/></a>";
                                                        cont++;
                                                        if (cont == 4) {
                                                            $("#galeria-fotos").append("<div class='row-fluid' style='padding-bottom: 20px;'>" + imagenes + "</div>");
                                                            cont = 0;
                                                            imagenes = "";
                                                        }
                                                    });
                                                    if (cont > 0) {
                                                        $("#galeria-fotos").append("<div class='row-fluid'>" + imagenes + "</div>");
                                                    }
                                                }
                                        );
                                    }

                                    function descargar(idAlbum) {
                                        var idAlbum = document.getElementById("idAlbum").value;
                                        var url_json = '../Servlet/administrarFotografia.php?accion=LISTADO_BY_ALBUM&idAlbum=' + idAlbum;
                                        $.ajax({
                                            async: true, /*false = sincronas (El cliente se bloquea)   || true = asincrona (El cliente sigue funcionando)*/
                                            url: '../Servlet/administrarFotografia.php',
                                            type: "post",
                                            data: "accion=LISTADO_BY_ALBUM&idAlbum=" + idAlbum,
                                            success: function (data) {
                                                var data = eval('(' + data + ')');
                                                $.each(data.fotografias, function (k, v) {
                                                    //console.log("../../" + v.Ruta);
                                                    //window.win = open("../../" + v.Ruta);                                                    
                                                    var link = document.createElement('a');
                                                    link.href = "../../" + v.Ruta;
                                                    link.download = "../../" + v.Ruta;
                                                    document.body.appendChild(link);
                                                    link.click();
                                                });
                                            }
                                        });

                                    }

                                    function editar() {
                                        var idAlbum = document.getElementById("idAlbum").value;
                                        window.location = "editarAlbumTrabajador.php?id=" + idAlbum;
                                    }

                                    function borrar() {
                                        var idAlbum = document.getElementById("idAlbum").value;
                                        window.location = "borrarAlbumTrabajador.php?id=" + idAlbum;
                                    }
    </script>
</html>
