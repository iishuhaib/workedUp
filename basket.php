<?php
//start session question 01
session_start();
//$_SESSION['basket']=array();

include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Ordering Basket";

//create 2 local variables Question 02

@$newprodid = $_POST['h_prodid'];
@$reququantity = $_POST['prod_quantity'];

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2><u>".$pagename."</u></h2>";

//create a new session array
$_SESSION['basket'][$newprodid] = $reququantity;
//total variable
$total = 0;

//Question 3 check for product ID
if(empty($newprodid)){
	echo "<p>Existing Basket</p>";
	if(empty($_SESSION['basket'][1])){
		echo "<p><b><i>Your basket is empty!</i></b></p>";
	}
	echo "<table>";
				echo "<tr>";
					echo "<th>Product Name</th>";
					echo "<th>Price</th>";
					echo "<th>Quantity</th>";
					echo "<th>SubTotal</th>";
				echo "</tr>";

				foreach ($_SESSION['basket'] as $key => $value){
					$SQL = "select prodName, prodPrice from Product where prodId = '".$key."';";
					//create a new variable containing the execution of the SQL
					$exeSQL=mysql_query($SQL) or die (mysql_error());
					$arrayprod=mysql_fetch_array($exeSQL);
					
					if($value!=0){ //if SESSION array contains value then
						echo "<tr>
								<td>".$arrayprod['prodName']."</td>
								<td>".$arrayprod['prodPrice']."</td>
								<td>".$value."</td>
								<td> $ ".$arrayprod['prodPrice']*$value."</td>";
								$total = $total+($arrayprod['prodPrice']*$value);
					}
				}
					echo "<tr> <td colspan=3>Total</td><td >$ ".$total."</td></tr>";
	echo "</table>";
}else{	
		//display table	
		if(isset($_SESSION['basket'])){
			echo "<p> Your basket has been updated</p>";
			
			echo "<table>";
				echo "<tr>";
					echo "<th>Product Name</th>";
					echo "<th>Price</th>";
					echo "<th>Quantity</th>";
					echo "<th>SubTotal</th>";
				echo "</tr>";

				foreach ($_SESSION['basket'] as $key => $value){
					$SQL = "select prodName, prodPrice from Product where prodId = '".$key."';";
					//create a new variable containing the execution of the SQL
					$exeSQL=mysql_query($SQL) or die (mysql_error());
					$arrayprod=mysql_fetch_array($exeSQL);
					
					if($value!=0){ //if SESSION array contains value then
						echo "<tr>
								<td>".$arrayprod['prodName']."</td>
								<td>".$arrayprod['prodPrice']."</td>
								<td>".$value."</td>
								<td> $ ".$arrayprod['prodPrice']*$value."</td>";
								$total = $total+($arrayprod['prodPrice']*$value);
					}
				}
					echo "<tr> <td colspan=3>Total</td><td >$ ".$total."</td></tr>";
			echo "</table>";
		}
}

echo "<br><a href='clearbasket.php'>Clear Basket</a>";
echo "<br>";
echo "<br>New workedUp Customers<a href='register.php'> Register</a>";
echo "<br>Registered workedUp Members<a href='login.php'> Login</a>";
//include head layout
include("footfile.html");
?>
