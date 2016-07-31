<?php 
if (isset($_POST['submit']))
{
ob_start();
session_start();
$check=0;
$name="root";
$pass="";
$host="localhost";
$dbhandle=mysql_connect($host,$name,$pass);
$selected=mysql_select_db("food",$dbhandle);
$username=$_POST['name'];
$location=$_POST['location'];
$description=$_POST['description'];
$time=$_POST['time'];
$expiry=$_POST['expiry'];
$contact=$_POST['contact'];
$email=$_POST['email'];
 $sql = "INSERT INTO post".
      "(name,location,description,time,expiry,contact,email)".
      "VALUES ( '$username', '$location','$description','$time','$expiry','$contact','$email')";
  $retval = mysql_query( $sql, $dbhandle);
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
   $check=1;
   echo "Entered data successfully\n";

$sql = 'SELECT * FROM register';
 
   $retval1 = mysql_query( $sql, $dbhandle );
   $count1=mysql_num_rows($retval1);
   if(! $retval1 ) {
      die('Could not get data: ' . mysql_error());
   }
   $j=0;
   while($row = mysql_fetch_array($retval1, MYSQL_ASSOC)) {
      $sendmail[$j]= "{$row['gmail']}";
      $nameofuser[$j]= "{$row['name']}";
      $j++;
 }
 // ----------------------------send email-----------------------------
  $to = "";
         $subject = "FOOD FOR YOU";
         
         
         
         $header = "From:abc@somedomain.com \r\n";
        
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
if($check==1)
{
         for($i=0;$i<$count1;$i++)
         {
         	$message = "<b>Hiii $nameofuser[$i] , something available for free .\n<br/> Read the details... </b>";
         $message .= "<br/><b>$username</b>\n<b><br/>Location:</b> $location\n<br/><b>Description:</b> $description\n<br/><b>Expire Time:</b>$time\n<br/><b>Phone Number:</b>$contact";
         	$to=$sendmail[$i];
         $retval = mail ($to,$subject,$message,$header);
     }
 }
}
?>
<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Post</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="poststyles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="jquery.js"></script>
</head>
<body>
	 <div class="hamburger"><i class="fa fa-bars fa-2x menuhideshow"></i></div>
  <div>
    <nav>
      <ul class="navham">
        <li><a href="index.html">Home</a></li>
        <li><a href="post.php">Post</a></li>
        <li><a href="get.php">Get</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="donation.php">Donate</a></li>
        <li><a href="about.html">About Us</a></li>
      </ul>
    </nav>
  </div>
  <div class="post-info">
	<div>
	<h1>Post About Food</h1>
	</div>
  <form action="<?php echo $_SERVER['PHP_SELF']?>"
      method="POST">
   <div class="type">
   		<label for="Name">Full Name</label>
      <input type="text" name="name" id="Name" required>
  </div>
  	<div class="type">
  		<label for="Email">Email Address</label>
      <input type="email" name="email" id="Email" required>
      </div>
    <div class="type"> 
      <label for="Phoneno">Phone Number</label>
      <input type="tel" name="contact" id="Phoneno" required>
	</div> 
	<div class="type"> 
	  <label for="PickupTime">Pick Up TIme</label>
      <input type="time" name="time" id="PickupTime" required>
	</div> 
  <div class="type"> 
    <label for="expiretime">Expiry TIme</label>
      <input type="time" name="expiry" id="PickupTime" required>
  </div> 
	<div class="type">
	  <label for="Address">Address</label>
      <input type="text" name="location" id="Address" required>
      </div>
    <div class="type">  
      <label for="Comments">Description</label>   
      <textarea name="description" id="Comments" ></textarea>
    </div>
    <div class="button">
	<div>
  <input type="submit" name="submit" value="Post" onclick="">
  </div>
  <div>
  <input type="submit" name="Cancel" value="Cancel">
	</div>
	</div>
  </div>

</form>
<footer class="footerdesign">
<div class="footermenu">
  <nav>
    <ul>
      <h1>Navigate</h1>
      <li><a href="index.html">Home</a></li>
      <li><a href="post.php">Post</a></li>
      <li><a href="get.php">Get</a></li>
      <li><a href="register.php">Register</a></li>
      <li><a href="donation.php">Donate</a></li>
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