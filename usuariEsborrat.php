<?php

session_start();
echo "<p>Usuari ".$_SESSION["usuariEsborrat"].", esborrat!</p>
<a href='http://localhost/phpldap/Opcions.php'> Tornar al menú</a>";

?>