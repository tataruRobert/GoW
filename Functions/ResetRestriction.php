<?php

session_start();
require_once 'config.php';
require_once 'common.php';
require_once 'functii.php';
$connection = new Dbh;
$connection->connect();

	if (isset($_POST['idArticle']))
	{
		if(checkIDExists($_POST['idArticle']) == 1) {
			resetRestriction($_POST['idArticle']);

		}
	}
header('location:../Actualizat/Restriction.php');
exit();
?>