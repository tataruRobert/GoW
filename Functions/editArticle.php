<?php
session_start();
require_once 'config.php';
require_once 'common.php';
$connection = new Dbh;
$connection->connect();

class editArticle extends Dbh
{
    public function updateaza()
    {
        $stmt = $this->connect()->prepare("UPDATE articles SET title = ?, description = ?,link = ?,valabilitate = ?,data = ?,key_words = ?,type = ? WHERE id = ?;");
        echo $_POST['categorie'];
        switch ($_POST['categorie']) {
            case "general":
                $type = 1;
                break;
            case "local":
                $type = 2;
                break;
            case "universitar":
                $type = 3;
                break;
            case "fii":
                $type = 4;
                break;
        }
        $stmt->execute([$_POST['Titlu'],$_POST['description'],$_POST['link'],$_POST['valabilitate'],$_POST['data'],$_POST['keywords'],$type,$_POST['id']]);
        header('location:../Actualizat/paginaPrincipala.php');
        exit();
    }
}

$object = new editArticle();
$object->updateaza();

