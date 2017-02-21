<?php
	require 'dbh.php';
	session_start();
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	$email = $_POST['email'];


	if($pass==$repass){
		$sql = "INSERT INTO users (id, username, password, email) VALUES (NULL,'$name','$pass','$email')";
		if ($mysqli->query($sql)){
			echo 'Your registration is complete<br>';
			echo '<a href="index.php"><button class="button button-block"/>Home</button></a>';
		}else{
			$_SESSION['emessage'] = "Cannot update database";
		    header("location: error.php");
		}
	}else{
		$_SESSION['emessage'] = "Password did not match";
		header("location: error.php");
	}

?>