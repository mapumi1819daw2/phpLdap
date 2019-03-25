
<?php
session_start(); 

if (isset($_SESSION['username']))
{
	// Connexió amb el servidor openLDAP
	$ldaphost = "ldap://172.20.0.114";
	$ldapconn = ldap_connect($ldaphost) or die("Could not connect to LDAP server.");
	ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
	if ($ldapconn) {
		// Autenticació anònima al servidor openLDAP
		$ldapbind = ldap_bind($ldapconn);
		// Accedint a les dades
		if ($ldapbind) {
			$search = ldap_search($ldapconn, "dc=fjeclot,dc=net", "uid=".$_SESSION['username']);
			$info = ldap_get_entries($ldapconn, $search);
			//Ara, visualitzarem algunes de les dades de l'usuari:
			for ($i=0; $i<$info["count"]; $i++)
			{
				echo "Nom: ".$info[$i]["cn"][0]. "<br />";
				echo "Títol: ".$info[$i]["title"][0]. "<br />";
				echo "Telèfon fixe: ".$info[$i]["telephonenumber"][0]. "<br />";
				echo "Adreça postal: ".$info[$i]["postaladdress"][0]. "<br />";
				echo "Telèfon mòbil: ".$info[$i]["mobile"][0]. "<br />";
				echo "Descripció: ".$info[$i]["description"][0]. "<br />";
			} 
		} 
		else {
			echo "Error d'autenticació!";
		}
	}
}
else{
	header('Location: login.php'); 	
}
// Log OUT
if(isset($_GET['logout']))	{
	session_destroy();
	header('Location: login.php');
}

?>
<html>
<title> Dades de l'usuari</title>
	<a href="home.php?logout">Logout</a>
</html>
