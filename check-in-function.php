<?php 
include 'conexion.php';

if(isset($_POST['registro'])){


//FOTOGRAFIA/////////////////////////////////////////////////////////////

//capturamos los datos del fichero subido    
$type=$_FILES['img_2']['type'];
$tmp_name = $_FILES['img_2']["tmp_name"];
$name = $_FILES['img_2']["name"];
$ext= end($array);


//Creamos una nueva ruta (nuevo path)
//Así guardaremos nuestra imagen en la carpeta "images"
$nuevo_path="fotos-participantes/".$name;
//Movemos el archivo desde su ubicación temporal hacia la nueva ruta

move_uploaded_file($tmp_name,$nuevo_path);
//Extraer la extensión del archivo. P.e: jpg

$array=explode('.',$nuevo_path);

$ext= end($array);



//PARTICIPANTE/////////////////////////////////////////////////////////////

@$fechaHoy = date("Y-m-d H:i:s",time());

$date = new DateTime($fechaHoy, new DateTimeZone('America/Argentina/Buenos_Aires'));

date_default_timezone_set('America/Argentina/Buenos_Aires');
$zonahoraria = date_default_timezone_get();

@$fechaHoy=date("Y-m-d H:i:s",time());

$habitacion_hotel = mysqli_real_escape_string($conn,(strip_tags($_POST['habitacion_hotel'],ENT_QUOTES)));
$id = mysqli_real_escape_string($conn,(strip_tags($_GET['id_participante'],ENT_QUOTES)));
$sexo_participante = mysqli_real_escape_string($conn,(strip_tags($_POST['sexo_participante'],ENT_QUOTES)));
$nombre_participante = mysqli_real_escape_string($conn,(strip_tags($_POST['nombre_participante'],ENT_QUOTES)));
$apellidoP_participante = mysqli_real_escape_string($conn,(strip_tags($_POST['apellidoP_participante'],ENT_QUOTES)));
$apellidoM_participante = mysqli_real_escape_string($conn,(strip_tags($_POST['apellidoM_participante'],ENT_QUOTES)));
$fecha_nacimiento_participante = mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_nacimiento_participante'],ENT_QUOTES)));
$alergias_participante = mysqli_real_escape_string($conn,(strip_tags($_POST['alergias_participante'],ENT_QUOTES)));
$enf_participante = mysqli_real_escape_string($conn,(strip_tags($_POST['enf_participante'],ENT_QUOTES)));

$pais = mysqli_real_escape_string($conn,(strip_tags($_GET['pais'],ENT_QUOTES)));


// Acompañante ///////////////////////////////////////////////////////////////


$sexo_acomp = mysqli_real_escape_string($conn,(strip_tags($_POST['sexo_acomp'],ENT_QUOTES)));
$nombre_acomp = mysqli_real_escape_string($conn,(strip_tags($_POST['nombre_acomp'],ENT_QUOTES)));
$apellidoP_acomp = mysqli_real_escape_string($conn,(strip_tags($_POST['apellidoP_acomp'],ENT_QUOTES)));
$apellidoM_acomp = mysqli_real_escape_string($conn,(strip_tags($_POST['apellidoM_acomp'],ENT_QUOTES)));
$talla_acomp = mysqli_real_escape_string($conn,(strip_tags($_POST['talla_acomp'],ENT_QUOTES)));
$tipo_sangre_acomp = mysqli_real_escape_string($conn,(strip_tags($_POST['tipo_sangre_acomp'],ENT_QUOTES)));
$alergias_acomp = mysqli_real_escape_string($conn,(strip_tags($_POST['alergias_acomp'],ENT_QUOTES)));
$enf_acomp = mysqli_real_escape_string($conn,(strip_tags($_POST['enf_acomp'],ENT_QUOTES)));

// presentacion participa


$insert = mysqli_query($conn, "UPDATE tagm_participante SET sexo = '$sexo_participante', ruta_foto2 = '$nuevo_path', nombre = '$nombre_participante', apellido_p = '$apellidoP_participante', apellido_m = '$apellidoM_participante', alergias = '$alergias_participante', enf_medi = '$enf_participante' , habitacion_hotel = '$habitacion_hotel' , hora_registro = '$fechaHoy' , asistencia = '1' WHERE asistencia = '0' AND clave = '$id'") or die(mysqli_error()); 



//acompanante presentacion datos
echo $sexo_acomp . "<br>";

echo $nombre_acomp . "<br>";

echo $apellidoP_acomp . "<br>";

echo $apellidoM_acomp . "<br>";

echo $talla_acomp . "<br>";

echo $tipo_sangre_acomp . "<br>";

echo $alergias_acomp . "<br>";

echo $enf_acomp . "<br>";


$insert2 = mysqli_query($conn, "UPDATE tagm_acompanante SET sexo = '$sexo_acomp', nombre = '$nombre_acomp', apellido_p = '$apellidoP_acomp', apellido_m = '$apellidoM_acomp', talla = '$talla_acomp', tipo_sangre = '$tipo_sangre_acomp', alergias = '$alergias_acomp', enf_medi = '$enf_acomp'  WHERE clave_p = '$id'") or die(mysqli_error()); 

// CONSULTAS ///////////////////////////////////////////////////////////////


				
}


						if($insert == true && $insert2 == true){
						/*	switch ($pais) {
								case '0':
									header('Location: dash-contries/dash-arg.php?complete=1');
									break;
									case '1':
									header('Location: dash-contries/dash-chl.php?complete=1');
									break;
									case '2':
									header('Location: dash-contries/dash-per.php?complete=1');
									break;
									case '3':
									header('Location: dash-contries/dash-col.php?complete=1');
									break;
									case '4':
									header('Location: dash-contries/dash-.php?complete=1');
									break;
									case '5':
									header('Location: dash-contries/dash-.php?complete=1');
									break;
									case '6':
									header('Location: dash-contries/dash-.php?complete=1');
									break;
									case '7':
									header('Location: dash-contries/dash-.php?complete=1');
									break;
									case '8':
									header('Location: dash-contries/dash-.php?complete=1');
									break;
									case '9':
									header('Location: dash-contries/dash-.php?complete=1');
									break;
									case '10':
									header('Location: dash-contries/dash-.php?complete=1');
									break;
									case '11':
									header('Location: dash-contries/dash-.php?complete=1');
									break;
									case '12':
									header('Location: dash-contries/dash-.php?complete=1');
									break;
									case '13':
									header('Location: dash-contries/dash-.php?complete=1');
									break;
									case '14':
									header('Location: dash-contries/dash-.php?complete=1');
									break;
								
								default:
									 header('Location: home2admin.php?complete=1');
									break;
							}*/
							echo "exito"	;
							 header('Location: home2admin.php?complete=1');
						}else{
						    header('Location: error-checkin.php');

						    echo "Valio"	;
						}
		

				
 ?>




