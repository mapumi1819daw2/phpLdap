<?php


session_start();
require_once("dbconfig.php");
/**Add */


    /**dn: uid=usr2,ou=usuaris,dc=fjeclot,dc=net
objectClass: top
objectClass: person
objectClass: organizationalPerson
objectClass: inetOrgPerson
objectClass: posixAccount
objectClass: shadowAccount
uid: usr2
cn: ralau races
sn: races
givenName: ralau
title: Usuari
telephoneNumber: +2 675 351 2145
mobile: +2 340 412 1432
postalAddress: Esekuela , 45. Redwood city. California, USA.
loginShell: /bin/bash
gidNumber: 3000
uidNumber: 2500
homeDirectory: /home/usr2/
description: Usuari del sistema 2*/

if( isset($_POST['add']) && isset($_POST['padd']))
{

	$ldaprdn  = 'uid='.trim($_POST['uidadd']).',ou= usuaris,dc=fjeclot,dc=net';
	$ldappass = trim($_POST['padd']); 
	$ldapadmin= "cn=admin,dc=fjeclot,dc=net";  

    // prepare data
    $info["uid"] = $_POST['uidadd'];
    $info["objectClass"][0] =  "person";
    $info["objectClass"][1] =  "organizationalPerson";
    $info["objectClass"][2] =  "inetOrgPerson";
    $info["objectClass"][3] =  "posixAccount";
    $info["objectClass"][4] =  "shadowAccount";
    $info["cn"] = $_POST['cnadd'];
	$info["sn"] = $_POST['snadd'];
	$info["givenname"] = $_POST['uidadd'];
    $info["title"] = "Usuari";
    $info["telephonenumber"] = "+2 675 351 2145";
    $info["mobile"] = "+2 340 412 1432";
    $info["postaladdress"] = "Esekuela , 45. Redwood city. California, USA.";
    $info["loginShell"] = "/bin/bash";
    $info["gidnumber"] = "3000";
    $info["uidnumber"] = "2500";
    $info["homedirectory"] = "'/home/".$_POST["uidadd"]."/";
    $info["description"] = "Usuari del sistema 2";
    
// Connectant-se al servidor openLDAP

$ldapconn = ldap_connect($ldaphost) or die("No s'ha pogut establir una connexió amb el servidor openLDAP.");

ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

/**Si hem aconseguit un identificador */
if ($ldapconn) {


	// Autenticant-se en el servidor openLDAP
    $ldapbind = ldap_bind($ldapconn, $ldapadmin, "fjeclot");
    
   echo $ldapbind;

	if ($ldapbind) {

	// add data to directory
	$r = ldap_add($ldapconn, "cn=".$info["cn"].",ou=usuaris, dc=fjeclot, dc=net", $info);

	
	if($r == true){
        //echo "Afegit!";
        $_SESSION["nouUser"] = $info["cn"];
        header("Location: usuariCreat.php");
	}
	else{
		header("Location: ErrorCreacio.php");
	}

	ldap_close($ldapconn);
}

else{
    echo "Error al fer bind";
}

}


}

?>


<html>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<h2>Afegir un nou usuari</h2>
<!--- Afegir -->
<form action=afegir.php method=post>
		<table>
        <tr>
			  <td><span class="input-group-text">Uid: </span></td>
			  <td><input class="form-control" type=text name=uidadd size=16 maxlength=15></td>
           </tr>
           
           <tr>
			  <td><span class="input-group-text">Cn[Apodo]: </span></td>
			  <td><input class="form-control" type=text name=cnadd size=16 maxlength=15></td>
           </tr>
           
           <tr>
			  <td><span class="input-group-text">Cn[Apodo]: Sn[Surname]: </span></td>
			  <td><input class="form-control" type=text name=snadd size=16 maxlength=15></td>
           </tr>
		<tr>
			  <td><span class="input-group-text">Cn[Apodo]: Nom d'usuari: </span></td>
			  <td><input class="form-control" type=text name=add size=16 maxlength=15></td>
		   </tr>
		   <tr>
			  <td><span class="input-group-text">Cn[Apodo]: Contrasenya: </span></td>
			  <td><input class="form-control" type=password name=padd size=16 maxlength=15></td>
		   </tr>
		
		   <tr>
			  <td colspan=2><input class="btn btn-primary" type=submit value="Afegir"></td>
		   </tr>
	</table>
	</form>

<br>

<a href='http://localhost/phpldap/Opcions.php'> Tornar al menú</a>

</body>

</html>
