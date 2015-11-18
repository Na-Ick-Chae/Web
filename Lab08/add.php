<?php
require_once('timeline.php');
    # Ex 4 : Write a tweet
    try {
        $timeline = new TimeLine;
        $timeline->add(array("author" => $_POST['author'], "contents" => $_POST['content']));
        header("Location:index.php");        /*
        if () { validate author & content
            call add function
            header("Location:index.php"); redirect to index.php 마지막
        } else {
            header("Loaction:error.php");
        }
        */
    } catch(Exception $e) {
        header("Loaction:error.php");
    }
?>
