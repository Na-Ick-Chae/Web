<?php
require_once('timeline.php');

# Ex 5 : Delete a tweet
try {
	$timeline = new TimeLine;
	$timeline->delete($_POST['no']);
	header("Location:index.php");   
    /*
    call delete function
    header("Location:index.php");
    */
} catch(Exception $e) {
	header("Loaction:error.php");
}
?>
