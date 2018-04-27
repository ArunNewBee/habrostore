
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

<?php
if (isset($_GET['id'])) {
	include "../storescripts/connect_to_mysql.php"; 
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
	$sql = "SELECT * FROM products WHERE id='$id'";
$user_query = mysqli_query($db_conx, $sql);
while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	$code = $row['id'];
	$pic = "../pictures/".$row['image'];
    $product = $row["productname"];
    $dscr = $row["dscr"];
    $cat = $row["catagory"];
	$ptype = $row["pesttype"];	
    $price = $row["price"];
	$cprice = $row["cprice"];
	$url = $row["url"];
}

}

?>

 <?php 
    if(isset($_POST['btnsubmit'])){
		include "../storescripts/connect_to_mysql.php";
		
$pro1 = $_REQUEST['txtproduct'];
$cat1 = $_REQUEST['ddlcat'];
$ptype1 = $_REQUEST['ddlptype'];
$desc1 = $_REQUEST['txtdesc'];

$url1 = $_REQUEST['txturl'];

if($cat1!="Pest Control")
{
	$ptype1="";
}


//$sql = "INSERT INTO product (products, catagory, dealership, image, desc, priority)VALUES('$pro','$cat','$dl','$file_name','$dsc','$pri')";

$sql2 = "UPDATE products SET productname='$pro1',catagory='$cat1',dscr='$desc1',pesttype='$ptype1',url='$url1' WHERE id='$id'";
    if ($db_conx->query($sql2) === TRUE) {
    echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
} else {
    echo "Error updating record: " . $db_conx->error;
}
	
	 }
	 

    ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>

<body>
<?php include('header.php'); ?>

<form name="myform" enctype="multipart/form-data" action="" method="post">
<table border="1" width="600px">
  <tr>
    <td>Product Name</td>
    <td><input name="txtproduct" type="text" value="<?php echo $product ?>" required /></td>
  </tr>
  <tr>
    <td>Catagory</td>
    <td><select name="ddlcat">
    <option><?php echo $cat ?></option>
    <option>Personal Care</option>
    <option>Home Care</option>
    <option>Pest Control</option>
    </select></td>
  </tr>
  <tr>
    <td>Pest Type</td>
    <td><select name="ddlptype">
    <option><?php echo $ptype ?></option>
    <option>Cocroach</option>
    <option>Mosquitoes</option>
    <option>Ants</option>
    <option>Bed Bugs</option>
    <option>Rats</option>
    <option>Birds</option>
    </select></td>
  </tr>
  
  <tr>
    <td>Description</td>
    <td><textarea name="txtdesc" cols="" rows=""><?php echo $dscr ?></textarea></td>
  </tr>
  <tr>
    <td>Url</td>
    <td><textarea name="txturl" cols="" rows=""><?php echo $url ?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="btnsubmit" type="submit"/></td>
  </tr>
</table>
</form>

<form name="myform1" enctype="multipart/form-data" action="add_items.php" method="post">

<table border="1" width="600px">
<tr>
<?php
  
  
 include "../storescripts/connect_to_mysql.php";
 $sql1 = "SELECT * FROM productpic WHERE productid=".$id." ORDER BY id ASC";
    $query1 = mysqli_query($db_conx, $sql1); 
//$row=mysql_fetch_array($result);



while($row=mysqli_fetch_array($query1))
{
	$tag=$row["tag"];
echo "<td align=center><a href=pic.php?id=$id&pic=$tag ><img src=../pictures/".$row["image"]." style=width:140px /><br />change</a></td>";
}

  
  
  ?>
</tr>
  
  
  </table>
</form>
<a href="addpic.php?id=<?php echo $id ?>">Add Picture</a>

</body>
</html>