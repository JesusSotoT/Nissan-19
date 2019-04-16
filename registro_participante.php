<?php    include "conexion.php";
$id = intval($_GET['id']);
$sql = mysqli_query($conn, "SELECT a.clave AS 'id_participante'   FROM tagm_participante a 
WHERE a.clave = '$id'");
       if(mysqli_num_rows($sql) == 0){
               echo "nonononono";
     }else{
                $row = mysqli_fetch_assoc($sql);
                 $sql2 =  mysqli_query($conn, "UPDATE tagm_participante SET  asistencia = '1' where clave = '$id'  ");
                  header("Location: home2admin.php");
     }
                $id_participante =  $_GET['id']; 



?>
                