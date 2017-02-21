<?php
	require 'dbh.php';
  	session_start();
	if($_SESSION['logged_in']==true){
		if(isset($_POST['delete'])){
			$tid = $_POST['threadId'];
			$result = $mysqli->query("SELECT threads.title,threads.body,threads.post_date,threads.posted_by,threads.topic FROM threads WHERE threads.id='$tid'");
			$thread = $result->fetch_assoc();
			if($thread['posted_by']==$_SESSION['userid']){
				$sql = "DELETE FROM threads WHERE threads.id = '$tid'";
				if ($mysqli->query($sql)){
					header("Location:index.php");
				}else{
					$_SESSION['emessage'] = "Cannot update database";
		   			 header("location: error.php");
				}
			}else{
				$_SESSION['emessage'] = "You cannot delete someone else's post";
            	header("location: error.php");
			}
		}
	}else{
		$_SESSION['emessage'] = "You are not logged in";
        header("location: error.php");
	}
?>