<?php
include "loggedin.php"; 

$id=$_GET['id'];
$rank=$_GET['rank'];
$tid=$_GET['tid'];

$sql1="SELECT * FROM `list` Where lid=$id;";
        $result = $conn->query($sql1);
                      if ($result->num_rows > 0) 
                        {
                            while($row = $result->fetch_assoc())
                            {
                            $llink=str_replace("http://garagenine.com/","",$row['liurl']);
                            unlink($llink);
                                                        }
                        }

$sql="SELECT * FROM `list` Where tid=$tid ORDER BY lrank ASC";
        $result = $conn->query($sql);
                      if ($result->num_rows > 0) 
                        {
                            while($row = $result->fetch_assoc())
                            {
                            if($row['lrank']>$rank )
                            {
                                $nlrank=$row['lrank']-1;
                                $nlid=$row['lid'];
                                $sql2="UPDATE `list` SET lrank = $nlrank WHERE lid=$nlid ;";
                                $conn->query($sql2);
                            }
                            }
                        }
                        
$sql1 = "DELETE FROM `list` where lid = $id";


if ($conn->query($sql1) === TRUE) {
echo "Record Deleted!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>