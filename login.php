<?php
session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username y $password
$username=$_POST['username'];
$password=$_POST['password'];

include("conexion.php");//Contiene de conexion a la base de datos
 
// Para proteger de Inyecciones SQL 
$username    = mysqli_real_escape_string($con,(strip_tags($username,ENT_QUOTES)));
$password =  sha1($password);//Algoritmo de encriptacion de la contraseña http://php.net/manual/es/function.sha1.php
 
$sql = "SELECT email, password FROM tagm_users WHERE nombre_usuario = '" . $username . "' and password='".$password."';";
$query=mysqli_query($con,$sql);
$counter=mysqli_num_rows($query);
if ($counter==1){
		$_SESSION['login_user_sys']=$username; // Iniciando la sesion
		header("location: dash.php"); // Redireccionando a la pagina profile.php
	
	
} else {
$error = "El correo electrónico o la contraseña es inválida.";	
}
}
}
?>