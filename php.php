<html>
   
   <head>
      <title>Contact</title>
   </head>
   
   <body>
      
      <?php


$name="Akshay";
$email="";
$sub="";
$msg="";
$phone="";
         $to = "iamakshaymore@gmail.com";
         $subject = $sub;
         
         $message = "Hi Akshay<br><p> 
Malicious Threat Visualizer (April 2017): 	 	 	 	                         St. Francis Institute of Technology 
Scan and detect malicious content from different file types like PDF and PE.  
Perform static analysis of the document without causing any damage to the system to study the syntactic nature of the document and display the output in a user-readable format.
Implemented using Peepdf, Python, JSON. 
</p>";
         
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         $header .= 'From: Red9 Team<team@garagenine.com>' . "\r\n" .
    'Reply-To: team@red9.com' . "\r\n";
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";

         }else {
            echo "Message could not be sent...";
         }
      ?>
      
   </body>
</html>