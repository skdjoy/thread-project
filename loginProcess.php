<?php
	require 'dbh.php';
	session_start();
	$user = $mysqli->escape_string($_POST['name']);
	echo $user;
	$result = $mysqli->query("SELECT * FROM users WHERE username='$user'");

	if ( $result->num_rows == 0 ){ // User doesn't exist
	    $_SESSION['emessage'] = "User with that username doesn't exist!";
	    header("location: error.php");
	}

	else { // User exists
		$pass = $mysqli->escape_string($_POST['pass']);
	    $user = $result->fetch_assoc();

	    if (password_verify($pass,$user['password'])){
	        
	        $_SESSION['email'] = $user['email'];
	        $_SESSION['username'] = $user['username'];
	        $_SESSION['userid'] = $user['id'];
	        // This is how we'll know the user is logged in
	        $_SESSION['logged_in'] = true;
	        header("location: index.php");
	    }
	    else {
	        $_SESSION['emessage'] = "You have entered password ".$pass." and username ".$user['username'];
	        header("location: error.php");
	    }
	}

?>
