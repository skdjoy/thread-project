<?php
	require 'dbh.php';
	session_start();
	$result = $mysqli->query("SELECT threads.id,threads.title,threads.post_date,users.username FROM threads INNER JOIN users ON threads.posted_by=users.id");
	echo '<h3>Thread List</h3>';
	while($thread = $result->fetch_assoc()){

		echo '<div class="panel panel-default">';
		echo '<div class="panel-heading"><a href="thread.php?tid=' . $thread['id'] . '">'.$thread['title'].'</a></div>';
		echo '<div class="panel-body">';
		echo '<p>Posted by '.$thread['username'].' on '.$thread['post_date'].'</p>';
		echo '<form style="float:left" action="edit.php" method="POST"><input type="submit" id="btn" name="edit" value="Edit"><input type="hidden" name="threadId" value="'.$thread['id'].'"></form>';
		echo '<form action="delete.php" method="POST"><input type="submit" id="btn" name="delete" value="Delete"><input type="hidden" name="threadId" value="'.$thread['id'].'"></form>';
		echo '</div></div>';

		 //print_r($thread);
		// echo '<br>';
	}
?>