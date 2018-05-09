<?php
include "loggedin.php"; 

$id=$_GET['id'];
$sql = "DELETE FROM topic where tid = $id";

$sql1 = "DELETE FROM list where tid = $id";

if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
recursiveRemoveDirectory("./images/".$id);
echo "Record Deleted!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
function recursiveRemoveDirectory($directory)
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}
?>