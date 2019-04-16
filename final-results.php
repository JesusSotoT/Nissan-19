
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--     Fonts and icons     -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/google-roboto-300-700.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
                <a class="simple-text">
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
                <div class="container-fluid">
                   <div class="col-md-12">
                            <div class="card">
                                                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="red">
                                <i class="material-icons">receipt</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Argentina</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m , b.sexo as sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 0 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo  $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Chile</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m , b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 1 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Perú</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m , b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 2 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Colombia</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m , b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 3 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Panamá</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m , b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 4 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>ESPN</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m , b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 5 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Mexico</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m , b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 6 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Brasil</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m , b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 7 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Uruguay</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m , b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 8 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Costa Rica</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m, b.sexo ,  c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 9 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Bolivia</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m , b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 10 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Republica Dominicana</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m , b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 11 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Ecuador</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m, b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 12 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>Honduras</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m, b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 13 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
                                <h4 class="card-title">Tabla de Resultados<span>
                                        <h6>El Salvador</h6>
                                    </span>.</h4>
                                <div class="table-responsive">
                                    <!--<input class="input-group" type="text" id="myInput"> -->
                                    <table class="table" id="sin_asistencia">
                                        <thead class="title" style="font-size: 12px;">
                                            <th class="text-center">Clave</th>
                                            <th class="text-center">Nombre</th>
                                              <th class="text-center">Sexo</th>
                                            <th class="text-center">Tryout 01</th>
                                            <th class="text-center">Tryout 02</th>
                                            <th class="text-center">Tryout 03</th>
                                            <th class="text-center">Tryout 04</th>
                                            <th class="text-center">Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                include "conexion.php";
                  $query =  "SELECT a.clave_p as id_participante , a.tryout01 , a.tryout02 , a.tryout03 , a.tryout04 , a.total , b.nombre , b.apellido_p , b.apellido_m, b.sexo , c.pais FROM t3dm2_scores a left join t3dm_participante b on b.clave = a.clave_p left join paises c on c.id = b.pais WHERE b.pais = 14 order by sexo" ;
                  $result = $conn->query($query);
                while ($row = $result->fetch_array())
                  {
                  ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo '<a class="btn btn-info">'.$row["id_participante"].'</a>'; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['nombre'].' '.$row['apellido_p'].' '.$row['apellido_m'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php

                                                    $sexo = $row['sexo'];
                                                    if($sexo == 0){
                                                     echo "Masculino";

                                                 }else{
                                                 echo "Femenino";
                                             }
                                            
                                                  ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout01'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout02'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout03'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $row['tryout04'] ?>
                                                </td>
<td class="text-center">
                                                    <?php

                                                    $t1 = $row["tryout01"];
                                                    $t2 = $row["tryout02"];
                                                    $t3 = $row["tryout03"];
                                                    $t4 = $row["tryout04"];

                                                       $suma = $t1+$t2+$t3+$t4;
                                                    echo $suma;
                                                     ?>
                                                </td>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {

    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

    demo.initVectorMap();

$(document).ready(function() {
    $('#sin_asistencia').DataTable( {
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]
    } );
} );

});
</script>

<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->

</html>