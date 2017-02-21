<?php
	require 'dbh.php';
  	session_start();
	if(isset($_POST['post'])){
		$title = $_POST['title'];
		$topic = $_POST['formTopic'];
		$body = $_POST['body'];
		$posted_by = $_SESSION['userid'];
		$date = date("Y/m/d");

		$sql = "INSERT INTO threads (id, title, body, post_date, posted_by, topic) VALUES (NULL, '$title', '$body', '$date', '$posted_by', '$topic')";

		if ($mysqli->query($sql)){
			header("Location:index.php");
		}else{
			$_SESSION['emessage'] = "Cannot update database";
		    header("location: error.php");
		}
	}
?>