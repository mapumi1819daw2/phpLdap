<?php
session_start();


if(isset($_POST["submit"])){

echo $_POST["opcio"];

if(!strcmp($_POST["opcio"], "Afegir")){
    header('Location: afegir.php'); 	
}

else if(!strcmp($_POST["opcio"], "Mostrar")){
    header('Location: mostrar.php'); 	
}

else{
    header('Location: esborrar.php'); 	
}

}




?>


<h2>Menú LDAP</h2>

<form action="Opcions.php" method="POST">

<input type="radio" name="opcio" value="Afegir">Afegir<br>
<input type="radio" name="opcio" value="Mostrar">Mostrar<br>
<input type="radio" name="opcio" value="Esborrar">Esborrar<br>

<input type="submit" name="submit" value="Submit">


</form>


<form action="login.php">
    <input type="submit" value="logout">
</form>

