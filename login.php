<?php
//start session
session_start();
//database
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Login";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2><u>".$pagename."</u></h2><br>"; 

//create Table
echo "<table>";
	echo "<form action=getlogin.php method=post>";
	echo "<tr>";
		echo "<td>Email</td>";
		echo "<td><input type='text' class='textsize' name='login_email'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Password</td>";
		echo "<td><input type='text' name='login_password'></td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td><input type=submit value='Login'></td>";
		echo "<td><input type='reset' value='Clear Form'></td>";
	echo "</tr>";
	echo "</form>";
echo "</table>";

//include head layout
include("footfile.html");
?>
