<?php //session_start();
$nombre = $_SESSION["nombre"];
$sexo = $_SESSION["sexo"];
?>
<!-- start: Header -->
<div class="navbar  navbar-fixed-top" >
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a><!-- /nav-collapse -->  
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="../../Files/img/logo.png" class="pull-left nav_logo" alt='universal admin logo'>
            <a class="brand" href=""><span> Sala Cuna Hogar de Cristo</span></a>
            <!-- start: Header Menu -->
            <div class="nav-collapse collapse header-nav">
                <ul class="nav  pull-right">                                        
                    <!-- NOTIFICACION MENSAJES-->
                    <li class="dropdown nav-messages">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="badge" id="n-new-mensajes-sup"></span>
                            <i class="icon-envelope"></i>
                        </a>
                        <ul class="dropdown-menu" id="descripcion-nuevos-mensajes">
                            <li class="nav-messages-header">
                                <a tabindex="-1" href="#">No tienes mensajes nuevos</a>
                            </li>                          
                        </ul>
                    </li>                    
                    <!-- start: Message Dropdown -->
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <img  width="27" height="27"  class="img-circle" src="../../Files/img/<?php echo $sexo;?>.jpg" alt='amdin user'>&nbsp;<?php echo $nombre;?>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a href="editarMiPefilTrabajadores.php"><i class="icon-user icon-white"></i> Mi Perfil</a></li>
                            <li><a href="../Servlet/loginOFF.php"><i class="icon-off icon-white"></i> Salir</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- end: Header Menu -->

        </div>
    </div>
</div>