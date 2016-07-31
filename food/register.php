
<?php 
if (isset($_POST['submit']))
{
ob_start();
session_start();
$name="root";
$pass="";
$host="localhost";
$dbhandle=mysql_connect($host,$name,$pass);
$selected=mysql_select_db("food",$dbhandle);
$username=$_POST['name'];
$gmail=$_POST['gmail'];
$sql = "INSERT INTO register".
      "(name,gmail)".
      "VALUES ( '$username','$gmail')";
  $retval = mysql_query( $sql, $dbhandle);
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "alert('Registered Sucessfully');";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="registerstyles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="jquery.js"></script>
</head>
<body>
	<div class="hg">
	<div class="form">
	<div class="hamburger"><i class="fa fa-bars fa-2x menuhideshow">
		
	</i>
	</div>
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
	<form class="tabgroup" action="<?php echo $_SERVER['PHP_SELF']?>"
      method="POST">
		<div class="tabwidth">
		<div class="header">
       		 <h1>Register</h1>
         </div>
         </div>
         <div class="row">
         <div class="tabgroup">
         	<input type="text" name="name" required autocomplete="off" placeholder="First Name" />
         </div>
        
		</div>
		<div class="single">
			<div class="singleitem">
				<input type="email" name="gmail" required autocomplete="off" placeholder="Email" />
			</div>
			
		</div>
		<div class="tabbutton">
		<div class="Button">
       		 <button type="submit" name="submit" class="button button-block" onclick="">Get Started</button>
         </div>
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
			<li><a href="post.html">Post</a></li>
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