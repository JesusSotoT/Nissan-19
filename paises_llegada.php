<?php
session_start();
$notify = $_GET['complete'];

?>
<html lang="en">
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:29:18 GMT -->

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Nissan 2019 | Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/google-roboto-300-700.css" rel="stylesheet" />
    
</head>

<body>
    <?php 
    if ($notify == 1) {

  ?><div class="alert alert-success" id="alert-ex" role="alert">
  <strong>Confirmacion realizada con exito !</strong> se ha enviado una notificacion a todos los usuarios del sistema.
</div>

<?php } ?>
    <div class="wrapper">
        <div class="sidebar" data-active-color="red" data-background-color="black" data-image="assets/img/bar.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com/" class="simple-text">
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
                        <a href="participante.php">
                            <i class="material-icons">add</i>
                            <p>Agregar Participante</p>
                        </a>
                    </li>
                    <li class="">
                        <a href="Reporte de Registros.php">
                            <i class="material-icons">book</i>
                            <p>Reporte de Registros</p>
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
                            <i class="material-icons">flight_land</i>
                            <p>Registrar Llegada de Paises</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
        <div class="container-fluid">
            <div class="row">
               
                                <?php 
                         include "conexion.php";
                  $query =  "SELECT * FROM paises" ;
                  $result = $conn->query($query);

                while ($row = $result->fetch_array())
                  {
                  
             ?>
                <div class="col-md-4">
                                <div class="card card-pricing card-raised">
                                    <div class="content">
                                        <h6 class="category"><?php echo $row['pais'] ?></h6>
                                        <div class="icon icon-rose">
                                            <i class="material-icons"><img src="flags_contries/<?php echo $row['ruta_imagen'] ?>"></i>
                                        </div>
                                        <?php $llegada = $row['hora_llegada_aeropuerto'];
                                            if ($llegada == '0000-00-00 00:00:00') {
                                                    $hora_llegada_aeropuerto = 'Por llegar';
                                            }
                                            else{
                                                $hora_llegada_aeropuerto = $row['hora_llegada_aeropuerto'];
                                            }
                                         ?>
                                        <h3 class="card-title"><h6>Hora de llegada a aeropuerto</h6><strong><?php echo $hora_llegada_aeropuerto; ?></strong></h3>
                                        <p class="card-description">
                                             <i class="material-icons">flight_land</i>
                                        </p>
                                        <input  name="id_pais" value="<?php echo $row['id'] ?>" disabled hidden>
                                        <?php 
                                                $llegado =  $row['llegada'];
                                        if ($llegado == 1) { ?>
                                             <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>" disabled>Confirmado</button>
                                       <?php } 

                                        else{ ?>

                                        <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>">Confirmar Llegada</button>

                                    <?php } ?>

                                    </div>
                                </div>
                            </div>
<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar Llegada de <?php echo $row['pais'] ?></h5>
      </div>
      <div class="modal-body">
        <p>Esta por confirmar a todos los usuarios del sistema la llegada de <?php echo $row['pais'] ?> al aeropuerto, pulse <strong>CONFIRMAR</strong> cuando esto sea correcto(puede incluir comentarios en el siguiente espacio).</p>
        <form action="confirmar_llegada.php?id_pais=<?php echo $row['id'] ?>" method="POST">
            <input type="text" name="id_pais" value="<?php echo $row['id'] ?>"  hidden>
            <input type="text" name="pais" value="<?php echo $row['pais'] ?>"  hidden>
      <textarea cols="40" rows="10" name="comentarios_llegada"></textarea>
      <div class="modal-footer">
      <input type="submit" class="btn btn-success  btn-round pull-right" name="registro" />
      <a  class="btn btn-danger btn-round " data-dismiss="modal" >CANCELAR</a>
  </div>
      </form>

 </div>
    
    </div>
  </div>
</div>

    <?php
                }
                       ?>
                        
            </div>
        </div>
            </div>
             <footer class="footer">
                    <div class="container-fluid">
                        <p class="copyright pull-right">
                            &copy;
                            <script>
                            document.write(new Date().getFullYear())
                            </script>, Powered by
                            <a href="http://google.mx/" target="_blank">AG MEDIA , Develop by Jesus Soto Tovar</a>.
                        </p>
                    </div>
                </footer>
        </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<script src="assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="assets/js/jquery.select-bootstrap.js"></script>-->
<!-- Select Plugin -->
<script src="assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="assets/js/sweetalert2.js"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
 <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
<script >
$(document).ready(function() {

    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

    demo.initVectorMap();

    document.getElementById('alert-ex').style.display = 'block';
     setTimeout(hiddealert,3000);

});



 var table = $('#sin_asistencia').DataTable();
 
// #myInput is a <input type="text"> element
$('#myInput').on( 'keyup', function () {
    table.search( this.value ).draw();
} );

 var table2 = $('#con_asistencia').DataTable();
 
// #myInput is a <input type="text"> element
$('#myInput2').on( 'keyup', function () {
    table.search( this.value ).draw();
} );



</script>
<script>

function hiddealert(){
    document.getElementById('alert-ex').style.display = 'none';
}
</script>
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->

</html>