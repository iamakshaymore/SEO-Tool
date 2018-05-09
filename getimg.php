<?php
include "loggedin.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashbord</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div style="text-align: right; margin: 15px 15px 25px 0px;">
<a href="logout.php"><button type="submit" class="btn btn-primary" name="logout" >logout</button></a>
</div>
    <div class="row">
    <div class="col-sm-2" >
  <ul class="nav nav-pills nav-stacked">
  <li><a href="/dashbord.php">Dashbord</a></li>
  <li class="active"><a href="/getimg.php">Get Images</a></li>

</ul></div>
<div class="col-sm-1"></div>
<div class="col-sm-6">
    <div class="col-sm-5">
        <h2>Get Blog Image</h2>
<form action="#" method="POST">
    <div class="form-group">
      <label for="link">URL to Grab :  </label>
      <input type="link" class="form-control" placeholder="Enter url" name="link">
    </div>
        <button type="submit" class="btn btn-default" name="getlink">Submit</button>
</form>
<?php
if (isset($_POST['getlink'])) {
echo "get image <a href='https://api.thumbnail.ws/api/abbbaea9f7e2f277ef67c357fab9f7eb6179aaf04537/thumbnail/get?url=".$_POST['link']."&width=640'>here</a>";
 } 
?>
</div>
<div class="col-sm-3" ></div>
</div>
    </body>
    </html>