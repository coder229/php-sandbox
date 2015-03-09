
<!DOCTYPE html>
<html>
		<head>
			
			<!--
			PHP==Dynamic Web Applications
			Section: 31845
			Author:  Jeff Allaire
			Date: 2/20/15			
		-->			
			
			<title>Today's Date</title>
			<meta charset="UTF-8" />
			<script src="modernizr-1.5.js"></script>
			
		</head>

<body>

<?php


//Set a variable to the current date using the date() function in the 'm/d/y' format.

		$todaysDate = date('m/d/y');
		
//print todays date in a centered <h1> heading.
		
		echo("<h1 align='center' >$todaysDate</h4>");
		
		
?>
	
</body>
	
</html>
