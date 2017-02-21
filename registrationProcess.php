<?php
	require 'dbh.php';
	session_start();
	$name = $mysqli->escape_string($_POST['name']);
	$pass = $mysqli->escape_string($_POST['pass']);
	$repass = $mysqli->escape_string($_POST['repass']);
	$email = $mysqli->escape_string($_POST['email']);


	if($pass==$repass){
		$pass = password_hash($pass, PASSWORD_BCRYPT);
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