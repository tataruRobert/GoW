<?php
session_start();
require_once 'config.php';
require_once 'common.php';
$connection = new Dbh;
$connection->connect();



class Login extends Dbh
{
    public function getLogin()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$_POST['username'],$_POST['password']]);
        $flag = 0;
        if ($stmt->rowCount()):

            while ($row = $stmt->fetch()):
                if($row['username'] == $_POST['username'] and $row['password'] == $_POST['password']):
                    $_SESSION['type'] = $row['type'];
                    $flag = 1;
                    header('location:../Actualizat/paginaPrincipala.php');
                    exit();
                endif;
            endwhile;
        endif;
         if($flag == 0):
             header('location:../Actualizat/Login.php');
             exit();
             endif;
    }
}

$object = new Login();
$object->getLogin();