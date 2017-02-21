<?php 
  /* Main page with two forms: sign up and log in */
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
          <button type="button" class="btn btn-default navbar-btn navbar-right" onclick="window.location.href='/login.php'">Login</button>
          <button type="button" class="btn btn-default navbar-btn navbar-right" onclick="window.location.href='register.php'">Register</button>
        </div>
      </div>
    </nav>
    <form style="padding-left: 20px" action="registrationProcess.php" method="POST">
      Enter new user name:<br>
      <input type="text" id="name" name="name"><br>
      Enter user password:<br>
      <input type="password" id="pass" name="pass"><br>
      Re-Enter user password:<br>
      <input type="password" id="pass" name="repass"><br>
      Enter user email:<br>
      <input type="text" id="name" name="email"><br><br>
      <input type="submit" id="btn" name="register" value="Register">
    </form>
  </body>
</html>
