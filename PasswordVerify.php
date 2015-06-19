

<?php

$OneHour = 60 * 60;
session_set_cookie_params($OneHour);

session_start();

if(!isset($_SESSION['LoggedInCustID']))

	{	

	if(empty($_GET["txtCustomerID"]))
	{
		showForm();
		exit();
	}

	else {$CustomerID = $_GET["txtCustomerID"];}
	
	
	if(empty($_GET["txtPassword"]))
	{
		showForm();
		exit();
	}
	
	
	
	else {$PasswordForm = $_GET["txtPassword"];}
	
	
	//Validate password
	
	if($PasswordForm != Password($CustomerID, $FirstName))
	{
		showForm("Invalid password");
		exit();
		
	}
	
	
	setcookie('FirstName', $FirstName, strtotime('+1 week'), "/500141777");
	$_SESSION['LoggedInCustID']= $CustomerID;
	}
	function Password($CustomerID, &$FirstName)
	{
		
		$dsn = 'mysql:host=itsql.fvtc.edu;dbname=31845_500141777';
			$username = '31845_500141777';
			$password = '31845_500141777';
			
			try{
			
			$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);  //Associative array
			
			$db = new PDO($dsn,$username,$password,$options);  //PDO object to create the connection to the server and DB
			
			$SQL = $db->prepare('Select Password,  FirstName from CustomerInfo where CustomerID = :CustomerID');
			$SQL->bindValue(":CustomerID", $CustomerID);
			$SQL->execute();
			$Customer=$SQL->fetch();
			
			if($Customer===false)
			{
				$Password = null;
			}
			else {
				$Password = $Customer['Password'];
				$FirstName= $Customer['FirstName'];
			}
			
					
			return $Password;
			
			$SQL->closeCursor();  
			$db=null;  
				
		}catch(PDOException $e){
			
			$error_message=$e->getMessage();
			echo("<p>Database error: $error_message<p>");
			exit();
		}
			
			
	}
	
	
	
	
	function showForm($msg="Please Log In")
	{?>
		<html>
	
	<head>
		
		<meta charset="UTF-8" />
		<title>Password Verification</title>
		<script src="modernizr-1.5.js"></script>
		<link href="../CSS/FormLayout2.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			
			#caption {
				font-family:Verdana, Geneva, Arial, Helvetica, sans-serif;
				font-weight:bold;
				font-size:14px;
				color:red;
				text-align:right;
			}
			
			
		</style>	
		
	</head>
	
	<body>
		
		<div id="Container">
			
			<h1 style="text-align: center">Pizza Man Delivery</h1>
			
		<div id="Logo">
			<img src="../images/delivery_man.jpg" style="float:left" alt=""width="125px"/>
				
						
		</div>	<!--End of Logo-->
			
		<div id="OrderForm">
			
			<div id="caption"><?=$msg?></div>
			
			<form method="get" action="">
				
			
				
				<div id="FormFields">
					
					<img src="../images/padlock.gif" style="float:right" width="50px"/>
					
					<label for="txtCustomerID">Customer ID</label>
					<input type="text" name="txtCustomerID" id="txtCustomerID">
					
					<label for="txtPassword">Password</label>
					<input type="password" name="txtPassword" id="txtPassword"					
					
				</div> <!--End of FormFields-->
				
				<div id="FormButtons">
					
					<input type="submit" value="Log In"/>
					<input type="reset"/>
										
				</div> <!--End of FormButtons-->
				
			</form>		
			
		</div>	<!--End of Order Form-->	
			
			
		</div> <!--End of Container-->		
		
		
	</body>	
	
	
</html>
<?php
}
?>

	



