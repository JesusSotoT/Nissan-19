<?php

session_start();
session_unset($_SESSION['nombre_usuario']);
session_destroy();

header('Location: index.php');

?>