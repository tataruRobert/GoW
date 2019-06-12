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
    <title>Local</title>
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
    <a class ="active"  href="Local.php">Local</a>
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
        <div id="toc_container">
            <p class="toc_title"><h2>Contents</h2></p>
            <?php
            class Menu extends Dbh
            {
                public function Afisare()
                {
                    $ct=0;
                    $stmt = $this->connect()->prepare("SELECT * FROM articles WHERE type = ? ");
                    $stmt->execute([2]);
                    if ($stmt->rowCount()):

                        while ($row = $stmt->fetch()):

                            if(isVisible($row['id'],$_SESSION['type'])):
                                $ct++;
                                    ?>
                                    <ul class="toc_list">
                                        <li><a href="#<?= $row['id'] ?>"><b><?= convertToLetters($ct) ?> paragraph</b></a>
                                    </ul>
                                <?php
                            endif;
                            endwhile;
                    endif;


                }
            }
            $object = new Menu();
            $object->Afisare();
            ?>
        </div>
    </div>
    <div class="main">
        <?php
        class Article extends Dbh
        {
            public function Afisare()
            {   $ct=0;
                $stmt = $this->connect()->prepare("SELECT * FROM articles WHERE type = ? ");
                $stmt->execute([2]);
                if ($stmt->rowCount()):

                    while ($row = $stmt->fetch()):

                        if(isVisible($row['id'],$_SESSION['type'])):
                            $ct++;
                                ?>
                                <ul type="none" class="star">
                                    <li id="<?= $row['id'] ?>"><h2><?= $row['title'] ?></h2>
                                    <li><h3>Data: <?= $row['data'] ?></h3>
                                    <li><h4>Descriere: <?= $row['description'] ?></h4>
                                    <li><h5><a href="<?= $row['link'] ?>">Link documentul</a></h5>
                                        <?php
                                        if(($_SESSION['type'] == 6) || ($_SESSION['type'] == 5)):
                                        ?>
                                    <li><a href="./Edit.php?edit=<?= $row['id']?>"><button>Edit</button> </a>
                                        <?php
                                        endif;
                                        ?>
                                </ul>
                        <hr>
                            <?php
                        endif;
                        endwhile;
                endif;
                if ($ct == 0) :
                    echo "<h2>No articles for you</h2>";
                endif;

            }
        }
        $object = new Article();
        $object->Afisare();
        ?>
    </div>
</div>
<div class="footer">
    <h3>  &trade; GoW</h3>
    <h4>Tataru Robert & Cihodaru Alex</h4>
</div>

</body>
</html>
