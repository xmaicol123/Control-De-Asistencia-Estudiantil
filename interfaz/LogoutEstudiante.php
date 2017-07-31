<?php
session_start();


if ($_SESSION['loggedin_estudiante'] = true) {
	unset ($_SESSION['cod_estudiante']);
	unset ($_SESSION['nick_estudiante']);
	header('Location: ../index.php');
}


?>