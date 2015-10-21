<!DOCTYPE html>
<html>
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/pResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		
		<?php
		# Ex 4 : 
		# Check the existance of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		# if (){
		?>

		<!-- Ex 4 : 
			Display the below error message : 
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. Try again?</p>
		--> 

		<?php
		# Ex 5 : 
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		# } elseif () { 
		?>

		<!-- Ex 5 : 
			Display the below error message : 
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>
		--> 

		<?php
		# Ex 5 : 
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5. 
		# } elseif () {
		?>

		<!-- Ex 5 : 
			Display the below error message : 
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>
		--> 

		<?php
		if( !isset($_POST['name']) || !isset($_POST['id']) || !isset($_POST['courses']) || !isset($_POST['choice']) || !isset($_POST['credit']) || !isset($_POST['card']) || trim($_POST['name']) == '' || trim($_POST['id']) == '' || trim($_POST['credit']) == '') { ?>
			<h1>Sorry</h1>
			<span>You didn't fill out the form completely. <a href="http://localhost:8888/Lab06/gradestore/gradestore.html">Try again?</a></span>
		<?php 
		} 
		elseif ( !preg_match("/^[a-zA-Z]+\s?(-[a-zA-Z]+)*$/", $_POST['name']) ){ ?>
			<h1>Sorry</h1>
			<span>You didn't provide a valid name. <a href="http://localhost:8888/Lab06/gradestore/gradestore.html">Try again?</a></span>
		<?php }
		elseif ( !preg_match("/[0-9]{16}/", $_POST['credit'])  ) { ?>
			<h1>Sorry</h1>
			<span>You didn't provide a valid credit card number. <a href="http://localhost:8888/Lab06/gradestore/gradestore.html">Try again?</a></span>
		<?php }

		if ($_POST['card'] === "Visa") {
			# code...
			if ( !preg_match("/^4/", $_POST['credit']) ) { ?>
				<h1>Sorry</h1>
				<span>You didn't provide a valid credit card number. <a href="http://localhost:8888/Lab06/gradestore/gradestore.html">Try again?</a></span>
			<?php }
				return;
		}

		if ($_POST['card'] === "MasterCard") { 
			# code...
			if ( !preg_match("/^5/", $_POST['credit']) ) { ?>
				<h1>Sorry</h1>
				<span>You didn't provide a valid credit card number. <a href="http://localhost:8888/Lab06/gradestore/gradestore.html">Try again?</a></span>
			<?php }
			return;
		}
		else { ?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		
		<!-- Ex 2: display submitted data -->
		<?php print_r($_POST); ?>
		<ul> 
			<li>Name: <?=$_POST['name']?> </li>
			<li>ID: <?=$_POST['id']?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?=processCheckbox($_POST['courses'])?></li>
			<li>Grade: <?=$_POST['choice']?></li>
			<li>Credit Card: <?=$_POST['credit']." (".$_POST['card'].")"?></li>
		</ul>
		
		<!-- Ex 3 : 
			<p>Here are all the loosers who have submitted here:</p> -->
		<?php
			$filename = "loosers.txt";
			/* Ex 3: 
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */

			$current = file_get_contents($filename);
			$current .= $_POST['name'].";".$_POST['id'].";".$_POST['credit'].";".$_POST['card'].PHP_EOL;
			file_put_contents($filename, $current);
			
			$tmp = file_get_contents($filename);
		?>
		
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->
			 <pre>
Here are all the loosers who have submitted here:

<?=$tmp?>

			 </pre>
		<?php
		}
		?>
		
		<?php
			/* Ex 2: 
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 * 
			 * The function checks whether the checkbox is selected or not and 
			 * collects all the selected checkboxes into a single string with comma seperation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){ 
				$str = implode(",", $names);
				return $str;
			}
		?>
		
	</body>
</html>
