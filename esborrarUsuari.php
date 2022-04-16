<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);
	#
	# Entrada a esborrar: 
	$uid = $_POST['uid'];
	$unorg = $_POST['unorg'];
	$dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
	#
	#Opcions de la connexió al servidor i base de dades LDAP
	$opcions = [
		'host' => 'zend-macasa.fjeclot.net',
		'username' => 'cn=admin,dc=fjeclot,dc=net',
		'password' => 'fjeclot',
		'bindRequiresDn' => true,
		'accountDomainName' => 'fjeclot.net',
		'baseDn' => 'dc=fjeclot,dc=net',		
	];
	#
	# Esborrant l'entrada
	#
	$ldap = new Ldap($opcions);
	$ldap->bind();
	try{
	    $ldap->delete($dn);
	    echo "<b>Entrada esborrada</b><br>"; 
	} catch (Exception $e){
	   echo "<b>Aquesta entrada no existeix</b><br>";
	}
?>
<html>
	<head>
		<title>
			Esborrar Usuari
		</title>
	</head>
	<body>
		<h2>Esborrar Usuari</h2>
		<form action="http://zend-macasa.fjeclot.net/projecteM08/esborrarUsuari.php" method="POST">
			UID: <input type="text" name="uid"><br>
			Unitat Organitzativa: <input type="text" name="unorg"><br>
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" />
		</form>
	</body>
</html>
