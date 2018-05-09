<?php
include "connection.php";
session_start();
          $uname=$_SESSION['uname'];
          $pwd=$_SESSION['pwd'];
          $sql3="SELECT * FROM users WHERE uname='$uname' && pwd='$pwd';";
          $result = $conn->query($sql3);
            if ($result->num_rows > 0) 
              {
                  while($row = $result->fetch_assoc()) {
                        $auname=$row['uname'];
                        $apwd=$row['pwd'];
                          }
              }
            else
                {
                header("Location:./index.php");
              }
?>
