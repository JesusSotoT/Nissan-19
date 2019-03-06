<?php
session_start();
?>
 
<?php

	// Connection info. file
	include 'conexion.php';	
	
	// data sent from form login.html 
	$nombre_usuario = $_POST['nombre_usuario']; 
	$password = $_POST['password'];
	
	// Query sent to database
	$result = mysqli_query($conn, "SELECT nombre_usuario, password FROM tagm_users WHERE nombre_usuario = '$nombre_usuario'");
	
	// Variable $row hold the result of the query
	$row = mysqli_fetch_assoc($result);
	
	// Variable $hash hold the password hash on database
	$hash = $row['password'];
	$password_encrypt =  sha1($password);//Algoritmo de encriptacion de la contraseña http://php.net/manual/es/function.sha1.php


	/* 
	password_Verify() function verify if the password entered by the user
	match the password hash on the database. If everything is ok the session
	is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
	*/
	if ($password_encrypt == $hash) {	
		
		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = $row['nombre_usuario'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (60 * 60) ;						
		header("location: home2admin.php"); // Redireccionando a la pagina 
	
	
	} else {


			header("location: index-error.php"); // Redireccionando a la pagina 		
	}	
?>


	