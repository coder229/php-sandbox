
<!DOCTYPE html>
<html>
		<head>
			
			<!--
			PHP==Dynamic Web Applications
			Section: 31845
			Author:  Jeff Allaire
			Date: 2/20/15			
		-->			
			
			<title>Random Numbers</title>
			<meta charset="UTF-8" />
			<script src="modernizr-1.5.js"></script>
			
		</head>

<body>

<?php

//Part of a project I did for my class

//Create two variables  and set them to two random numbers using mt_rand()	
	//Display the two variable with a sentence describing them.
	
		$randomNumber = mt_rand(1,52);		
		echo("<h4>The first random number is: $randomNumber</h4>");
		
		$secondNumber = mt_rand(1,52);
		echo ("<h4>The second random number is: $secondNumber</h4>");
		
	//Use an if statement to display which of the two numbers is largest.

		if($randomNumber == $secondNumber)
		{	
			echo("<h4>The numbers are the same.</h4>");
		}

		else if($randomNumber > $secondNumber)
		{
		echo("<h4>The first number is the largest.</h4>");
		}

		else {
		echo("<h4>The second number is the largest.</h4>");
		}
	
	//Divide the two numbers and display the answer.
	//Display the answer again but formatted to three decimal spaces.
	
		$quotient =  $randomNumber / $secondNumber;
		$quotientFormatted = number_format($quotient, 3);

		echo("<h4>The first number divided by the second yields: $quotient</h4>");
		echo("<h4>That number rounded to three decimal places is: $quotientFormatted");
		
		?>
  </body>
  
  </html>
