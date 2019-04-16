<?php
$host="localhost";
$user="root";
$password="root";
$db="nissan19";


$conn = mysqli_connect($host,$user,$password,$db);

if(mysqli_connect_errno()){
    echo 'Error, no se pudo conectar a la base de datos: '.mysqli_connect_error();
}   

?>