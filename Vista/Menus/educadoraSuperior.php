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
                        <ul class="nav nav-first" >
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="icon-star"></i>    Menores
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a   href="/Vista/map.html">
                                            Agregar menores
                                        </a>

                                    </li>	
                                    <li>
                                        <a   href="/Vista/charts.html">
                                            Ver Menores
                                        </a>

                                    </li>	
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="icon-list-alt"></i>     Apoderados
                                </a>
                                <ul class="dropdown-menu messages">
                                    <li>
                                        <a   href="/Vista/blank.html">
                                            Agregar apoderados
                                        </a>

                                    </li>	
                                    <li>
                                        <a   href="/Vista/404.html">
                                            Ver apoderado
                                        </a>

                                    </li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class=" dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="icon-file"></i>    Avisos
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a   href="/Vista/form_wizard.html">
                                            Ver avisos
                                        </a>

                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <ul class="nav  pull-right">
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="badge">13</span>
                                    <i class="icon-tasks"></i>
                                </a>


                                <ul class="dropdown-menu">

                                    <li >
                                        <a tabindex="-1" href="#">Se estan subiendo <strong>13</strong> Fotografias </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Foto 1</strong><span class="pull-right">30%</span>
                                            <div class="progress progress-danger active">
                                                <div class="bar" style="width: 30%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Foto 2</strong><span class="pull-right">40%</span>
                                            <div class="progress progress-info active">
                                                <div class="bar" style="width: 40%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Foto 3</strong><span class="pull-right">80%</span>
                                            <div class="progress progress-striped active">
                                                <div class="bar" style="width: 80%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Foto 4</strong><span class="pull-right">5%</span>
                                            <div class="progress progress-success active">
                                                <div class="bar" style="width: 5%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Foto 5</strong><span class="pull-right">15%</span>
                                            <div class="progress progress-warning active">
                                                <div class="bar" style="width: 15%;"></div>
                                            </div>
                                        </a>
                                    </li>


                                    <li class="nav-taks-footer">
                                        <a tabindex="-1" href="#">Ver todo
                                        </a>
                                    </li>

                                </ul>

                            </li>
                            <li class="divider-vertical"></li>
                            <li class="dropdown nav-messages">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="badge">8</span>
                                    <i class="icon-envelope"></i>
                                </a>


                                <ul class="dropdown-menu">

                                    <li class="nav-messages-header">
                                        <a tabindex="-1" href="#">Tiene <strong>8</strong> mensajes nuevos</a>
                                    </li>


                                    <li class="nav-message-body">
                                        <a>
                                            <img src="../../Files/img/content/shaan.png" alt="User">
                                            <div>
                                                <small class="pull-right">Just Now</small>
                                                <strong>majoo bla</strong>
                                            </div>
                                            <div>
                                                Lorem ipsum dolor sit amet, consectetur...
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-message-body">
                                        <a>
                                            <img src="../../Files/img/content/half.png" alt="User">
                                            <div>
                                                <small class="pull-right">Just Now</small>
                                                <strong>shawn kan</strong>
                                            </div>
                                            <div>
                                                Lorem ipsum dolor sit amet, consectetur...
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-message-body">
                                        <a>
                                            <img src="../../Files/img/content/smile.png" alt="User">
                                            <div>
                                                <small class="pull-right">Just Now</small>
                                                <strong>John Doe</strong>
                                            </div>
                                            <div>
                                                Lorem ipsum dolor sit amet, consectetur...
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-message-body">
                                        <a>
                                            <img src="../../Files/img/content/shaan.png" alt="User">
                                            <div>
                                                <small class="pull-right">Just Now</small>
                                                <strong>lol man</strong>
                                            </div>
                                            <div>
                                                Lorem ipsum dolor sit amet, consectetur...
                                            </div>
                                        </a>
                                    </li>


                                    <li class="nav-messages-footer">
                                        <a tabindex="-1" href="/Vista/inbox2.html">Ver todos los mensajes
                                        </a>
                                    </li>

                                </ul>

                            </li>
                            <li class="divider-vertical"></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <span class="badge">9</span>
                                    <i class="icon-bell icon-white warning-sign"></i>
                                </a>
                                <ul class="dropdown-menu notifications">
                                    <li>
                                        <a href="#"> <span >Tiene 11 notificaciones</span></a>
                                    </li>	
                                    <li>
                                        <a href="#">
                                            + <i class="icon-user icon-white icon-2x"></i> <span class="message">New user registration</span> <span class="time">1 min</span> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            + <i class="icon-user icon-white icon-2x"></i> <span class="message">New comment</span> <span class="time">7 min</span> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            + <i class="icon-user icon-white icon-2x"></i> <span class="message">New comment</span> <span class="time">8 min</span> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            + <i class="icon-user icon-white icon-2x"></i> <span class="message">New comment</span> <span class="time">16 min</span> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            + <i class="icon-user icon-white icon-2x"></i> <span class="message">New user registration</span> <span class="time">36 min</span> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            + <i class="icon-user icon-white icon-2x"></i> <span class="message">2 items sold</span> <span class="time">1 hour</span> 
                                        </a>
                                    </li>
                                    <li class="warning">
                                        <a href="#">
                                            - <i class="icon-user icon-white icon-2x"></i> <span class="message">User deleted account</span> <span class="time">2 hour</span> 
                                        </a>
                                    </li>
                                    <li class="warning">
                                        <a href="#">
                                            - <i class="icon-user icon-white icon-2x"></i> <span class="message">Transaction was canceled</span> <span class="time">6 hour</span> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            + <i class="icon-user icon-white icon-2x"></i> <span class="message">New comment</span> <span class="time">yesterday</span> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            + <i class="icon-user icon-white icon-2x"></i> <span class="message">New user registration</span> <span class="time">yesterday</span> 
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-menu-sub-footer">Ver todas las notificaciones</a>
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
                                    <li><a href="/Vista/login.html"><i class="icon-off icon-white"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    <!-- end: Header Menu -->

                </div>
            </div>
        </div>