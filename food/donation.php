<?php 
if (isset($_POST['submit']))
{
$name="root";
$pass="";
$host="localhost";
$dbhandle=mysql_connect($host,$name,$pass);
$selected=mysql_select_db("food",$dbhandle);
$fir=$_POST['Fname'];
$las=$_POST['Lname'];
$em=$_POST['Email'];
$telp=$_POST['Telephone'];
$add=$_POST['Address'];
$ca=$_POST['Card'];
$am=$_POST['Amount'];
$chk=$_POST['check'];
$sql = "INSERT INTO donate". 
             "(first,last,email,mobile,address,card,amount,ques)".
      "VALUES ( '$fir','$las','$em','$telp','$add','$ca','$am','$chk')";
  $retval = mysql_query( $sql, $dbhandle);
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "Data Entered";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Donation</title>
	<link rel="stylesheet" href="donationsyles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="jquery.js"></script>
</head>
<body>
	<div class="hg">
<div class="head">
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
	
	<form class="form" action=""
      method="POST">
	<div class="tabgroup">
		<div class="tabwidth">
		<div class="header">
       		 <h1>Make Donation</h1>
         </div>
         </div>
         <div class="row">
         <div class="tabgroup">
         	<input type="text" name="Fname" required  placeholder="First Name" />
         </div>
         <div class="tabgroup">
         	<input type="text" name="Lname" required  placeholder="Last Name"/>
         </div>
		</div>
		<div class="single">
			<div class="singleitem">
				<input type="email" name="Email" required  placeholder="Email" />
			</div>
			<div class="singleitem">
				<input type="tel" name="Telephone" required  placeholder="Mobile Number" />
			</div>
			<div class="singleitem">
				<input type="text" name="Address" required  placeholder="Address" />
			</div>
			<div class="singleitem">
				<input type="text" name="Card" required  placeholder="Card Number" />
			</div>
			<div class="singleitem">
				<input type="text" name="Amount" required  placeholder="Amount In $CA" />
			</div>
			<div class="singleitem">
						<input type="checkbox" name="check" value="I prefer to make my donation anonymously."/><span>I prefer to make my donation anonymously.</span> <br />
                        <input type="checkbox" name="check" value="Please sign me up for the newsletter." /><span>Please sign me up for the newsletter.</span> <br />
                        <input type="checkbox" name="check" value="I wish to volunteer to help with the fundraising." /><span>I wish to volunteer to help with the fundraising.
                        </span> <br />
            </div>
		</div>
		<div class="tabbutton">
		<div class="Button">
       		 <button type="submit" name="submit" class="button button-block" onclick="">Donate</button>
       		  <button type="submit" class="button button-block">Cancel</button>
         </div>
         </div>
	</div>
	</div>
	</form>
</div>
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