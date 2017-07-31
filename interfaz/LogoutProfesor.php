<?php
session_start();


if ($_SESSION['loggedin_profesor'] = true) {
	unset ($_SESSION['cod_profesor']);
	unset ($_SESSION['nick_profesor']);
	unset ($_SESSION['nombre_profesor']);
	header('Location: ../index.php');
}



?>