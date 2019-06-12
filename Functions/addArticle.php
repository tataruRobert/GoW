<?php


session_start();
require_once 'config.php';
require_once 'common.php';
require_once 'functii.php';
$connection = new Dbh;
$connection->connect();


class Article extends Dbh
{
    public function Afisare()
    {   $ct=0;
        $stmt = $this->connect()->prepare("INSERT INTO `articles`(`title`, `description`, `link`, `valabilitate`, `data`, `key_words`, `type`, `Restricted`) VALUES (?,?,?,?,?,?,?,?) ");
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
        switch ($_POST['vizibil']) {
            case "none":
                $restricted = 0;
                $justFor=0;
                break;
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

        $stmt->execute([$_POST['Titlu'],$_POST['Text'],$_POST['link'],$_POST['valabilitate'],$_POST['data'],$_POST['keywords'],$type, $restricted ]);
        if ( $justFor != 0):
                $stmt = $this->connect()->prepare("INSERT INTO `visiblefor`(`ID_Article`, `Type_User`) VALUES (?,?) ");
                $stmt->execute([maxIDArticle()-1,$justFor]);
        endif;
        header('location:../Actualizat/paginaPrincipala.php');
        exit();


    }
}
$object = new Article();
$object->Afisare();


?>