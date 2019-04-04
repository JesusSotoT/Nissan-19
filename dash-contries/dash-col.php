<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:29:18 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Nissan 2019 - DashBoard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/google-roboto-300-700.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="red" data-background-color="black" data-image="assets/img/bar.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="" class="simple-text">
Nissan 2019 - LogSystem
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="#" class="simple-text">
                    Nissan
                </a>
            </div>
             <div class="sidebar-wrapper">
                <div class="user">
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">

                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="logout.php">Cerrar Sesion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="home2admin.php">
                            <i class="material-icons">dashboard</i>
                            <p>Inicio</p>
                        </a>
                    </li>
                     <li class="">
                        <a href="timeline_regist.php">
                            <i class="material-icons">alarm</i>
                            <p>Horarios de Llegada</p>
                        </a>
                    </li>
                    <li class="">
                        <a href="paises_llegada.php">
                            <i class="material-icons">alarm</i>
                            <p>Registrar Llegada de Pais</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
           <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <p class="navbar-brand" href="#"> Inicio </p>
                    </div>
                </div>
            </nav>
            <div class="content">

                <div class="row">
                    <div class="col-md-4 ml-auto mr-auto">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="orange" data-header-animation="true">
                                <i class="material-icons">pageview</i>
                            </div>
                            <div class="card-content">
                                <?php
                                    include "../conexion.php";
                  $query =  "SELECT clave FROM tagm_participante where pais = 3" ;
                  $result = $conn->query($query);
                  $row_cnt = $result->num_rows;
                                ?>
                                <p class="category">Total de Participantes</p>
                                <h3 class="card-title"><?php echo $row_cnt ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="">Ver Mas...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ml-auto mr-auto">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="red" data-header-animation="true">
                                <i class="material-icons">settings</i>
                            </div>
                            <div class="card-content">
                                                                <?php
                                    include "../conexion.php";
                  $query =  "SELECT asistencia FROM tagm_participante WHERE asistencia = 1 and pais = 3" ;
                  $result = $conn->query($query);
                  $row_cnt = $result->num_rows;
                                ?>
                                <p class="category">Participantes Registrados en Hotel</p>
                                <h3 class="card-title"><?php echo $row_cnt ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="#pablo">Ver Mas...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 ml-auto mr-auto">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green" data-header-animation="true">
                                <i class="material-icons">done_outline</i>
                            </div>
                            <div class="card-content">
                                    <?php
                                    include "../conexion.php";
                  $query =  "SELECT asistencia FROM tagm_participante WHERE asistencia = 0 and pais = 3" ;
                  $result = $conn->query($query);
                  $row_cnt = $result->num_rows;
                                ?>
                                <p class="category">Participantes Faltantes</p>
                                <h3 class="card-title"><?php echo $row_cnt ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <a href="#pablo">Ver Mas...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 <div class="row">
                       <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="red">
                                    <i class="material-icons">receipt</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Participantes<span><h6>(por registrar en hotel)</h6></span>.</h4>
                                    <div class="table-responsive">
                                        <!--<input class="input-group" type="text" id="myInput"> -->
                                        <table class="table" id="sin_asistencia">
                                            <thead class="title" style="font-size: 12px;">
                                                <th class="text-center">Clave</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Apellido Paterno</th>
                                                <th class="text-center">Edad</th>
                                                <th class="text-center">Habitacion Hotel</th>
                                                <th class="text-center">Asistencia</th>
                                                <th class="text-center">Acompañante</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                include "../conexion.php";
                  $query =  "SELECT a.clave , a.nombre , a.apellido_p , a.apellido_m, a.fecha_nacimiento , a.habitacion_hotel,a.asistencia, d.nombre as nombre_acompanante , d.apellido_p as acom_ape FROM tagm_participante a left join tagm_acompanante d on d.clave_p = a.clave WHERE asistencia = 0 and pais = 3" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
<tr>
<td class="text-center"><?php echo '<a href="../registro_participante.php?id='.$row['clave'].'" title="Ver Solicitud" class="btn btn-info">'.$row["clave"].'</a>'; ?></td>    
<td class="text-center"><?php echo $row['nombre'] ?></td> 
<td class="text-center"><?php echo $row['apellido_p'] ?></td> 
<td class="text-center"><?php $fecha1 = $row['fecha_nacimiento'];
$fecha = str_replace("/","-",$fecha1);
    $fecha = date('Y/m/d',strtotime($fecha));
    $hoy = date('Y/m/d');
    $edad = $hoy - $fecha; 
    echo $edad; ?></td> 
<td class="text-center"><?php echo $row['habitacion_hotel'] ?></td>  
<td class="text-center"><?php echo $row['asistencia'] ?></td> 
<td class="text-center"><?php echo $row['nombre_acompanante']?> <?php echo $row['acom_ape']; ?></td>    
</tr>
            <?php
                }
                ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>

            </div>
 <div class="row">
                       <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="red">
                                    <i class="material-icons">receipt</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Participantes<span><h6>(por registrar en hotel)</h6></span>.</h4>
                                    <div class="table-responsive">
                                        <!--<input class="input-group" type="text" id="myInput"> -->
                                        <table class="table" id="sin_asistencia">
                                            <thead class="title" style="font-size: 12px;">
                                                <th class="text-center">Clave</th>
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Apellido Paterno</th>
                                                <th class="text-center">Edad</th>
                                                <th class="text-center">Habitacion Hotel</th>
                                                <th class="text-center">Asistencia</th>
                                                <th class="text-center">Acompañante</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                include "../conexion.php";
                  $query =  "SELECT a.clave , a.nombre , a.apellido_p , a.apellido_m, a.fecha_nacimiento , a.habitacion_hotel,a.asistencia, d.nombre as nombre_acompanante , d.apellido_p as acom_ape FROM tagm_participante a left join tagm_acompanante d on d.clave_p = a.clave WHERE asistencia = 1 and pais = 3" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
<tr>
<td class="text-center"><?php echo '<a href="../registro_participante.php?id='.$row['clave'].'" title="Ver Solicitud" class="btn btn-info">'.$row["clave"].'</a>'; ?></td>    
<td class="text-center"><?php echo $row['nombre'] ?></td> 
<td class="text-center"><?php echo $row['apellido_p'] ?></td> 
<td class="text-center"><?php $fecha1 = $row['fecha_nacimiento'];
$fecha = str_replace("/","-",$fecha1);
    $fecha = date('Y/m/d',strtotime($fecha));
    $hoy = date('Y/m/d');
    $edad = $hoy - $fecha; 
    echo $edad; ?></td> 
<td class="text-center"><?php echo $row['habitacion_hotel'] ?></td>  
<td class="text-center"><?php echo $row['asistencia'] ?></td> 
<td class="text-center"><?php echo $row['nombre_acompanante']?> <?php echo $row['acom_ape']; ?></td>    
</tr>
            <?php
                }
                ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>

            </div>


                </div>
            </div>
            <footer class="footer">
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="../assets/js/jquery.select-bootstrap.js"></script>-->
<!-- Select Plugin -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->
</html>