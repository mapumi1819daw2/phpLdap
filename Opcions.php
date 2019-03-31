<?php
session_start();

/* En funció del botó escollit al formulari anirà a una pàgina o altra */
if(isset($_POST["afegir"])){
    header('Location: afegir.php'); 
}
if(isset($_POST["esborrar"])){
    header('Location: esborrar.php'); 	
}

if(isset($_POST["mostrar"])){
    header('Location: mostrar.php'); 
}

/*echo $_POST["opcio"];

if(!strcmp($_POST["opcio"], "Afegir")){
    header('Location: afegir.php'); 	
}

else if(!strcmp($_POST["opcio"], "Mostrar")){
    header('Location: mostrar.php'); 	
}

else{
    header('Location: esborrar.php'); 	
}
*/





?>


<!-- Formulari per introduir les dades per afegir-->

<html>

<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

<h2>Menú LDAP</h2>

<form action="Opcions.php" method="POST">
<input type="submit" name="afegir" value="Afegir" class="btn btn-primary">
</form>


<form action="Opcions.php" method="POST">
<input type="submit" name="mostrar" value="Mostrar" class="btn btn-success">
</form>

<form action="Opcions.php" method="POST">
<input type="submit" name="esborrar" value="Esborrar" class="btn btn-danger">
</form>




<a href="http://localhost/phpldap/login.php">Logout</a>

</body>

</html>

