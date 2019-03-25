<?php
session_start();

echo "<h2> Benvingut! ".$_SESSION["nouUser"]." </h2>
<a href='http://localhost/phpldap/Opcions.php'> Tornar al menú</a>";



?>