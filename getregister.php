<?php
//start session
session_start();
//database
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Registration Confirmation";

//creating variables to store user values
@$userType = null;
@$firstName = $_POST['firstname'];
@$lastName = $_POST['lastname'];
@$_address = $_POST['address'];
@$_postcode = $_POST['postcode'];
@$telNo = $_POST['telno'];
@$_email = $_POST['emailaddress'];
@$_password = $_POST['password'];
@$confirmPassword = $_POST['confirmpassword'];

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

//display name of the page and some random text
echo "<h2><u>".$pagename."</u></h2>";

$reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

if(empty($_POST['firstname'] && $_POST['lastname'] && $_POST['address'] && $_POST['postcode'] && $_POST['telno'] && $_POST['emailaddress'] && $_POST['password'] && $_POST['confirmpassword'] )) {
  //If one or more fields of the form have been left blank
	echo "All fields are compulsory<br>";
	echo "Go back to<a href='register.php'> Register</a>";
}elseif (preg_match($reg,$_email)==0) {
	echo "Email not valid<br>";
	echo "Go back to<a href='register.php'> Register</a>";
}
else{
	if($_password !== $confirmPassword){
		echo "<p>The 2 passwords you entered do not match<br>";
		echo "Please make sure you enter them correctly<br>";
		echo "Go back to<a href='register.php'> Register</a></p>";

	}else{
		
		$SQL = "INSERT INTO users (userType, userFName, userSName, userAddress, userPostcode, userTelNo, userEmail, userPassword) VALUES 
		('$userType','$firstName','$lastName', '$_address', '$_postcode', '$telNo', '$_email', '$_password')";
		//create a new variable containing the execution of the SQL
		$exeSQL=mysql_query($SQL) ;
		$errorCode = mysql_errno($conn);

		//check error code
		if($errorCode == 0){
				echo "<p>You have successfully registered in the system!<br>";
				echo "To continue, please <a href='login.php'> login</a></p>";
		}else{
			echo "There is an error with your registration<br>";
			if($errorCode == 1062){
				echo "The email you entered already exists<br>";
				echo "Go back to<a href='register.php'> Register</a>";
			}
		}
	}
}

//include head layout
include("footfile.html");
?>
