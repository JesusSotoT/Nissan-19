<?php
$host="sql175.main-hosting.eu";
$user="u879652823_jstd";
$password="Nissan2019-agmedia";
$db="u879652823_nis19";


$conn = mysqli_connect($host,$user,$password,$db);

if(mysqli_connect_errno()){
    echo 'Error, no se pudo conectar a la base de datos: '.mysqli_connect_error();
}   

?>