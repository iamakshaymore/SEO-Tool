<?php
//--- Set the parameters --------------//
$url    = "http://www.google.com/";
$apikey = "YOUR-FREE-API-KEY";
$width  = 640;
//--- Make the call -------------------//
$fetchUrl = "https://api.thumbnail.ws/api/abbbaea9f7e2f277ef67c357fab9f7eb6179aaf04537/thumbnail/get?url=akshaymore.in&width=640";
$jpeg = file_get_contents($fetchUrl);
//--- Do something with the image -----//
/* file_put_contents("screenshot.jpg", $jpeg); */
header("Content-type: image/jpeg");
echo $jpeg;
exit(0);