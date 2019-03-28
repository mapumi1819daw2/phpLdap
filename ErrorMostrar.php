<?php
session_start();



echo "<p> Error al mostrar ".$_SESSION["ErrorUsuariMostrar"]."</p>
<a href='http://localhost/phpldap/Opcions.php'> Tornar al menú</a>";

?>