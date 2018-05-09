<?php
session_start();
    if(isset($_POST['login'])){
          if($_POST['uname']!=NULL && $_POST['pwd']!=NULL){
          include "connection.php";
          $uname=strtolower($_POST['uname']);
          $pwd=$_POST['pwd'];
    

          $sql="SELECT * FROM users where uname='$uname' && pwd='$pwd'";
          $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $_SESSION['uname']=$uname;
                $_SESSION['pwd']=$pwd;
                header("Location:./dashbord.php");  
                
              }

              else 
                echo "<p>Invalid username or password</p>";
          
    }

  else 
      echo "<p>Cannot be NULL</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
    <div class="col-sm-4" ></div>
    <div class="col-sm-4" style="text-align: center;">
    <h1>Admin Login</h1>
  <form method="post" action="#" style="width:100%;">
    <div class="form-group">
      <label for="Username">Username:</label>
      <input type="uname" class="form-control" name="uname" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  name="pwd" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-default" name="login">Submit</button>
  </form>

</div>
<div class="col-sm-4"></div>

</div>
</body>
</html>

