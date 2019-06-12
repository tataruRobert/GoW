<?php


session_start();
require_once '../Proiect_Web/Functions/config.php';
require_once '../Proiect_Web/Functions/functii.php';
require_once '../Proiect_Web/Functions/common.php';
$connection = new Dbh;
$connection->connect();

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Tabela utilizatori</title>
<meta charset="UTF-8">
</head>
<body>

<link rel="stylesheet" type="text/css" href="../Proiect_Web/Style/styleRestrict.css">


<div >
  <table>
    <tr>
      <th>ID</th>
      <th>Titlu</th>
      <th>Descriere</th>
      <th>Resctrictionat</th>
    </tr>
      <?php
      class AfisareArticole extends Dbh
      {
          public function Afisare()
          {
              $stmt = $this->connect()->query("SELECT * FROM articles ");
              if ($stmt->rowCount()):

                  while ($row = $stmt->fetch()):
                      ?>
                      <tr>
                          <th><?= $row['id'] ?> </th>
                          <th><?= $row['title'] ?> </th>
                          <th><?= $row['description'] ?> </th>
                          <th><?= returnRestriction($row['id']) ?> </th>
                      </tr>
                  <?php
                  endwhile;
              endif;


          }
      }
      $object = new AfisareArticole();
      $object->Afisare();
      ?>


  </table>
</div>
<div>

<form action="ResetRestriction.php" method="post">
  ID Article to reset Restriction:<br>
  <input type="number" name="idArticle" value="Some id">
  <br><br>
  <input type="submit" value="Reset Restriction">
</form> 
<br><br>
 <br><br>
<form action="addRestriction.php" method="post">
  ID Article to add Restriction:<br>
  <input type="number" name="idArticle" value="Some id">
  <br><br>
  Type to be Restricted:<br>
   <select id="vizibil" name="vizibil">
                  <option value="extern">Extern</option>
                  <option value="student">Student</option>
                  <option value="personal">Personal</option>
                  <option value="colaboratori">Colaboratori</option>
                  <option value="profesori">Profesori</option>
                  <option value="decan">Decan</option>
              </select>
  <br><br>
  <input type="submit" value="Add Restriction">
</form> 

<br><br><br>
    <button class="cancelbtn" onclick="window.location.href='paginaPrincipala.php'">Cancel</button>

</div>

</body>
</html>
