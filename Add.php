<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="style3.css">
 <title> Continut nou</title>
<meta charset="UTF-8">

</head>
<body>

<h2>Add</h2>

<div class="container">
  <form action="/action_page.php">
    <div class="row">
      <div class="col-25">
        <label for="Titlu">Titlu</label>
      </div>
      <div class="col-75">
        <input type="text" id="Titlu" name="firstname" placeholder="Titlu...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Categorie</label>
      </div>
      <div class="col-75">
        <select id="country" name="country">
          <option value="general">General</option>
          <option value="local">Local</option>
          <option value="universitar">Universitar</option>
           <option value="fii">FII</option>
        </select>
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
      <button type="submit" formaction="paginaPrincipala.html">Add</button> 
    </div>
  </form>
</div>

</body>
</html>
