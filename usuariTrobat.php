<?php

session_start();
echo "<pre>";
print_r($_SESSION);

for ($i=0; $i<$_SESSION["UsuariMostrar"]["count"]; $i++)
        {
            echo "Nom: ".$_SESSION["UsuariMostrar"][$i]["cn"][0]. "<br />";
            echo "Títol: ".$_SESSION["UsuariMostrar"][$i]["title"][0]. "<br />";
            echo "Telèfon fixe: ".$_SESSION["UsuariMostrar"][$i]["telephonenumber"][0]. "<br />";
            echo "Adreça postal: ".$_SESSION["UsuariMostrar"][$i]["postaladdress"][0]. "<br />";
            echo "Telèfon mòbil: ".$_SESSION["UsuariMostrar"][$i]["mobile"][0]. "<br />";
            echo "Descripció: ".$_SESSION["UsuariMostrar"][$i]["description"][0]. "<br />";

           echo "uid: ". $_SESSION["UsuariMostrar"][0]["uid"][0] . "<br />";
   echo "person: ". $_SESSION["UsuariMostrar"][0]["objectclass"][0]. "<br />";
   echo "organizationalPerson :". $_SESSION["UsuariMostrar"][0]["objectclass"][1]."<br />";
   echo "inetOrg Person: ". $_SESSION["UsuariMostrar"][0]["objectclass"][2] ."<br />";
   echo "posix Account: ". $_SESSION["UsuariMostrar"][0]["objectclass"][3] ."<br />";
   echo "shadow Account: ". $_SESSION["UsuariMostrar"][0]["objectclass"][4] ."<br />";
   echo "cnadd : ". $_SESSION["UsuariMostrar"]["cn"] ."<br />";
	echo "snadd: ".$_SESSION["UsuariMostrar"]["sn"]. "<br />";
	echo "uidadd: ".$_SESSION["UsuariMostrar"]["givenname"]. "<br />";
    echo "Títol: " .$_SESSION["UsuariMostrar"]["title"]. "<br />";
    echo "Telèfon : ". $_SESSION["UsuariMostrar"]["telephonenumber"] ."<br />";
    echo "Telèfon mòbil: ". $_SESSION["UsuariMostrar"]["mobile"]. "<br />";
    echo "Codi postal: ". $_SESSION["UsuariMostrar"]["postaladdress"] ."<br />";
    echo "loginShell :".$_SESSION["UsuariMostrar"]["loginShell"] ."<br />";
   echo "gidNumber: ". $_SESSION["UsuariMostrar"]["gidnumber"] ."<br />";
   echo "uidNumber: ". $_SESSION["UsuariMostrar"]["uidnumber"] ."<br />";
   echo "directory home: ". $_SESSION["UsuariMostrar"]["homedirectory"] ."<br />";
   echo "descripcio: ". $_SESSION["UsuariMostrar"]["description"] ."<br />";
        } 

        echo "<a href='http://localhost/phpldap/Opcions.php'> Tornar al menú</a>";

?>


