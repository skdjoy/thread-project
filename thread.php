<?php 
  require 'dbh.php';
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>

  <body style="padding-top: 70px">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">THREADS</a>
        </div>
        <div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="post.php">Post</a></li>
          </ul>

          <?php
          if($_SESSION['logged_in']==true){
            echo '<strong class="navbar-right">You are Logged in as '.$_SESSION['username'].' <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a></strong>';
          }else{
            echo '<button type="button" class="btn btn-default navbar-btn navbar-right" onclick="window.location.href='."'login.php'".'">Login</button>';
            echo '<button type="button" class="btn btn-default navbar-btn navbar-right" onclick="window.location.href='."'register.php'".'">Register</button>';
          } 
          ?>

        </div>
      </div>
    </nav>
    <div id="thread" style="padding-left: 30px; padding-right: 30px">
      <?php
        $tid = $_GET['tid'];
        $result = $mysqli->query("SELECT threads.title,threads.body,threads.post_date,users.username FROM threads INNER JOIN users ON threads.posted_by=users.id WHERE threads.id='$tid'");
        $thread=$result->fetch_assoc();
        echo '<h3>'.$thread['title'].'</h3>';
        echo '<table style="width:100%" class="table-bordered">';
        echo'<tr>';
        echo '<td style="padding: 10px"><strong>'.$thread['username'].'</strong></td>';
        echo '<td style="padding-left: 10px"><p>'.$thread['body'].'</p><p>Posted on '.$thread['post_date'].'</p></td>';
        echo'</tr>';
        $result = $mysqli->query("SELECT comments.body,comments.post_date,users.username FROM comments INNER JOIN users ON comments.posted_by=users.id WHERE comments.thread_id='$tid' ORDER BY post_date ASC");
        while($comment=$result->fetch_assoc()){
          echo'<tr>';
          echo '<td style="padding: 10px"><strong>'.$comment['username'].'</strong></td>';
          echo '<td style="padding-left: 10px"><p>'.$comment['body'].'</p><p>Posted on '.$comment['post_date'].'</p></td>';
          echo'</tr>';
        }
        echo '</table>';
      ?>
    </div>
    <br>
    <div id="comment" style="padding-left: 30px; padding-right: 30px">
      <form action="commentProcess.php" method="POST">
        <textarea rows="4" cols="50" name="body">Enter comment here...</textarea><br><br>
        <input type="submit" name="comment" value="Post Comment">
        <?php
          echo '<input type="hidden" name="tid" value="'.$tid.'">' 
        ?>
      </form>
    </div>

  </body>
</html>
