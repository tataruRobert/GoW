<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Login</title>
<meta charset="UTF-8">
</head>
<body>
 <link rel="stylesheet" type="text/css" href="../Proiect_Web/Style/login.css">


<form action="../Proiect_Web/Functions/Process.php" method="post">
  <div class="imgcontainer">
    <img src="Logo.png" alt="Logo" class="logo">
  </div>

  <div class="container">
    <label ><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label ><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    

<button type="submit">
        Login</button>
  </div>
   
  </div>
</form>

</body>
</html>

<?php
if(isset($_GET['data'])):
    session_start();
    session_unset();
    session_destroy();
    endif;
