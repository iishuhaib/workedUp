<?php
//start session
session_start();
//database
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Login Confirmation";

//creating variables to store user values
@$_loginEmail = $_POST['login_email'];
@$_loginPassword = $_POST['login_password'];

//create a new session array
$_SESSION['c_userid'] = $reququantity;

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2><u>".$pagename."</u></h2>";

if(empty($_POST['login_email'] && $_POST['login_password'])) {
	echo "All fields are compulsory<br>";
	echo "Go back to<a href='login.php'> Login</a>";
}else{
	$SQL ="select userEmail, userPassword from users where userEmail = '".$_loginEmail."';";
		//create a new variable containing the execution of the SQL
		$exeSQL=mysql_query($SQL) or die (mysql_error());
		$arrayValues=mysql_fetch_array($exeSQL);
		if(!($arrayValues['userEmail'] == $_loginEmail)){
			echo "Sorry the Email you entered was not Recognized<br>";
			echo "Go back to<a href='login.php'> Login</a>";
		}else{
			if(!($arrayValues['userPassword'] == $_loginPassword)){
			echo "Sorry the Password you entered is not valid<br>";
			echo "Go back to<a href='login.php'> Login</a>";
			}else{
				echo "You have Successfully logged into the system! <br>";
				echo "The email you entered is ".$_loginEmail."<br>";
				echo "The Password you entered is ".$_loginPassword."<br><br>";
				echo "To continue Shopping <a href='index.php'> Product Index</a><br>";
				echo "To view your basket <a href='basket.php'> My Basket</a>";
			}
		}
		
		if(isset($_SESSION['c_userid'])){
			
		}
}

//include head layout
include("footfile.html");
?>
