<?php
include "loggedin.php"; 
if(isset($_POST['addtopicblog']))
{
    $tname=$_POST['topicname'];
     $sql1 = "INSERT INTO `topic` (`tid`, `tname`, `ttype`) VALUES (NULL, '$tname', 'Blogs');";
                                                          if ($conn->query($sql1) === TRUE) 
                                                                  {
                                                                      echo "<script>alert('Record created!');</script>";
                                                                  } 
                                                          else 
                                                          {
                                                                      echo "<script>alert('Error creating record!');</script>";
                                                          }
}
if(isset($_POST['addtopicarticles']))
{
    $tname=$_POST['topicname'];
     $sql1 = "INSERT INTO `topic` (`tid`, `tname`, `ttype`) VALUES (NULL, '$tname', 'Articles');";
                                                          if ($conn->query($sql1) === TRUE) 
                                                                  {
                                                                      echo "<script>alert('Record created!');</script>";
                                                                  } 
                                                          else 
                                                          {
                                                                      echo "<script>alert('Error creating record!');</script>";
                                                          }
}
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
  <li  class="active"><a href="/dashbord.php">Dashbord</a></li>
  <li><a href="/getimg.php">Get Images</a></li>
</ul></div>
<div class="col-sm-1"></div>
<div class="col-sm-6">
    <div class="col-sm-5">
        <h2>Add Blog List</h2>
            <form method="post" action="#" style="width:100%;">
                    <div class="form-group">
                      <label for="topicname">Topic Name : </label>
                      <input type="text" class="form-control" name="topicname" placeholder="Enter Topic Name">
                    </div>
                    <button type="submit" class="btn btn-default" name="addtopicblog">Submit</button><hr>
            </form>
    </div>
        <div class="col-sm-2"></div>
    <div class="col-sm-5">
        <h2>Add Article List</h2>
            <form method="post" action="#" style="width:100%;">
                    <div class="form-group">
                      <label for="topicname">Topic Name : </label>
                      <input type="text" class="form-control" name="topicname" placeholder="Enter Topic Name">
                    </div>
                    <button type="submit" class="btn btn-default" name="addtopicarticles">Submit</button><hr>
            </form>
    </div> 

    <?php 
             $sql="SELECT * FROM topic";
             $result = $conn->query($sql);

              if ($result->num_rows > 0) 
              {
                  echo '<table class="table table-hover">
    <thead>
      <tr>
        <th>Topic Id</th>
        <th>Topic Name</th>
        <th>Topic Type</th>
        <th></th>
      </tr>
    </thead>
    <tbody>';
                  while($row = $result->fetch_assoc()) {
                  echo "<tr><td>".$row['tid']."</td><td><a href='./topic.php?id=".$row['tid']."'>".$row['tname']."</a></td><td>".$row['ttype']."</td><td><a href='./delete.php?id=".$row['tid']."'>Delete Topic</a></td></tr>";
                                                  }
              }
              else 
              echo "No Records Found!"
    ?>
    </tbody>
  </table>
</div>
<div class="col-sm-3" ></div>
</div>
    </body>
    </html>
