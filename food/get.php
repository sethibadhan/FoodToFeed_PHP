<?php
session_start();
$loop=0;
$names=$locations=$descriptions=$times=$contacts=$emails=array();
$name="root";
$pass="";
$host="localhost";
$dbhandle=mysql_connect($host,$name,$pass);
$selected=mysql_select_db("food",$dbhandle);
  $sql = 'SELECT * FROM post';
 
   $retval = mysql_query( $sql, $dbhandle );
   $count=mysql_num_rows($retval);
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      $names[$loop]= "{$row['name']}";
      $locations[$loop]  ="{$row['location']}";
         $descriptions[$loop]=" {$row['description']}";
          $times[$loop]="{$row['time']} <br> ";
         $contacts[$loop]=" {$row['contact']} <br> ";
          $emails[$loop]=" {$row['email']} <br> ";
       
        // echo "$names[$loop]";
         $loop++;
   }
   ?>
   <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Availability of Food</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="getstyles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="jquery.js"></script>
  </head>
<body>
<div class="block1">
<div class="hamburger"><i class="fa fa-bars fa-2x menuhideshow"></i></div>
  <div>
    <nav>
      <ul class="navham">
       <li><a href="index.html">Home</a></li>
        <li><a href="post.html">Post</a></li>
        <li><a href="get.html">Get</a></li>
        <li><a href="register.html">Register</a></li>
        <li><a href="donation.html">Donate</a></li>
        <li><a href="about.html">About Us</a></li>
      </ul>
    </nav>
  </div>
    <div class="head">
    <h1>
      <a href="#">SERVE SOCIETY</a>
    </h1>
    
      <h2><a href="#">"PAY BACK TO SOCIETY"</a></h2>
  
  </div>
  </div>
 <div class="allposts"> <div class="posts">
 <?php

$query1 = mysql_query("SELECT * FROM post",  $dbhandle);
while ($row1 = mysql_fetch_array($query1)) {
?>

     <div class="postone">
     <h1><?php echo $row1['name']; ?></h1>
     <div class="poststy">
     
     <span><?php echo $row1['location']; ?></span>
     <span><?php echo $row1['time']; ?></span>
     <span><?php echo $row1['time']; ?></span>
     </div>
     <div class="">
     <p><?php echo $row1['description']; ?></p>
    
     </div>
     </div>
        <?php
}

?>
     </div>
   
  </div>
<footer class="footerdesign">
<div class="footermenu">
  <nav>
    <ul>
      <h1>Navigate</h1>
      <li><a href="index.html">Home</a></li>
      <li><a href="post.php">Post</a></li>
      <li><a href="get.html">Get</a></li>
      <li><a href="register.html">Register</a></li>
      <li><a href="donation.html">Donate</a></li>
    </ul>
  </nav>
</div>
<div class="footermenu">
  <nav>
  
    <ul>
    <h1>Social</h1>
      <li><a href="#">FACEBOOK</a></li>
      <li><a href="#">TWITTER</a></li>
      <li><a href="#">INSTAGRAM</a></li>
      <li><a href="#">PINTEREST</a></li>
      <li><a href="#">TUMBLR</a></li>
    </ul>
  </nav>
</div>
<div class="footerabout">
  <h1>FD</h1>
  <h5>Food to Feed Organization</h5>
  <h5>All Rights Reserved &copy; 2016</h5>
</div>
</footer>
</body>
</html>