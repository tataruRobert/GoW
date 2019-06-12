<?php

session_start();
require_once '../Proiect_Web/Functions/config.php';
require_once '../Proiect_Web/Functions/functii.php';
require_once '../Proiect_Web/Functions/common.php';
$connection = new Dbh;
$connection->connect();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<link rel="stylesheet" type="text/css" href="../Proiect_Web/Style/page.css">

<div class="header">
    <h1>GoW</h1>
    <p> <b>FII</b> governance web tool</p>
</div>

<div class="navbar">
    <a   href="paginaPrincipala.php">Flux Atom</a>
    <a  href="General.php">General</a>
    <a  href="Local.php">Local</a>
    <?php
    if($_SESSION['type'] != 1):
        ?>
        <a href="Universitar.php">Universitar</a>
        <a href="Fii.php">Fii</a>
    <?php
    endif;
    ?>
    <div class="right">
        <div class="search-container">
            <form action="SearchResults.php" method = "post">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Submit</button>
            </form>
        </div>
        <a href="./Login.php?data=1">Log out</a>
        <?php
        if(($_SESSION['type'] == 6) || ($_SESSION['type'] == 5)):
            ?>
            <a href="Add.php">Add</a>
            <a href="Restriction.php">Restriction</a>
        <?php
        endif;
        ?>
    </div>
</div>

<div class="row">
    <div class="side">

    </div>
    <div class="main">
        <?php
        class Article extends Dbh
        {
            public function Afisare()
            {   $ct=0;
                $stmt = $this->connect()->query("SELECT * FROM articles WHERE key_words like '%{$_POST['search']}%' or title like '%{$_POST['search']}%' order by data ");;
                //$stmt->execute([$_POST['search']]);
                //echo $_POST['search'];
                //$stmt = $this->connect()->prepare("SELECT * FROM articles WHERE key_words like '% ? %' ");;
                //$stmt->execute([$_POST['search']]);

                if ($stmt->rowCount()):

                    while ($row = $stmt->fetch()):
                        $ct++;
                        if(isVisible($row['id'],$_SESSION['type'])):
                            ?>
                            <ul class="star">
                                <li id="<?= $row['id'] ?>"><h2> <?= $row['title'] ?></h2>
                                <li><?= $row['data'] ?>
                                <li><?= $row['description'] ?>
                                <li><?= $row['key_words'] ?>
                                <li><a href="<?= $row['link'] ?>" target="_blank"><?= $row['title'] ?></a></li>
                                <hr>
                            </ul>
                        <?php
                        endif;
                        endwhile;
                        else:
                            echo "<h2>No results for input given</h2>";

                endif;



            }
        }
        $object = new Article();
        $object->Afisare();
        ?>
    </div>
</div>
</div>

<div class="footer">
    <h3>  &trade; GoW</h3>
    <h4>Tataru Robert & Cihodaru Alex</h4>
</div>

</body>
</html>
