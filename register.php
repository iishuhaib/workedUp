<?php
//start session
session_start();
//create a variable called $pagename which contains the actual name of the page
$pagename="Customer Registration";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2><u>".$pagename."</u></h2>";
echo "<h4 id = 'formhcolor'> Register and create a workedUp account</h4>";

//create Table
echo "<table>";
	echo "<form action=getregister.php method=post>";
	echo "<tr>";
		echo "<td>First Name</td>";
		echo "<td><input type='text' class='textsize' name='firstname'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Last Name</td>";
		echo "<td><input type='text' name='lastname'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Address</td>";
		echo "<td><input type='text' name='address'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Postcode</td>";
		echo "<td><input type='text' name='postcode'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Tel No</td>";
		echo "<td><input type='text' name='telno'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Email Address</td>";
		echo "<td><input type='text' name='emailaddress'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Password</td>";
		echo "<td><input type='text' name='password'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Confirm Password</td>";
		echo "<td><input type='text' name='confirmpassword'></td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td><input type=submit value='Register'></td>";
		echo "<td><input type='reset' value='Clear Form'></td>";
	echo "</tr>";
	echo "</form>";
echo "</table>";
//include head layout
include("footfile.html");
?>
