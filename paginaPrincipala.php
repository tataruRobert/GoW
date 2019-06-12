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
    <title>Pagina Principala</title>
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
    <a class ="active"  href="paginaPrincipala.php">Flux Atom</a>
    <a href="General.php">General</a>
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
        <feed xml:lang="en-US" xmlns="http://www.w3.org/2005/Atom"> 
     <title>Latest Articles</title> 
     <subtitle>The latest articles</subtitle>
     <br>
        <?php
            $stmt = atomFeed();
            $i = 0;
            while ($row = $stmt->fetch()):
               if ($i > 0) {
               echo "</entry>";
           }
 
           $articleDate = $row['data'];
           //$articleDateRfc3339 = date3339(strtotime($articleDate));
           echo "<entry>";
           echo "<id>";
           echo $row['id'];
           echo "</id>";
           echo "<subtitle>";
           echo $row['title'];
           echo "</subtitle>";
           echo "<updated>";
           echo $articleDate;
           echo "</updated>"; 
           echo "<summary>";
           echo $row['description'];
           echo "</summary>";
           echo "<link type='text/html'
                    href='".$row['link']."'/>";
           echo "<expireDate>";
           echo $row['valabilitate'];
           echo "</expireDate>";
            echo "<hr>";
           $i++;
            endwhile;
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
