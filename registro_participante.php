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
  <strong>Check - in realizado con exito !</strong>.
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
               
            </div>
        </div>
        <div class="main-panel">
             <?php    include "conexion.php";
$id = intval($_GET['id']);
$sql = mysqli_query($conn, "SELECT a.clave AS 'id_participante', a.nombre AS 'nombre_participante', a.apellido_p as 'apellidoP_participante' , a.apellido_m AS 'apellidoM_participante' , a.pais AS 'id_pais' , c.pais as 'nombre_pais' , a.ruta_foto1, a.ruta_foto2 , a.sexo as 'sexo_participante' , a.fecha_nacimiento as 'fecha_nacimiento_participante' , a.alergias as 'alergias_participante' , a.enf_medi AS 'enf_participante' , a.asistencia , a.habitacion_hotel , a.hora_registro  , c.ruta_imagen    FROM tagm_participante a 
LEFT JOIN paises c on a.pais = c.id
WHERE a.clave = '$id'");
       if(mysqli_num_rows($sql) == 0){
                header("Location: home2admin.php");
     }else{
                $row = mysqli_fetch_assoc($sql);
     }
                $id_participante =  $_GET['id']; ?>
                <div class="container-fluid">
                   <div class="col-md-12">
                            <div class="card">
                                <form method="POST" action="check-in-function.php?id_participante=<?php echo $id_participante; ?>&pais=<?php echo $row['id_pais']; ?>" class="form-horizontal" enctype="multipart/form-data">
                        <div class="card-header card-header-text" data-background-color="red">
                            <h4 class="card-title">Registro de Participante: <?php echo $row['id_participante']. " de " . $row['nombre_pais']?> </h4>
                                    </div>
                                    <div class="card-content">
                                   <div class="row">
                                    <div class="col-md-6">
                                                <div class="col-md-3 col-sm-4">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle">
                                                    <img src="<?php $foto1 = $row['ruta_foto1'];
                                                    if($foto1 == ''){
                                                            echo "flags_contries/".$row['ruta_imagen'];
                                                    }else{
                                                        echo $row['ruta_foto1'];
                                                    } ?>" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                                <div class="col-md-3 col-sm-4">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle">
                                                    <img src="<?php $foto2 = $row['ruta_foto2'];
                                                    if($foto2 == ''){
                                                            echo "flags_contries/".$row['ruta_imagen'];
                                                    }else{
                                                        echo $row['ruta_foto2'];
                                                    } ?>" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                <div>
                                                    <span class="btn btn-round  btn-file">
                                                        <span class="fileinput-new">Add Photo</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="img_2" />
                                                    </span>
                                                    <br />
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                                    </div>
                                                     <div class="col-sm-1"></div>
                                                       <div class="col-md-4">
                                                        <label class="control-label">Sexo:</label>
                                                        <div class="form-group label-floating is-empty">
                                                    <select class="selectpicker" data-style="select-with-transition" name="sexo_participante" multiple  data-size="7"><?php $sexo = $row['sexo_participante'];
                                                            if ($sexo == 0) { ?>
                                                            <option value="<?php echo $sexo ; ?>" selected>MASCULINO</option>
                                                 <?php } else{?>
                                                         <option value="<?php echo $sexo ; ?>" selected>FEMENINO</option>
                                                    <?php } ?>
                                                    </select>
                                                    </div>
                                                </div>
                                                    </div>
                                            <div class="col-sm-12"> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="control-label">Nombre:</label>
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label"></label>
                                                            <input type="text" name="nombre_participante" class="form-control" value="<?php echo $row['nombre_participante'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                         <label class="control-label">Apellido Paterno:</label>
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label"></label>
                                                            <input type="text" name="apellidoP_participante" class="form-control" value="<?php echo $row['apellidoP_participante'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                         <label class="control-label">Apellido Materno:</label>
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label"></label>
                                                            <input type="text" name="apellidoM_participante" class="form-control" value="<?php echo $row['apellidoM_participante'] ?>">
                                                        </div>
                                                    </div>
                                                       <div class="col-md-3">
                                                         <label class="control-label">Fecha de Nacimiento:</label>
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label"></label>
                                                            <input type="text" name="fecha_nacimiento_participante" class="form-control datepicker" value="<?php echo $row['fecha_nacimiento_participante'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-sm-10"> 
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <label class="control-label">Edad:</label>
                                                        <div class="form-group label-floating is-empty">
                                                            <input type="text" name="edad_participante" class="form-control" value="<?php 
                                                            $fecha1 = $row['fecha_nacimiento_participante'];
                                                            $fecha = str_replace("/","-",$fecha1);
                                                            $fecha = date('Y/m/d',strtotime($fecha));
                                                            $hoy = date('Y/m/d');
                                                            $edad = $hoy - $fecha;
                                                             echo $edad; ?>">
                                                        </div>
                                                    </div>
                                              
                                        
                                            </div>
                                            <div class="row">
                                            <div class="col-sm-12"> 
                                               
                                             <div class="col-sm-3">
                                                    <label class="control-label" >Alergias:</label>
                                                    <textarea cols="30" name="alergias_participante" rows="5"><?php echo $row['alergias_participante'] ?></textarea>
                                                    
                                                    
                                                    </div>
                                                    <div class="col-sm-3">
                                                         <label class="control-label" >Enfermedades / Medicamentos:</label>
                                                    <textarea cols="30" name="enf_participante" rows="5"><?php echo $row['enf_participante'] ?></textarea>
                                                    </select>
                                                    
                                                    </div>
                                                
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="col-sm-12"> 
                                                <div class="row">
                                                    <div class="col-sm-10"></div>
                                                     <div class="col-sm-2">
                                                         <label class="" ><strong>Habitacion:</strong></label>
                                                    <input type="text" name="habitacion_hotel" class="form-control" value="<?php echo $row['habitacion_hotel'] ?>" Required>
                                                    </select>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        
                                    </div>
<!--///////////////////////////////// PARTICIPANTE ENDS ////////////////////////////////////////-->
             <?php    include "conexion.php";

$sql = mysqli_query($conn, "SELECT a.nombre , a.apellido_p , a.apellido_m , a.sexo , a.talla AS 'id_talla' , d.talla as 'nombre_talla' , a.tipo_sangre AS 'id_tipo_sangre' , e.tipo_sangre AS 'nombre_tipo_sangre' , a.alergias , a.enf_medi  FROM tagm_acompanante a 
LEFT JOIN tagm_tallas d on a.talla = d.id
LEFT JOIN tagm_tipos_sangre e on a.tipo_sangre = e.id
WHERE a.clave_p = '$id'");
       if(mysqli_num_rows($sql) == 0){
                header("Location: home2admin.php");
     }else{
                $row2 = mysqli_fetch_assoc($sql);
     }?>

     <h4>Acompañante:</h4>
                                    <div class="card-content">
                                   <div class="row">
                                            <div class="col-sm-12"> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="control-label">Nombre:</label>
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label"></label>
                                                            <input type="text" name="nombre_acomp" class="form-control" value="<?php echo $row2['nombre'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                         <label class="control-label">Apellido Paterno:</label>
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label"></label>
                                                            <input type="text" name="apellidoP_acomp" class="form-control" value="<?php echo $row2['apellido_p'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                         <label class="control-label">Apellido Materno:</label>
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label"></label>
                                                            <input type="text" name="apellidoM_acomp" class="form-control" value="<?php echo $row2['apellido_m'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-sm-10"> 
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="control-label">Sexo:</label>
                                                        <div class="form-group label-floating is-empty">
                                                    <select class="selectpicker" data-style="select-with-transition" name="sexo_acomp" multiple  data-size="7"><?php $sexo = $row2['sexo'];
                                                            if ($sexo == 0) { ?>
                                                            <option value="<?php echo $sexo ; ?>" selected>MASCULINO</option>
                                                 <?php } else{?>
                                                         <option value="<?php echo $sexo ; ?>" selected>FEMENINO</option>
                                                    <?php } ?>
                                                    </select>
                                                    </div>
                                                </div>
                                                      <div class="col-md-2">
                                                         <label class="control-label" style="margin-top: 10px;">Talla:</label>
                                                        
                                                           <select class="selectpicker" data-style="select-with-transition" name="talla_acomp" multiple  data-size="7">
                                    <option value="<?php echo$row2['id_talla'] ?>" selected><?php echo $row2['nombre_talla'] ?></option>
                                                    </select>
                                                    
                                                    </div>
                                                     <div class="col-md-2">
                                                         <label class="control-label" style="margin-top: 10px;">Tipo de Sangre:</label>
                                                        
                                                           <select class="selectpicker" data-style="select-with-transition" name="tipo_sangre_acomp" multiple  data-size="7">
                                    <option value="<?php echo$row2['id_tipo_sangre'] ?>" selected><?php echo $row2['nombre_tipo_sangre'] ?></option>
                                                    </select>
                                                    
                                                    </div>

                                                     <div class="col-sm-3">
                                                         <label class="control-label" >Alergias:</label>
                                                    <textarea cols="30" name="alergias_acomp" rows="8"><?php echo $row2['alergias'] ?></textarea>
                                                    </select>
                                                    
                                                    </div>

                                                     <div class="col-sm-3">
                                                         <label class="control-label" >Enfermedades / Medicamentos:</label>
                                                    <textarea cols="30" name="enf_acomp" rows="8"><?php echo $row2['enf_medi'] ?></textarea>
                                                    </select>
                                                    
                                                    </div>
                                            </div>

                                        </div>
                                        
                                    </div>

                                    <input type="submit" class="btn btn-success btn-round" name="registro" >
                                </form>
<!--- ///////////////////////////////// FORM ENDS //////////////////////////////////////////////-->



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

            $('.datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true
            }
         });

         $('.datepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true
            }
         });

         $('.timepicker').datetimepicker({
//          format: 'H:mm',    // use this format if you want the 24hours timepicker
            format: 'h:mm A',    //use this format if you want the 12hours timpiecker with AM/PM toggle
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true

            }
         });

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