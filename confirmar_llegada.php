<?php 
include 'conexion.php';

if(isset($_POST['registro'])){
	//recibo los datos de texto y selects
	@$fechaHoy = date("Y-m-d H:i:s",time());
$date = new DateTime($fechaHoy, new DateTimeZone('America/Argentina/Buenos_Aires'));
date_default_timezone_set('America/Argentina/Buenos_Aires');
$zonahoraria = date_default_timezone_get();
@$fechaHoy=date("Y-m-d H:i:s",time());
				
				$comentarios = mysqli_real_escape_string($conn,(strip_tags($_POST['comentarios_llegada'],ENT_QUOTES)));
				$id = mysqli_real_escape_string($conn,(strip_tags($_POST['id_pais'],ENT_QUOTES)));
				$pais = mysqli_real_escape_string($conn,(strip_tags($_POST['pais'],ENT_QUOTES)));


		
				$insert = mysqli_query($conn, "UPDATE paises SET comentarios_llegada_aeropuerto = '$comentarios' , hora_llegada_aeropuerto = '$fechaHoy' , llegada = '1' WHERE llegada = '0' AND id = '$id'") or die(mysqli_error());
}


						if($insert == true){
						 header('Location: paises_llegada.php?complete=1');
		
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "notify@newbusinessmedia.es";
    $to = "soto.tovar.jesus@gmail.com,jesus@agmedia.mx,francisco@agmedia.mx";
    $subject = "". $pais. " ha llegado al aeropuerto y esta en camino al hotel";
    $message = "El pais de ".  $pais . " se ha confirmado que ha llegado al Aeropuerto a las ". $fechaHoy ." y esta en camino al hotel , estos fueron los comentarios de el encargado de su recepcion ".  $comentarios ." " ;
    $headers = "From: " . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";
						
						
								
						}else{
						    header('Location: error-checkin.php');
						}
				
			
				
 ?>




