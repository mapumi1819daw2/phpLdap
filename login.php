<?php
session_destroy();
session_start(); 

require_once("dbconfig.php");

/**Login */
if( isset($_POST['login']) && isset($_POST['password']))
{

	if(strcmp($_POST['login'], "admin")){
		header('Location: Error.php');
	}

	else{
		$ldaprdn  = 'uid='.trim($_POST['login']).',ou='.trim($_POST['ou']).',dc=fjeclot,dc=net';
	$ldappass = trim($_POST['password']); 
	$ldapadmin= "cn=admin,dc=fjeclot,dc=net";  

	// Connectant-se al servidor openLDAP
	$ldapconn = ldap_connect($ldaphost) or die("No s'ha pogut establir una connexió amb el servidor openLDAP.");

    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

	/**Si hem aconseguit un identificador */
	if ($ldapconn) {
		// Autenticant-se en el servidor openLDAP
		$ldapbind = ldap_bind($ldapconn, $ldapadmin, $ldappass);

		// Accedint a home.php
		if ($ldapbind) {
			$_SESSION['username'] = trim($_POST['login']);
			ldap_close($ds);
			header('Location: Opcions.php'); 		
		} else {
			echo "Error en el mom d'usuari, unitat organitzativa o contrasenya!";
			echo $ldapconn;
		}
	}
	}
	
	
}



?>

<html>
	<title>P&agrave;gina d'indentificaci&oacute; de l'usuari del qual es volen mostrar dades</title>
	<form action=login.php method=post>
	<h1>USUARI DINS DEL DOMINI fjeclot.net DEL QUAL ES VOLEN MOSTRAR DADES</h1>	
	Si us plau, identificat amb el teu nom d'usuari, unitat organitzativa i contrasenya:
		<table cellspacing=3 cellpadding=3>
		   <tr>
			  <td>Nom d'usuari: </td>
			  <td><input type=text name=login size=16 maxlength=15></td>
		   </tr>
		 
		   <tr>
			  <td>Contrasenya de l'administrador LDAP: </td>
			  <td><input type=password name=password size=16 maxlength=15></td>
		   </tr>
		   <tr>
			  <td colspan=2><input type=submit value="Mostra dades"></td>
		   </tr>
		</table>
		</form>


		

	
</html>
