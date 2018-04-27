<?php
   session_start();
?>
<?php
if (isset($_GET['cat'])) {
	$catagory = $_GET['cat'];
}
else
{
	$catagory="Products";
}
if (isset($_GET['search'])) {
	$search = $_GET['search'];
}
else
{
	$search="";
}
if (isset($_GET['pest'])) {
	$pest = $_GET['pest'];
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Habrostore</title>
<link href="styles/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>
<?php include('header.php'); ?>

<div class="container">
<div class="subcontainer padtb" style="padding-bottom:60px;">
<h1 class="mainhd"><div class="d1"></div><?php echo $catagory; ?><div class="d2"></div></h1>
<div class="pesthol">

<?php 
 include "storescripts/connect_to_mysql.php";
 if($catagory=="Products")
 {
	 $sr="";
	if($search=="")
 {
	 $sr="WHERE pesttype LIKE '%$pest%'";
	
 }
 else
 {
	$sr="WHERE Productname LIKE '%$search%'";
 }
 }
 else
 {
	 
	 if($search=="")
 {
	 $sr="WHERE catagory LIKE '%$catagory%'";
	
 }
 else
 {
	 $sr="WHERE catagory LIKE '%$catagory%' AND Productname LIKE '%$search%'";
 }
 
 }
 
$sql = "SELECT * FROM products ".$sr." ORDER BY id ASC";
    $query = mysqli_query($db_conx, $sql); 
//$row=mysql_fetch_array($result);

echo "<ul class=items>";
while($row=mysqli_fetch_array($query))
{
	$id = $row["id"];
	$prod = $row["productname"];
	$im="pictures/".$row["image"];
echo "<li><div class=bb><a href=product-profile.php?id=".$row["id"]."><img src=".$im." class=proim /><div class=tag1>".$prod."</div></a></div></li>";
}
echo "</ul>";
  
?>


<div class="clr"></div>
</div>

</div>
</div>

<?php include('footer.php'); ?>
</body>
</html>