
<?php
   session_start();
   if(!isset($_SESSION["manager"]))
   {
	   header("location:admin_login.php");
	   exit();
   }

// Be sure to check that this manager SESSION value is in fact in the database
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); // filter everything but numbers and letters
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database  
include "../storescripts/connect_to_mysql.php"; 
$sql = "SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1"; // query the person
$query=$query = mysqli_query($db_conx, $sql);
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysqli_num_rows($query); // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>

<body>
<?php include('header.php'); ?>


<?php

  
 include "../storescripts/connect_to_mysql.php";
 $sql = "SELECT * FROM products ORDER BY id ASC";
    $query = mysqli_query($db_conx, $sql); 
//$row=mysql_fetch_array($result);


echo "<ul class=mem>";
while($row=mysqli_fetch_array($query))
{
	$id = $row["id"];
	$prod = $row["productname"];
	$im="../pictures/".$row["image"];
echo "<li><div class=memdiv><a href=edit.php?id=".$row["id"]."><img src=".$im." class=proim /></a><div class=proname>".$prod."</div></div></li>";
}
echo "</ul>";
  
  
  ?>
</body>
</html>