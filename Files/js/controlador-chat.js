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

$(function () {
    $(".chat-messages-list .content").slimScroll({start: "bottom", railVisible: true, alwaysVisible: true, height: '400px'});
    $("#users-list .content").slimScroll({"height": '460px'});

    cargarListaUsuarios();
});

var contactos = new Array();
function cargarListaUsuarios() {
    $("#listaUsuarios").empty();
    var url_json = '../Servlet/administrarMensaje.php?accion=OBTIENE_LISTA_CONTACTOS_HTML';
    $.getJSON(
            url_json,
            function (datos) {
                var count = 1;
                //data-status = online o  offline
                $.each(datos.usuarios, function (k, v) {                    
                    //var runID = (v.Run.substring(0, v.Run.length-1));   
                    contactos[count] = v.Run;                    
                    var nombreResumen = v.Nombres.split(" ")[0] + " " + v.Apellidos.split(" ")[0];
                    var contenido = "<li onclick='abrirVentana(" + count + ",\"" + nombreResumen + "\"," + v.Run + " ,false)'>"
                    contenido += "    <a data-firstname='" + v.Nombres.split(" ")[0] + "' data-lastname='" + v.Apellidos.split(" ")[0] + "' data-status='online' data-userid='" + count + "' href='#'>";
                    contenido += "        <img class='img-circle' src='../../Files/img/" + v.Sexo + ".jpg' alt=''>";
                    contenido += "        <span>" + nombreResumen + "</span>";
                    contenido += "        <i class='icon-circle user-status online'></i>";
                    contenido += "    </a>";
                    contenido += "</li>";
                    count++;
                    $("#listaUsuarios").append(contenido);
                });
            }
    );
}

var cantidadVentanasAbiertas = 0;
var ventanasAbiertas = new Array();
function abrirVentana(id, nombres, run, paso) {
    if (ventanasAbiertas[id] == undefined || paso) {
        var margin = (cantidadVentanasAbiertas * 230) + 250;
        var contenido = "<div id='v" + id + "' class='ui-widget ui-corner-top ui-chatbox' outline='0' style='right: 20px; margin-right: " + margin + "px;'>"
                + "<div class='ui-widget-header ui-corner-top ui-chatbox-titlebar ui-dialog-header' style='width: 200px;'>"
                + "<span><i class='icon-circle user-status offline'></i>" + nombres + "</span>"
                + "<a onclick='cerrarVentana(" + id + ")' class='ui-corner-all ui-chatbox-icon' role='button'>"
                + "<span class='icon-remove icon-chat'></span>"
                + "</a>"
                + "<a onclick='minimizarVentana(" + id + ")' class='ui-corner-all ui-chatbox-icon' role='button'>"
                + "<span class='icon-minus icon-chat'></span>"
                + "</a>"
                + "</div>"
                + "<div id='c" + id + "' class='ui-widget-content ui-chatbox-content online'>"
                + "<div id='m" + id + "' class='ui-widget-content ui-chatbox-log' style='width: 200px;'></div>"
                + "<div class='ui-widget-content ui-chatbox-input' style='max-width: 200px;'>"
                + "<form id='f" + id + "' action='' method='post' > "
                + "<textarea id='t" + id + "' onkeypress='enviarMensaje(" + id + "," + run + ")' class='ui-widget-content ui-chatbox-input-box ui-corner-all' style='width: 182px;'> </textarea>"
                + "</form>"
                + "</div>"
                + "</div>"
                + "</div>";
        $("body").append(contenido);
        cantidadVentanasAbiertas++;
        ventanasAbiertas[id] = [id, nombres, run, 0];
        obtenerMensajes(id, nombres, run);
    }
}

function enviarMensaje(id, runDestino) {
    $("#t" + id).keypress(function (e) {
        if (e.which == 13) {//ACCION AL PRESIONAR LA TECLA INTRO   
            var texto = document.getElementById("t" + id).value;
            if (texto.trim() != "" && texto.trim() != " ") {//VALIDAMOS QUE EXISTA TEXTO                
                document.getElementById("f" + id).reset();//RESETEAMOS LA CASILLA
                var contenido = "<div class='ui-chatbox-msg' style='display: block; max-width: 200px;'><b>Yo: </b><span>" + texto.trim() + "</span></div>";
                $("#m" + id).append(contenido);//AGREGAMOS EL TEXTO A LA VENTANA
                var nuevaPos = $("#m" + id).height() * 10;
                $("#m" + id).animate({
                    scrollTop: nuevaPos
                }, 1000);
                //SE ENVIA EL MENSAJE
                var url_json = '../Servlet/administrarMensaje.php?accion=AGREGAR&runPara=' + runDestino + "&texto=" + texto.trim();
                $.getJSON(
                        url_json,
                        function (datos) {
                            var datos = eval(datos);
                        }
                );
            }
        }
    });
}

function obtenerMensajes(id, nombres, runDestino) {
    var url_json = '../Servlet/administrarMensaje.php?accion=OBTIENE_MENSAJES_DE_CONTACTO_BY_RUN&runPara=' + runDestino;
    $.getJSON(
            url_json,
            function (datos) {
                $("#m" + id).empty();
                $.each(datos.mensajes, function (k, v) {
                    var contenido;
                    if (v.runDesde != runDestino) {
                        contenido = "<div class='ui-chatbox-msg' style='display: block; max-width: 200px;'><b>Yo: </b><span>" + v.mensaje + "</span></div>";
                    } else {
                        var nombre = v.nombreDesde.split(" ");
                        contenido = "<div class='ui-chatbox-msg' style='display: block; max-width: 200px;'><b>" + nombre[0] + ": </b><span>" + v.mensaje + "</span></div>";
                    }
                    $("#m" + id).append(contenido);
                });
                //array.indexOf(searchElement);
                //Cuando sea abra la ventana por primera vez automoticamente el scrrol baja al final                                   
                if (ventanasAbiertas[id] != undefined) {
                    if (datos.mensajes.length > ventanasAbiertas[id][3]) {
                        ventanasAbiertas[id][3] = datos.mensajes.length;
                        //POSICIONAR EL FINAL DEL SCRROL                        
                        var nuevaPos = $("#m" + id).height() * 10;
                        $("#m" + id).animate({
                            scrollTop: nuevaPos
                        }, 1000);
                    }
                }
            }
    );
}

function minimizarVentana(id) {
    if (document.getElementById("c" + id).style.display != 'none') {
        document.getElementById("c" + id).style.display = 'none';
    } else {
        document.getElementById("c" + id).style.display = 'Block';
    }
}

function cerrarVentana(id) {
    $("#v" + id).remove();
    cantidadVentanasAbiertas--;
    delete ventanasAbiertas[id];
    ajustarVentanas();
}

function ajustarVentanas() {
    $.each(ventanasAbiertas, function (k, v) {
        $("#v" + k).remove();
    });
    cantidadVentanasAbiertas = 0;
    $.each(ventanasAbiertas, function (k, v) {
        if (v != undefined)
            abrirVentana(v[0], v[1], v[2], true);
    });
}

function refrescarMensajes() {
    $.each(ventanasAbiertas, function (k, v) {
        if (v != undefined) {
            obtenerMensajes(v[0], v[1], v[2]);
        }
    });
}
setInterval(refrescarMensajes, 3000);

function obtenerNotificacionesMensajesNoLeidos() {
    var url_json = '../Servlet/administrarMensaje.php?accion=OBTENER_MENSAJES_NO_LEIDOS';
    $.getJSON(
            url_json,
            function (datos) {
                var indicador = "";
                if (datos.cantidad > 0) {
                    indicador = datos.cantidad;
                }
                $("#n-new-mensajes-sup").empty();
                $("#n-new-mensajes-sup").append(indicador);


                var contenido = "<li class='nav-messages-header'>";
                contenido += "           <a tabindex='-1' href='#'>Tiene <strong>" + datos.cantidad + "</strong> mensajes nuevos</a>";
                contenido += "        </li>    ";
                $("#descripcion-nuevos-mensajes").empty();
                $("#descripcion-nuevos-mensajes").append(contenido);
                $.each(datos.mensajes, function (k, v) {                    
                    var hora = v.hora.split(" ");
                    var nombres = v.nombreDesde.split(" ");
                    var apellidos = v.apellidosDesde.split(" ");
                    var mensaje = v.mensaje.substring(0, 40);
                    // onClick='abrirVentana(" + v.runDesde + ",\"" + nombres[0] + apellidos[0]+"\"," + v.runDesde + " ,false)'
                    contenido = "  <li class='nav-message-body' onclick=\"abrirNotificacion('"+v.runDesde+"','" + nombres[0] + " " + apellidos[0] + "')\">";
                    contenido += "            <a>";
                    contenido += "                <img src='../../Files/img/Femenino.jpg' alt='User'>";
                    contenido += "                <div>";
                    contenido += "                    <small class='pull-right'>" + hora[0] + "</small>";
                    contenido += "                    <strong>" + nombres[0] + " " + apellidos[0] + "</strong>";
                    contenido += "                </div>";
                    contenido += "                <div>";
                    contenido += "                    " + mensaje + "...";
                    contenido += "                </div>";
                    contenido += "            </a>";
                    contenido += "        </li> ";
                    $("#descripcion-nuevos-mensajes").append(contenido);

                });
            }
    );
}
setInterval(obtenerNotificacionesMensajesNoLeidos, 3000);

function abrirNotificacion(runContacto,nombre) {
    var id = contactos.indexOf(runContacto);        
    abrirVentana(id, nombre, runContacto, true);
}
