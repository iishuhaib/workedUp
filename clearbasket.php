<?php
session_start();

//create a variable called $pagename which contains the actual name of the page
$pagename="Clear Basket";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2><u>".$pagename."</u></h2>";

unset($_SESSION['basket']);
echo "Your Basket is cleared";

//include head layout
include("footfile.html");
?>
