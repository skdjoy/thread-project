<?php
	require 'dbh.php';
	session_start();

	if($_SESSION['logged_in']==true){

		$date = date("Y/m/d");
		$username = $_SESSION['username'];
		$tid = $_POST['tid'];
		$comment = $_POST['body'];

		$result = $mysqli->query("SELECT users.id FROM users WHERE users.username='$username'");

		$uid = $result->fetch_assoc()['id'];

		$sql = "INSERT INTO comments (id, body, posted_by, post_date, thread_id) VALUES (NULL, '$comment', '$uid', '$date', '$tid')";

		if ($mysqli->query($sql)){
			header("Location:thread.php?tid=".$tid);
		}else{
			$_SESSION['emessage'] = "Cannot update database";
		    header("location: error.php");
		}

	}else{
		$_SESSION['emessage'] = "You are not logged in";
	    header("location: error.php");
	}

	
?>