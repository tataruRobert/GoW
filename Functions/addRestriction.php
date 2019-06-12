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
			//resetRestriction($_POST['idArticle']);
			 switch ($_POST['vizibil']) {
            case "extern":
                $restricted = 1;
                $justFor = 1;
                break;
            case "student":
                $restricted = 1;
                $justFor = 2;
                break;
            case "personal":
                $restricted = 1;
                $justFor = 3;
                break;
            case "colaboratori":
                $restricted = 1;
                $justFor = 4;
                break;
            case "profesori":
                $restricted = 1;
                $justFor = 5;
                break;
            case "decan":
                $restricted = 1;
                $justFor = 6;
                break;
        }
        	addRestriction($_POST['idArticle'],$justFor);
			 
		}
	}
	header('location:../Actualizat/Restriction.php');
        	exit();
?>