<?php
//session_start();
require_once 'config.php';
require_once 'common.php';
$connection = new Dbh;
$connection->connect();

class Articol extends Dbh
{
    public function TestRestricted($id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM articles WHERE id = ? ");
        $stmt->execute([$id]);
        if ($stmt->rowCount()):

            while ($row = $stmt->fetch()):
               if ($row['Restricted'] == 1) {
                   return 1;
               }
               else {
                   return 0;
               }
            endwhile;
        endif;


    }
    public function TestVisible($idArticle,$type)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM visiblefor WHERE ID_Article = ? and Type_User = ? ");
        $stmt->execute([$idArticle,$type]);
        if ($stmt->rowCount()) {
            return 1;
        }
        return 0;

    }
    public  function maxIDArticle() {
        $stmt = $this->connect()->query("SELECT max(id) as result FROM articles ");
        if ($stmt->rowCount()) {

            while ($row = $stmt->fetch()):
                return $row['result'] + 1;
            endwhile;
        }

    }
    public function returnRestriction($id) {
            $stmt = $this->connect()->prepare("SELECT * FROM visiblefor WHERE ID_Article = ? ");
             $stmt->execute([$id]);
        $result = 0;
        if ($stmt->rowCount()):
            while ($row = $stmt->fetch()):
                if ($result == 0) {
                    $result = $row['Type_User'];
                }else {
                    $result = $result * 10 +  $row['Type_User'];
                }
            endwhile;
        endif;
        return $result;
    }
    public function atomFeed(){
         $stmt = $this->connect()->query("SELECT id,title,description,link,valabilitate,data FROM articles order by data desc limit 25 ");
         if ($stmt->rowCount()):
                return $stmt;
            
        endif;
    }
    public function checkIDExists($id) {
        $stmt = $this->connect()->prepare("SELECT * FROM articles where id = ? ");
        $stmt->execute([$id]);
         if ($stmt->rowCount()):
                return 1;
        endif;
        return 0;
    }
    public function resetRestriction($id) {
        $stmt = $this->connect()->prepare("UPDATE articles set Restricted = 0 where id = ? ");
        $stmt->execute([$id]);
        $stmt = $this->connect()->prepare("DELETE FROM visiblefor where ID_Article = ? ");
        $stmt->execute([$id]);
    }
    public function addRestriction($id,$justFor) {
        $stmt = $this->connect()->prepare("UPDATE articles set Restricted = 1 where id = ? ");
        $stmt->execute([$id]);
        $stmt = $this->connect()->prepare("SELECT * FROM visiblefor where ID_Article = ? and Type_User = ? ");
        $stmt->execute([$id,$justFor]);
         if (!$stmt->rowCount()):
                $stmt = $this->connect()->prepare("INSERT INTO `visiblefor`(`ID_Article`, `Type_User`) VALUES (?,?) ");
        $stmt->execute([$id,$justFor]);
        endif;
        
    }
}

function isVisible($idArticle, $typeUser) {
    $object = new Articol();
    if ($object->TestRestricted($idArticle) == 0) {
        return 1;
    }else {
        if($object->TestVisible($idArticle,$typeUser) == 1) {
            return 1;
        }else {
            return 0;
        }
    }
}
function maxIDArticle(){
    $object = new Articol();
    return $object->maxIDArticle();
}
function returnRestriction($id){
    $object = new Articol();
    return $object->returnRestriction($id);
}
function atomFeed(){
    $object = new Articol();
    return $object->atomFeed();
}

function checkIDExists($id){
    $object = new Articol();
    return $object->checkIDExists($id);
}
function resetRestriction($id) {
    $object = new Articol();
    return $object->resetRestriction($id);
}
function addRestriction($id,$justFor) {
    $object = new Articol();
    return $object->addRestriction($id,$justFor);
}
function convertToLetters($id) {
    $names = array('First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth','Ninth','Tenth','Eleventh','Twelveth','Thirteenth');
    return $names[$id - 1];
}

//echo isVisible(13,1);
//echo maxIDArticle();
?>