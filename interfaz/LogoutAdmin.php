<?php
session_start();



if ($_SESSION['loggedin_admin'] = true) {
	unset ($_SESSION['cod_admin']);
	unset ($_SESSION['nick_admin']);
	header('Location: ../index.php');
}



?>