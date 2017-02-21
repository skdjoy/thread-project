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
            <li><a href="/index.php">Home</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="post.php">Post</a></li>
          </ul>

          <?php
          if($_SESSION['logged_in']==true){
            echo '<strong class="navbar-right">You are Logged in as '.$_SESSION['username'].' <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a></strong>';
          }else{
            $_SESSION['emessage'] = "You cannot post new threads without logging in";
            header("location: error.php");
          } 
          ?>

        </div>
      </div>
    </nav>
    <div id="newThread" style="padding-left: 30px; padding-right: 30px">
    <form style="padding-left: 20px" action="newPostProcess.php" method="POST">
      Enter Title:<br>
      <input type="text" id="title" name="title"><br><br>
      Select topic: 
      <select name="formTopic">
      <option value="">Select...</option>
      <option value="Programming">Programming</option>
      <option value="Others">Others</option>
      </select><br><br>
      <textarea rows="4" cols="50" name="body">Enter here...</textarea><br><br>
      <input type="submit" id="btn" name="post" value="Post Thread">
    </form>
    </div>
  </body>
</html>
