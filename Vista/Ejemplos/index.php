<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Universal Admin Dashboard theme | HOME</title>
        <meta name="description" content="Universal Admin Dashboard  theme! it can be used with any kinda website and portals for admin controls">
        <meta name="author" content="Majoo">
        <!-- end: Meta -->
        <link id="page_favicon" href="favicon.ico" rel="icon" type="image/x-icon" />
        <!-- start: CSS -->
        <link href="bootstrap/css/bootstrap-flat.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link  href="css/style.css" rel="stylesheet">

        <link  href="css/chat.css" rel="stylesheet">  
        <link href="css/chat.plugin.css" rel="stylesheet">
        <link  href="js/charts/jquery.easy-pie-chart.css" rel="stylesheet">  
        <link  href="lib/selectize/selectize.css" rel="stylesheet">  
        <link  href="css/component.css" rel="stylesheet"> 
        <link  href="css/style-responsive.css" rel="stylesheet">


        <script src="js/jquery.js"></script>
        <script src="lib/selectize/selectize.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <script src="js/charts/jquery.sparkline.min.js?v1.4.0"></script>
        <script src="js/charts/jquery.easy-pie-chart.js?v1.4.0"></script>
        <script src="js/charts/raphael.2.1.0.min.js?v1.4.0"></script>
        <script src="js/charts/justgage.1.0.1.min.js?v1.4.0"></script>

        <script src="lib/scroll-slim/jquery.slimscroll.min.js"></script>
        <script src="js/common.js"></script>

        <link href="lib/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="lib/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="lib/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#vmap').vectorMap({
                    map: 'world_en',
                    backgroundColor: '#ecf0f1',
                    color: '#ffffff',
                    selectedColor: '#666666',
                    enableZoom: true,
                    showTooltip: true,
                    values: sample_data,
                    scaleColors: ['#1abc9c', '#16a085'],
                    normalizeFunction: 'polynomial'
                });
            });
        </script>
        <script>
            $(function() {

                Charts.init()

            });
        </script>
    </head>
    <body >
        <!-- start: Header -->
        <div class="navbar  navbar-fixed-top">
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
                    <img src="img/logo_small.png" class="pull-left nav_logo" alt='universal admin logo'>
                    <a class="brand" href=""><span> Universal Admin</span></a>
                    <!-- start: Header Menu -->
                    <div class="nav-collapse collapse header-nav">
                        <ul class="nav nav-first">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="icon-star"></i>    Awesome Plugins
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a   href="map.html">
                                            Google Map
                                        </a>

                                    </li>	
                                    <li>
                                        <a   href="charts.html">
                                            Charts
                                        </a>

                                    </li>	
                                    <li>
                                        <a   href="floating-header.html">
                                            Floating Header
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="database.html">
                                            Data Tables
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="calendar.html">
                                            Calendar
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="file_manager.html">
                                            File Manager
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="file_manager.html">
                                            File Uploader
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="nestable.html">
                                            Nestable
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="xedit.html">
                                            X-editable
                                        </a>

                                    </li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class=" dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="icon-file"></i>    Form Components
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a   href="form_wizard.html">
                                            Form Wizard
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="forms.html">
                                            Forms
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="post_form.html">
                                            Blog Post Form
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="buttons.html">
                                            Buttons
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="sign-in.html">
                                            SignIn Form
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="sign-up.html">
                                            SignUp Form
                                        </a>

                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="icon-list-alt"></i>     Admin Pages
                                </a>
                                <ul class="dropdown-menu messages">
                                    <li>
                                        <a   href="blank.html">
                                            Blank Page
                                        </a>

                                    </li>	
                                    <li>
                                        <a   href="404.html">
                                            404 Page
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="invoices.html">
                                            Invoices
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="search.html">
                                            Search Page
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="miscellaneous.html">
                                            Miscellaneous
                                        </a>

                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="icon-dashboard"></i>   Dashboard Pages
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a   href="conversation.html">
                                            Conversation Page
                                        </a>

                                    </li>	
                                    <li>
                                        <a   href="users.html">
                                            Members Page
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="social-updates.html">
                                            Twitter Widgets
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="form_wizard.html">
                                            Account Settings
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="public_profile.html">
                                            Profile Page
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="gallery-grid.html">
                                            Gallery Grid
                                        </a>

                                    </li>
                                    <li>
                                        <a   href="gallery_plus.html">
                                            Gallery Plus
                                        </a>

                                    </li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="icon-envelope"></i>    Inbox
                                </a>
                                <ul class="dropdown-menu">
                                    <li >   <a  href="inbox2.html">
                                            <i class="icon-location-arrow"></i> Inbox 2.0
                                        </a>
                                    </li>
                                    <li >
                                        <a  href="inbox.html">
                                            <i class="icon-envelope"></i>  Classic  Inbox
                                        </a>

                                    </li>

                                </ul>  </ul>
                        <ul class="nav  pull-right">
                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="badge">13</span>
                                    <i class="icon-tasks"></i>
                                </a>


                                <ul class="dropdown-menu">

                                    <li >
                                        <a tabindex="-1" href="#">You have <strong>13</strong> tasks in progress</a>
                                    </li>


                                    <li>
                                        <a>
                                            <strong>Prepare Report</strong><span class="pull-right">30%</span>
                                            <div class="progress progress-danger active">
                                                <div class="bar" style="width: 30%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Make new update</strong><span class="pull-right">40%</span>
                                            <div class="progress progress-info active">
                                                <div class="bar" style="width: 40%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Fix critical bugs</strong><span class="pull-right">80%</span>
                                            <div class="progress progress-striped active">
                                                <div class="bar" style="width: 80%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Complete project</strong><span class="pull-right">5%</span>
                                            <div class="progress progress-success active">
                                                <div class="bar" style="width: 5%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <strong>Others</strong><span class="pull-right">15%</span>
                                            <div class="progress progress-warning active">
                                                <div class="bar" style="width: 15%;"></div>
                                            </div>
                                        </a>
                                    </li>


                                    <li class="nav-taks-footer">
                                        <a tabindex="-1" href="#">View all tasks
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
                                        <a tabindex="-1" href="#">You have <strong>8</strong> new messages</a>
                                    </li>


                                    <li class="nav-message-body">
                                        <a>
                                            <img src="img/content/shaan.png" alt="User">
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
                                            <img src="img/content/half.png" alt="User">
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
                                            <img src="img/content/smile.png" alt="User">
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
                                            <img src="img/content/shaan.png" alt="User">
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
                                        <a tabindex="-1" href="inbox2.html">View all messages
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
                                        <a href="#"> <span >You have 11 notifications</span></a>
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
                                        <a class="dropdown-menu-sub-footer">View all notifications</a>
                                    </li>	
                                </ul>
                            </li>
                            <!-- start: Message Dropdown -->
                            <li class="divider-vertical"></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <img  width="27" height="27"  class="img-circle" src="img/shaan.png" alt='amdin user'>     Hello Shawn
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="public_profile.html"><i class="icon-user icon-white"></i> Profile</a></li>
                                    <li><a href="login.html"><i class="icon-off icon-white"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    <!-- end: Header Menu -->

                </div>
            </div>
        </div>
        <!-- start: Header -->
        <div class="wrap">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="alert alert-block alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        Content precedes design. Design in the absence of content is not design, it's decoration.
                        Jeffrey Zeldman
                    </div>

                </div>
                </div>

                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span1">

                            <!-- start: Main Menu -->
                            <div id="sidebar-nav">
                                <ul id="dashboard-menu">
                                    <li class="active">
                                        <div class="pointer">
                                            <div class="arrow"></div>
                                            <div class="arrow_border"></div>
                                        </div>
                                        <a href="index.html">
                                            <i class="icon-home"></i>
                                            <span>Home</span>
                                        </a>
                                    </li>            
                                    <li>
                                        <a href="charts.html">
                                            <i class="icon-signal"></i>
                                            <span>Charts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-toggle" href="#">
                                            <i class="icon-group"></i>
                                            <span>Users</span>

                                        </a>
                                        <ul class="submenu">
                                            <li><a href="users.html"><i class="icon-list icon-2x"></i> User list</a></li>
                                            <li><a href="profile_edit.html"><i class="icon-cog"></i> Settings</a></li>
                                            <li><a href="public_profile.html"><i class="icon-star"></i> User profile</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="dropdown-toggle" href="#">
                                            <i class="icon-edit"></i>
                                            <span>Forms</span>

                                        </a>
                                        <ul class="submenu">
                                            <li><a href="forms.html"><i class="icon-edit-sign"></i> Form</a></li>
                                            <li><a href="form_wizard.html"><i class="icon-arrow-right"></i> Wizard</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="gallery-grid.html">
                                            <i class="icon-picture"></i>
                                            <span>Gallery</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="calendar.html">
                                            <i class="icon-calendar-empty"></i>
                                            <span>Calendar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="database.html">
                                            <i class="icon-th-large"></i>
                                            <span>Tables</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <!-- end: Main Menu -->



                        <!-- start: Content -->
                        <div id="content" class="span9" >


                            <div class="row-fluid">

                                <div class="span2">
                                    <a href="#" class="btn btn-circle btn-res"><i class="icon-envelope-alt"></i>Inbox</a>
                                </div> <div class="span2">
                                    <a href="#" class="btn btn-primary btn-circle btn-res active"><i class="icon-lightbulb"></i>Projects</a>
                                </div> <div class="span2">
                                    <a href="#" class="btn btn-success btn-circle btn-res"><i class="icon-check"></i>Tasks</a>
                                </div> <div class="span2">
                                    <a href="#" class="btn btn-info btn-circle btn-res active"><i class="icon-time"></i>Timeline</a>
                                </div> <div class="span2">
                                    <a href="#" class="btn btn-inverse btn-circle btn-res"><i class="icon-bar-chart"></i>Stats</a>
                                </div> <div class="span2">
                                    <a href="#" class="btn btn-warning btn-circle btn-res"><i class="icon-calendar-empty"></i>Calendar</a>
                                </div> 

                            </div> 

                            <hr>
                            <div class="row-fluid">
                                <div class="span12 ">
                                    <div class="social-box  social-blue">
                                        <div class="header">
                                            <h4>Vector Map</h4>
                                            <div class="tools">
                                                <i class="icon-location-arrow icon-2x"></i>
                                            </div>
                                        </div>

                                        <div id="vmap" style="width: 100%; height: 400px;"></div>

                                    </div>
                                </div> </div>


                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="social-box social-bordered social-orange">
                                        <div class="header">
                                            <h4>Sparklines</h4>
                                        </div>
                                        <div class="body">
                                            <p>Composite bar <span id="compositebar">4,6,7,7,4,3,2,1,4</span>
                                            </p>
                                            <p>
                                                Customize size and colours
                                                <span id="linecustom">10,8,9,3,5,8,5,7</span>
                                            </p>
                                            <p>
                                                Tristate charts
                                                <span class="sparktristate">1,1,0,1,-1,-1,1,-1,0,0,1,1</span><br/>
                                            </p>

                                            <p>
                                                Default size and colours
                                                <span id="linecustom1">10,8,9,3,5,8,5,7</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="social-box social-bordered social-green">
                                        <div class="header">
                                            <h4>Pie Charts</h4>
                                            <div class="tools">
                                                <a class="btn btn-inverse updatePieCharts" data-toggle="tooltip" title="Update pie Charts"><i class="icon-refresh"></i></a>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="row-fluid">
                                                <div class="chart span4">
                                                    <div class="percentage" data-percent="55"><span>55</span>%</div>
                                                    <div class="label">New visitors</div>
                                                </div>
                                                <div class="chart span4">
                                                    <div class="percentage" data-percent="21"><span>21</span>%</div>
                                                    <div class="label">Bounce rate</div>
                                                </div>
                                                <div class="chart span4">
                                                    <div class="percentage" data-percent="21"><span>21</span>%</div>
                                                    <div class="label">Bounce rate</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>     

                            <div class="row-fluid">


                                <div class="span12">
                                    <div class="social-box social-bordered social-blue">
                                        <div class="header">
                                            <h4>justGage Charts</h4>
                                        </div>
                                        <div class="body" style="text-align: center;">
                                            <div class="row-fluid">
                                                <div class="span7">
                                                    <div id="g1"></div>
                                                </div>
                                                <div class="span5">
                                                    <div id="g2"></div>
                                                    <div id="g3"></div>
                                                    <div id="g4"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                  

                            </div> 
                            <div class="row-fluid">
                                <div class="span12 ">
                                    <div class="grid">
                                        <div class="grid-title5">
                                            <div class="pull-left">
                                                <div class="icon-title"><i class="icon-bar-chart"></i></div>
                                                <span>Theme features</span> 
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="pull-right"> 
                                               
                                                <div class="icon-title"><a href="gallery_plus.html"><i class="icon-eye-open"></i> Click Here for Gallery</a></div>
                                            </div>
                                            <div class="clearfix"></div>   
                                        </div>

                                        <ul class="grid1 cs-style-4">
                                            <li>
                                                <figure>
                                                    <div><img src="img/content/4.png" alt="img04"></div>
                                                    <figcaption>
                                                        <h3>Profile</h3>
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
                                                    <div><img src="img/content/6.png" alt="img06"></div>
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
                                                    <div><img src="img/content/3.png" alt="img02"></div>
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
                                                    <div><img src="img/content/5.png" alt="img05"></div>
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
                                        </ul>
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
                                                        <img class="img-circle" src="img/shaan.png" alt="">
                                                        <span>shawn kan</span>
                                                        <i class="icon-circle user-status online"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="2" href="#">
                                                        <img class="img-circle" src="img/shaan.png" alt="">
                                                        <span>majoo bla</span>
                                                        <i class="icon-circle user-status offline"></i>
                                                    </a>
                                                </li>



                                                <li>
                                                    <a data-firstname="Tobei" data-lastname="Tsumura" data-status="online" data-userid="3" href="#">
                                                        <img class="img-circle" src="img/content/half.png" alt="">
                                                        <span>lol man</span>
                                                        <i class="icon-circle user-status online"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-firstname="John" data-lastname="Doe" data-status="offline" data-userid="4" href="#">
                                                        <img class="img-circle" src="img/shaan.png" alt="">
                                                        <span>John Doe</span>
                                                        <i class="icon-circle user-status offline"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="5" href="#">
                                                        <img class="img-circle" src="img/content/half.png" alt="">
                                                        <span>majoo bla</span>
                                                        <i class="icon-circle user-status offline"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="6" href="#">
                                                        <img class="img-circle" src="img/shaan.png" alt="">
                                                        <span>majoo bla</span>
                                                        <i class="icon-circle user-status offline"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="7" href="#">
                                                        <img class="img-circle" src="img/content/shaan.png" alt="">
                                                        <span>majoo bla</span>
                                                        <i class="icon-circle user-status offline"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="8" href="#">
                                                        <img class="img-circle" src="img/content/half.png" alt="">
                                                        <span>majoo bla</span>
                                                        <i class="icon-circle user-status offline"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-firstname="Yadra" data-lastname="Abels" data-status="offline" data-userid="9" href="#">
                                                        <img class="img-circle" src="img/content/smile.png" alt="">
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
                            <span class="pull-left">© <a href="" target="_blank">uExel</a> 2013</span>
                            <span class="hidden-phone pull-right">Powered by: <a href="#">uAdmin Dashboard</a></span>
                        </p>
                        <p class="text-center">
                            <a class="btn btn-mini btn-circle btn-facebook " href="#"><i class="icon-facebook"></i></a>
                            <a class="btn btn-mini btn-circle btn-gplus " href="#"><i class="icon-google-plus"></i></a>
                            <a class="btn btn-mini btn-circle btn-twitter " href="#"><i class="icon-twitter"></i></a>

                        </p>

                    </footer>
                </div>
            </div>
            <script src="js/modernizr.custom.js"></script>
            <script src="js/toucheffects.js"></script>
            <!-- Chat Magic Happens here-->
            <script src="js/chat/jquery-ui-1.10.1.custom.min.js"></script>
            <script src="js/chat/jquery.slimscroll.min.js"></script>
            <script src="js/chat/jquery.simplecolorpicker.js"></script>
            <script src="js/chat/uipro.min.js"></script>
            <script src="js/chat/jquery.ui.chatbox.js"></script>
            <script src="js/chat/chatboxManager.js"></script>
            <script src="js/chat/jquery.livefilter.js"></script>
            <script src="js/chat/app.js"></script>
            <script src="js/chat/demo-settings.js"></script><!--
            --><script src="js/chat/sidebar.js"></script>
            <script src="js/custom.js"></script>

            <script>
            /*<![CDATA[*/
            $(function() {
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
                $(function() {
                    $(".chat-messages-list .content").slimScroll({start: "bottom", railVisible: true, alwaysVisible: true, height: '400px'});
                    $("#users-list .content").slimScroll({"height": '460px'});
                });
            </script>
            <!-- Chat ends here-->
    </body>

</html>
