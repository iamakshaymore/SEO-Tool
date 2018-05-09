<?php
include "loggedin.php"; 
$id=$_GET['id'];?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      p {
    margin: 0 0 20px;    
    TEXT-ALIGN: JUSTIFY;
}
      h4 {
        margin-top:20px;
}
.each{
     margin: 0 0 70px;
}
  </style>
</head>
<body> 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>

<div class="col-sm-2"></div>

    
<div class="col-sm-5">  
    <?php 
             $sql="SELECT * FROM `list` Where tid=$id ORDER BY lrank ASC";
             $result = $conn->query($sql);

              if ($result->num_rows > 0) 
              {

                while($row = $result->fetch_assoc()){ 
                if(strlen($row['llink'])>=50){
                $link = substr($row['llink'], 0, 50);
                $link = $link."...";
                }
                else 
                $link = $row['llink'];
                ?>
                <div class="each">
                <h1># <?php echo $row['lrank']; ?></h1>
                <h2><?php echo $row['lname']; ?></h2>
                <h3>by <strong><?php echo $row['lauthor']; ?></strong></h3>
                <img src="<?php echo $row['liurl']; ?>" alt="<?php echo $row['lname']; ?>"><br>
                <h4><strong>Description : </strong></h4><p><?php echo $row['ldesc']; ?></p>
                <h4><strong>View Article : </strong><a href="<?php echo $row['llink']; ?>"><?php echo $link ?></a></h4>
                <?php if($row['lfb']){?>
                <h4><strong>Facebook : </strong><span class="fb-like" data-href="<?php echo $row['lfb'];?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></span></h4>
                <?php }
                else {?>
                 <h4><strong>Facebook : </strong>N/A</h4>
                 <?php }
                 if($row['ltwt']){
                 ?>
                <h4><strong>Twitter : </strong><a class="twitter-follow-button" data-show-count="true" href="<?php echo $row['ltwt'];?>">
Follow</a></h4>
                <?php }
                else {?>
                <h4><strong>Twitter : </strong>N/A</h4>
                <?php } ?>
                </div>

                                                 <?php }
              }
              else 
              echo "No Records Found!"
    ?>
</div>
<div class="col-sm-5"></div>
</body>
</html>