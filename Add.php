<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="../Proiect_Web/Style/addStyle.css">
 <title> Continut nou</title>
<meta charset="UTF-8">

</head>
<body>

<h2>Add</h2>

<div class="container">
  <form action="addArticle.php" method="post">
    <div class="row">
          <div class="col-25">
              <label for="Titlu">Titlu</label>
          </div>
          <div class="col-75">
              <input type="text" id="Titlu" name="Titlu" placeholder="Titlu...">
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
              <input type="date" name="data">
          </div>
      </div>
      <div class="row">
          <div class="col-25">
              <label for="Valabilitate">Valabilitate</label>
          </div>
          <div class="col-75">
              <input type="date" name="valabilitate">
          </div>
      </div>

      <div class="row">
          <div class="col-25">
              <label for="Link">Link</label>
          </div>
          <div class="col-75">
              <input type="text" id="Link" name="link" placeholder="Link...">
          </div>
      </div>
      <div class="row">
          <div class="col-25">
              <label for="KeyWords">Cuvinte Cheie</label>
          </div>
          <div class="col-75">
              <input type="text" id="KeyWords" name="keywords" placeholder="Cuvinte Cheie...">
          </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Text</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="Text" placeholder="Adaugati textul legii" style="height:200px"></textarea>
      </div>
    </div>

      <div class="row">
          <div class="col-25">
              <label for="vizibil">Vizibil doar pentru</label>
          </div>
          <div class="col-75">
              <select id="vizibil" name="vizibil">
                  <option value="none" selected>None</option>
                  <option value="extern">Extern</option>
                  <option value="student">Student</option>
                  <option value="personal">Personal</option>
                  <option value="colaboratori">Colaboratori</option>
                  <option value="profesori">Profesori</option>
                  <option value="decan">Decan</option>
              </select>
          </div>
      </div>
      <div class="row">
          <button type="submit" >Add</button>
      </div>


  </form>


    <button class="cancelbtn" onclick="window.location.href='paginaPrincipala.php'">Cancel</button>
</div>

</body>
</html>
