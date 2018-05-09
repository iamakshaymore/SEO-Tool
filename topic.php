<?php
include "loggedin.php"; 
$id=$_GET['id'];
if(isset($_POST['update']))
{
    $id=$_GET['id'];
    $lbadge=$_POST['lbadge'];
    $lcstatus=$_POST['lcstatus'];
    $lrank=$_POST['lrank'];
    $lid=$_POST['lid'];
    $clrank=$_POST['clrank'];
    
    if($clrank!=$lrank)
    
    
    {
        if($lrank>$clrank)
        {
        $sql="SELECT * FROM `list` Where tid=$id ORDER BY lrank ASC";
        $result = $conn->query($sql);
                      if ($result->num_rows > 0) 
                        {
                            while($row = $result->fetch_assoc())
                            {
                            if($row['lrank']>$clrank&&$row['lrank']<=$lrank )
                            {
                                $nlrank=$row['lrank']-1;
                                $nlid=$row['lid'];
                                $sql2="UPDATE `list` SET lrank = $nlrank WHERE lid=$nlid ;";
                                $conn->query($sql2);
                            }
                            }
                        }
                $sql="UPDATE `list` SET lrank = $lrank  WHERE lid=$lid ;";
                $conn->query($sql);
            }
            
        if($lrank<$clrank)
        {
        $sql="SELECT * FROM `list` Where tid=$id ORDER BY lrank ASC";
        $result = $conn->query($sql);
                      if ($result->num_rows > 0) 
                        {
                            while($row = $result->fetch_assoc())
                            {
                            if($row['lrank']>=$lrank&&$row['lrank']<$clrank )
                            {
                                $nlrank=$row['lrank']+1;
                                $nlid=$row['lid'];
                                $sql2="UPDATE `list` SET lrank = $nlrank WHERE lid=$nlid ;";
                                $conn->query($sql2);
                            }
                            }
                        }
                $sql="UPDATE `list` SET lrank = $lrank  WHERE lid=$lid ;";
                $conn->query($sql);
            }
    
    
    }
                $sql2="UPDATE `list` SET lcstatus = '$lcstatus',lbadge = '$lbadge'  WHERE lid=$lid ;";
                $conn->query($sql2);

        
   
}

   if(isset($_POST['addtopicdb'])){
$url    = $_POST['llink'];
$apikey = "abbbaea9f7e2f277ef67c357fab9f7eb6179aaf04537";
$width  = 640;
$fetchUrl = "https://api.thumbnail.ws/api/".$apikey ."/thumbnail/get?url=".urlencode($url)."&width=".$width;


    $ch = curl_init ($fetchUrl);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $raw=curl_exec($ch);
    curl_close ($ch);
    $file_name=$id.$_POST['lrank']."img.jpg";
    
      
      $di="images/".$id."/".$file_name;

        $dir="images/".$id;
        if( is_dir($dir) === false )
        {
         mkdir($dir);
        }
    file_put_contents($dir."/".$file_name, $raw);
    $liurl="./".$dir."/".$file_name;
    $lrank=$_POST['lrank'];
    $lname=str_replace("'","&#039;",$_POST['lname']);
    $llink=$_POST['llink'];
    $ldesc=str_replace("'","&#039;",$_POST['ldesc']);
    $lauthor=$_POST['lauthor'];
    $lfb=$_POST['lfb'];
    $ltwt=$_POST['ltwt'];
    $lemail1=$_POST['lemail1'];
    $lemail2=$_POST['lemail2'];
    $sql1 = "INSERT INTO `list` (`lid`, `tid`, `lrank`, `lname`,`llink`, `liurl`, `ldesc`, `lauthor`, `lfb`, `ltwt`, `lemail1`, `lemail2`, `lcstatus`, `lbadge`) VALUES (NULL,$id, $lrank, '$lname','$llink','$liurl', '$ldesc', '$lauthor','$lfb', '$ltwt', '$lemail1', '$lemail2', 'Not Done', 'Not Added');";
                                                          if ($conn->query($sql1) === TRUE) 
                                                                  {
                                                                      echo "<script>alert('Record created!');</script>";
                                                                  } 
                                                          else 
                                                          {
    echo "Error: " . $sql . "<br>" . $conn->error;                                                          
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
  <style>
  .form-control {
    width: 80%!important;}
DIV.table 
{
    display:table;
    padding-left:15px;
    padding-right:15px;

}
FORM.tr, DIV.tr
{
    display:table-row;
}
SPAN.td
{
    display:table-cell;
}
</style>
</head>
<body>
<div style="text-align: right; margin: 15px 15px 25px 0px;">
<a href="logout.php"><button type="submit" class="btn btn-primary" name="logout" >logout</button></a>
</div>
    <div class="row">
    <div class="col-sm-2" >
  <ul class="nav nav-pills nav-stacked">
  <li><a href="./dashbord.php">Dashbord</a></li>
  <li><a href="./getimg.php">Get Images</a></li>
</ul></div>
<div class="col-sm-1"></div>
<div class="col-sm-6">
    
        <h2>Add Entry</h2>
            <form method="post" action="#" style="width:100%;" enctype="multipart/form-data" id="topicform">
                    <div class="form-group">
                      <label for="rank">Rank : </label>
                      <input type="number" class="form-control" name="lrank" placeholder="Enter Rank">
                    </div>
                    <div class="form-group">
                      <label for="name">Name : </label>
                      <input type="text" class="form-control" name="lname" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label for="llink">Link : </label>
                      <input type="url" class="form-control" name="llink" placeholder="Enter Link">
                    </div>
                    <div class="form-group">
                      <label for="desc">Description : </label>
                    <textarea rows="4" cols="50" name="ldesc" form="topicform" class="form-control"></textarea>                    
                    </div>
                    <div class="form-group">
                      <label for="author">Author Name : </label>
                      <input type="text" class="form-control" name="lauthor" placeholder="Enter Author Name">
                    </div>
                    <div class="form-group">
                      <label for="fb">Facebook Link : </label>
                      <input type="text" class="form-control" name="lfb" placeholder="Enter FB Link">
                    </div>
                    <div class="form-group">
                      <label for="twt">Twitter Link : </label>
                      <input type="text" class="form-control" name="ltwt" placeholder="Enter Twitter Link">
                    </div>
                    <div class="form-group">
                      <label for="desc">Email 1 : </label>
                      <input type="email" class="form-control" name="lemail1" placeholder="Enter Email 1">
                    </div>
                    <div class="form-group">
                      <label for="desc">Email 2 : </label>
                      <input type="email" class="form-control" name="lemail2" placeholder="Enter Email 2">
                    </div>
                    <button type="submit" name="addtopicdb" class="btn btn-success">Submit</button>
            </form>
    
</div>
<div class="col-sm-3" ><h1><a href='./view.php?id=<?php echo $id; ?>'><button type="submit" class="btn btn-success" style="width:90%">View Html for this Post</button></a></h1></div>
</div>

    <?php 
             $sql="SELECT * FROM `list` Where tid=$id ORDER BY lrank ASC";
             $result = $conn->query($sql);

              if ($result->num_rows > 0) 
              {
                  echo '<br><div class="table"><div class="tr">
        <span class="td">RANK</span>
        <span class="td">NAME</span>
        <span class="td">LINK</span>
        <span class="td">IMAGE URL</span>
        <span class="td">AUTHOR</span>
        <span class="td">FACEBOOK</span>
        <span class="td">TWITTER</span>
        <span class="td">EMAIL1</span>
        <span class="td">EMAIL2</span>
        <span class="td">CONTACT DONE</span>
        <span class="td">BADGE ADDED</span>
    </div><br>';
                  while($row = $result->fetch_assoc()) {
                  echo "<form class='tr' action='' method='Post'><input type='hidden' name='lid' value='".$row['lid']."'><input type='hidden' name='clrank' value='".$row['lrank']."'><span class='td'><input type='number' name='lrank' value='".$row['lrank']."' style='width:70px'/></span><span class='td'><a href='/edit.php?id=".$row['lid']."'>".$row['lname']."</a></span><span class='td'><a href='".$row['llink']."'>Here</a></span><span class='td'><img src='".$row['liurl']."' width='50px' height='50px'></span><span class='td'>".$row['lauthor']."</span><span class='td'><a href='".$row['lfb']."'>Here</a></span><span class='td'><a href='".$row['ltwt']."'>Here</a></span><span class='td'>".$row['lemail1']."</span><span class='td'>".$row['lemail2']."</span><span class='ltd'><select class='form-control' name='lcstatus'><option value='".$row['lcstatus']."'>".$row['lcstatus']."</option><option value='Done'>Done</option><option value='Pending'>Pending</option></select></span><span class='td'><select class='form-control' name='lbadge'><option value='".$row['lbadge']."'>".$row['lbadge']."</option><option value='Added'>Added</option></select></span><span class='td'><button type='submit' class='btn btn-default' name='update'>Update</button></span><span class='td'><a href='./deletelist.php?id=".$row['lid']."&rank=".$row['lrank']."&tid=".$_GET['id']."'>Delete</a></span></form><br>";
                                                  }
              }
              else 
              echo "No Records Found!"
    ?>

</div>
    </body>
    </html>