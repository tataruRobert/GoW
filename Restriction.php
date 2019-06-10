<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Tabela utilizatori</title>
<meta charset="UTF-8">
</head>
<body>

<link rel="stylesheet" type="text/css" href="style2.css">


<h2>Acces utilizatori</h2>


<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Nume</th>
      <th>Prenume</th>
      <th>General</th>
      <th>Local</th>
      <th>Universitar</th>
      <th>FII</th>
    </tr>
    <tr>
      <td>Poposcu</td>
      <td>Vasile</td>
      <td><input type="checkbox" id="1"  onclick="myFunction()"></td>
      <td><input type="checkbox" id="2"  onclick="myFunction()"></td>
      <td><input type="checkbox" id="3"  onclick="myFunction()"></td>
      <td><input type="checkbox" id="4"  onclick="myFunction()"></td>
    </tr>
  </table>
</div>
<div>
<button onclick="location.href='paginaPrincipala.html'" type="submit">Update</button> 
 <button onclick="location.href='paginaPrincipala.html'" type="button" class="cancelbtn">Cancel</button>
</div>

</body>
</html>
