<?php
	try {
	    $dbh = new PDO("mysql:host=". $config["db"]["host"] . ";dbname=". $config["db"]["dbname"], 
	        $config["db"]["username"], $config["db"]["password"]);
	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	    exit();
	}

	$sql = 'select * from photoman_user where username = :username and password = md5(:password)';
	$sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$sth->execute(array(
		':username' => $_POST['username'], 
		':password' => $_POST['password']));
	$result = $sth->fetchAll();
	$userId = $result[0]['user_id'];

	$_SESSION['USER_ID'] = $userId;

    setcookie('accessToken', 'user' . $userId, time()+60*60*24);

	session_start();
    header("Location: " . $_SESSION['REQUEST_URI']);
    exit();
?>