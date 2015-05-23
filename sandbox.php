<?php
	try {
	    $dbh = new PDO("mysql:host=127.0.0.1;dbname=phpsandbox", "phpsandbox", "phpsandbox");
	}
	catch(PDOException $e) {
	    echo $e->getMessage() . "\n";
	    exit();
	}

	// $sql = 'select * from photoman_user';
	$sql = 'select * from photoman_user where username = :username and password = md5(:password)';
	echo $sql . '\n';
	$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$sth->execute(array(
		':username' => 'scott', 
		':password' => 'password'));
	$result = $sth->fetchAll();
	var_dump($result);
	echo $result[0]['user_id'] . "\n";
?>