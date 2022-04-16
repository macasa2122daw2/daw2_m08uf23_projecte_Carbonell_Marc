<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);
	if($_GET['ou'] && $_GET['usr']){	    
	    
	    $atribut=$_GET['atribut']; 
    	$valor=$_GET['valor'];
    	#
    	# Entrada a modificar
    	#
    	$uid = $_GET['usr'];
    	$unorg = $_GET['ou'];
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
    	# Modificant l'entrada
    	#
    	$ldap = new Ldap($opcions);
    	$ldap->bind();
    	$entrada = $ldap->getEntry($dn);
    	if ($entrada){
    		Attribute::setAttribute($entrada,$atribut,$valor);
    		$ldap->update($dn, $entrada);
    		echo "Entrada modificada"; 
    	}
	}else echo "<b>Aquest usuari no existeix</b><br><br>";
	
?>

<html>
	<head>
		<title>MOSTRANT DADES D'USUARIS DE LA BASE DE DADES LDAP</title>
	</head>
	<body>
		<form action="http://zend-macasa.fjeclot.net/projecteM08/modificarUsuari.php" method="GET">
			Unitat organitzativa: <input type="text" name="ou"><br>
			Usuari: <input type="text" name="usr"><br><br><br>
			
			Selecciona l'atribut que vols modificar: 
			<input type="radio" name="atribut" value="uidNumber">uidNumber<br>
			<input type="radio" name="atribut" value="gidNumber">gidNumber<br>
			<input type="radio" name="atribut" value="homeDirectory">Directori personal<br>
			<input type="radio" name="atribut" value="loginShell">Shell<br>
			<input type="radio" name="atribut" value="cn">cn<br>
			<input type="radio" name="atribut" value="sn">sn<br>
			<input type="radio" name="atribut" value="givenName">givenName<br>
			<input type="radio" name="atribut" value="postalAddress">PostalAdress<br>
			<input type="radio" name="atribut" value="mobile">Movil<br>
			<input type="radio" name="atribut" value="telephoneNumber">Telefon<br>
			<input type="radio" name="atribut" value="title">Title<br>
			<input type="radio" name="atribut" value="description">Descripcio<br><br>
			
			Valor: <input type="text" name="valor"><br>
			
			
			<input type="submit"/>
		</form>
		<a href="http://zend-macasa.fjeclot.net/projecteM08/menu.php">Torna a la pàgina inicial</a>

		
	</body>
</html>
