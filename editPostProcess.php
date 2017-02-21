<?php
	require 'dbh.php';
  	session_start();
	if(isset($_POST['post'])){
		$title = $_POST['title'];
		$topic = $_POST['formTopic'];
		$body = $_POST['body'];
		$date = date("Y/m/d");
		$tid = $_POST['threadId'];

		$sql = "UPDATE threads SET title='$title',body='$body',post_date='$date',topic='$topic' WHERE id = '$tid'";

		if ($mysqli->query($sql)){
			header("Location:index.php");
		}else{
			$_SESSION['emessage'] = "Cannot update database";
		    header("location: error.php");
		}
	}
?>