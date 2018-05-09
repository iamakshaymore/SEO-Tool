<?php
include "loggedin.php"; 
$id=$_GET['id'];
  if(isset($_POST['update'])){

    $lrank=$_POST['lrank'];
    $lname=str_replace("'","&#039;",$_POST['lname']);
    $llink=$_POST['llink'];
    $ldesc=str_replace("'","&#039;",$_POST['ldesc']);
    $lauthor=$_POST['lauthor'];
    $lfb=$_POST['lfb'];
    $ltwt=$_POST['ltwt'];
    $lemail1=$_POST['lemail1'];
    $lemail2=$_POST['lemail2'];
    $sql1="UPDATE `list` SET lname ='$lname',llink = '$llink',ldesc = '$ldesc',lauthor = '$lauthor',lfb = '$lfb',ltwt = '$ltwt',lemail1 = '$lemail1',lemail2 = '$lemail2'  WHERE lid=$id ;";
                                                          if ($conn->query($sql1) === TRUE) 
                                                                  {
                                                                      echo "<script>alert('Record updated!');</script>";
                                                                  } 
                                                          else 
                                                          {
                                                                      echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
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
  <li><a href="/dashbord.php">Dashbord</a></li>
  <li><a href="/getimg.php">Get Images</a></li>
</ul></div>
<div class="col-sm-1"></div>
<div class="col-sm-6">
    
        <h2>Update Entry</h2>
         <?php 
             $sql="SELECT * FROM `list` Where lid=$id;";
             $result = $conn->query($sql);

              if ($result->num_rows > 0) 
              {
                  while($row = $result->fetch_assoc()) {
                    ?>
                    <form method="post" action="#" style="width:100%;" enctype="multipart/form-data" id="topicform">

                    <div class="form-group">
                      <label for="name">Name : </label>
                      <input type="text" value="<?php echo $row['lname']; ?>" class="form-control" name="lname" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label for="llink">Link : </label>
                      <input type="url" class="form-control" value="<?php echo $row['llink']; ?>" name="llink" placeholder="Enter Link">
                    </div>
                    <div class="form-group">
                      <label for="desc">Description : </label>
                    <textarea rows="4" cols="50" name="ldesc" form="topicform" value="<?php echo $row['ldesc']; ?>" class="form-control"><?php echo $row['ldesc']; ?></textarea>                    
                    </div>
                    <div class="form-group">
                      <label for="author">Author Name : </label>
                      <input type="text" class="form-control" value="<?php echo $row['lauthor']; ?>" name="lauthor" placeholder="Enter Author Name">
                    </div>
                    <div class="form-group">
                      <label for="fb">Facebook Link : </label>
                      <input type="text" class="form-control" name="lfb" value="<?php echo $row['lfb']; ?>" placeholder="Enter FB Link">
                    </div>
                    <div class="form-group">
                      <label for="twt">Twitter Link : </label>
                      <input type="text" class="form-control" name="ltwt" value="<?php echo $row['ltwt']; ?>" placeholder="Enter Twitter Link">
                    </div>
                    <div class="form-group">
                      <label for="desc">Email 1 : </label>
                      <input type="email" class="form-control" value="<?php echo $row['lemail1']; ?>" name="lemail1" placeholder="Enter Email 1">
                    </div>
                    <div class="form-group">
                      <label for="desc">Email 2 : </label>
                      <input type="email" class="form-control" name="lemail2" value="<?php echo $row['lemail2']; ?>" placeholder="Enter Email 2">
                    </div>
                    <button type="submit" name="update" class="btn btn-success">Update record</button>
            </form>
                    <?php
                    
                      
                      
                                                  }
              }
              else 
              echo "No Records Found!"
    ?>
            
    
</div>
<div class="col-sm-3" ><h1><a href='./view.php?id=<?php echo $id; ?>'><button type="submit" class="btn btn-success" style="width:90%">View Html for this Post</button></a></h1></div>
</div>

   

</div>
    </body>
    </html>