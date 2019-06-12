<?php


session_start();
require_once '../Proiect_Web/Functions/config.php';
require_once '../Proiect_Web/Functions/functii.php';
require_once '../Proiect_Web/Functions/common.php';
$connection = new Dbh;
$connection->connect();

class edit extends Dbh
{
    public function getEdit()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM articles WHERE id = ? ");

        $stmt->execute([$_GET['edit']]);
        $row = $stmt->fetch();


        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="../Proiect_Web/Style/addStyle.css">
            <title> Continut nou</title>
            <meta charset="UTF-8">

        </head>
        <body>

        <h2>Edit</h2>

        <div class="container">
            <form action="editArticle.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="Titlu">Titlu</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="Titlu" name="Titlu" value="<?= $row['title'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="country">Categorie</label>
                    </div>
                    <div class="col-75">
                        <select id="categorie" name="categorie">
                            <option value="general">General</option>
                            <option value="local">Local</option>
                            <option value="universitar">Universitar</option>
                            <option value="fii">FII</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Data">Data</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name="data" value="<?= $row['data'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Valabilitate">Valabilitate</label>
                    </div>
                    <div class="col-75">
                        <input type="date" name="valabilitate" value="<?= $row['valabilitate'] ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="Link">Link</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="Link" name="link" value="<?= $row['link'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="KeyWords">Cuvinte Cheie</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="KeyWords" name="keywords" value="<?= $row['key_words'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="subject">Text</label>
                    </div>
                    <div class="col-75">
                    <textarea id="subject" name="description"
                              style="height:200px"></textarea>
                    </div>
                </div>
                <input type="hidden" value="<?= $row['id'] ?>" name="id">
                <div class="row">
                    <button type="submit">Edit</button>
                </div>
            </form>
            <button class="cancelbtn" onclick="window.location.href='paginaPrincipala.php'">Cancel</button>
        </div>

        </body>
        </html>
        <?php

    }

}

$object = new edit();
$object->getEdit();

?>
