<?php
session_start();
require_once("dbconfig.php");

/**Delete */
if( isset($_POST['delete']))
{

// Connectant-se al servidor openLDAP
$ldapconn = ldap_connect($ldaphost) or die("No s'ha pogut establir una connexió amb el servidor openLDAP.");

ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

/**Si hem aconseguit un identificador */
if ($ldapconn) {
// Autenticant-se en el servidor openLDAP
$ldapadmin= "cn=admin,dc=fjeclot,dc=net";
$ldapbind = ldap_bind($ldapconn, $ldapadmin, "fjeclot");


$res = ldap_delete($ldapconn, "cn=".$_POST["delete"].",ou=usuaris, dc=fjeclot, dc=net");

if($res == true){
    $_SESSION["usuariEsborrat"] = $_POST["delete"];
    header('Location: usuariEsborrat.php'); 
}

else{
    
    $_SESSION["usuariEsborrar"] = $_POST["delete"];
    header('Location: ErrorEsborrant.php'); 
}


ldap_close($ldapconn);
}



}

echo "<a href='http://localhost/phpldap/login.php'> Torna a Login </a>";

?>


<h2>Esborrar un usuari</h2>

		<!-- Esborrar -->
	<form action=esborrar.php method=post>	

		<table>
		<tr>
			  <td>Nom d'usuari: </td>
			  <td><input type=text name=delete size=16 maxlength=15></td>
		   </tr>
		   <tr>
			  <td colspan=2><input type=submit value="Esborrar"></td>
		   </tr>
	</table>
    </form>