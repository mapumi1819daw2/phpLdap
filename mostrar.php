<?php
session_start();
require_once("dbconfig.php");
// Connexió amb el servidor openLDAP

if($_POST["usu"]){
    $ldapconn = ldap_connect($ldaphost) or die("Could not connect to LDAP server.");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    if ($ldapconn) {
    // Autenticació anònima al servidor openLDAP
    $ldapbind = ldap_bind($ldapconn);
    // Accedint a les dades
    if ($ldapbind) {
        $search = ldap_search($ldapconn, "dc=fjeclot,dc=net", "uid=".$_POST['usu']);
        $info = ldap_get_entries($ldapconn, $search);
echo "<pre>";
    print_r($info);

        if($info["count"]=="0"){
            $_SESSION["ErrorUsuariMostrar"] = $_POST['usu'];
            header("Location: ErrorMostrar.php");
        }else{
            $_SESSION["UsuariMostrar"] = $info;
            header("Location: usuariTrobat.php");
        }
        //Ara, visualitzarem algunes de les dades de l'usuari:
        
    } 
    else {
        echo "Error d'autenticació!";
    }
}
}


?>
<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<h2>Mostrar usuari</h2>

    <!-- Dades usuari -->
    <form action="mostrar.php" method=post>	

		<table>
		<tr>
			  <td><span class="input-group-text">Nom d'usuari: </span></td>
			  <td><input class="form-control" type=text name=usu size=16 maxlength=15></td>
		   </tr>
		   <tr>
			  <td colspan=2><input class="btn btn-primary" type=submit value="Consulta"></td>
		   </tr>
	</table>
    </form>

    <br>

<a href='http://localhost/phpldap/Opcions.php'> Tornar al menú</a>

    </body>

    </html>
    