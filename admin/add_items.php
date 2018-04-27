
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
    if(isset($_POST['btnsubmit'])){
		include "../storescripts/connect_to_mysql.php";
		if($_FILES['image1']['name'])
	 {
		 $file_name = $_FILES['image1']['name'];
      echo $file_tmp =$_FILES['image1']['tmp_name'];

$pro = $_REQUEST['txtproduct'];
$cat = $_REQUEST['ddlcat'];
$ptype = $_REQUEST['ddlptype'];
$desc = $_REQUEST['txtdesc'];
$price = $_REQUEST['txtprice'];
$cprice = $_REQUEST['txtcprice'];
$url = $_REQUEST['txturl'];


move_uploaded_file($file_tmp,"../pictures/".$file_name);



$sql = "INSERT INTO products (productname,catagory,pesttype,price,cprice,image,dscr,url)VALUES('$pro','$cat','$ptype','$price','$cprice','$file_name','$desc','$url')";
		$query = mysqli_query($db_conx, $sql);
        $proid = mysqli_insert_id($db_conx);
$sql1 = "INSERT INTO productpic (productid,image,tag)VALUES('$proid','$file_name','1')";
		$query1 = mysqli_query($db_conx, $sql1);
	 }
	 
	  if($_FILES['image2']['name'])
	 {
		 $file_name1 = $_FILES['image2']['name'];
      $file_tmp1 =$_FILES['image2']['tmp_name'];
	  move_uploaded_file($file_tmp1,"../pictures/".$file_name1);
	  
		 $sql2 = "INSERT INTO productpic (productid,image,tag)VALUES('$proid','$file_name1','2')";
		$query2 = mysqli_query($db_conx, $sql2);
	 }
	 
	  if($_FILES['image3']['name'])
	 {
		 $file_name2 = $_FILES['image3']['name'];
      $file_tmp2 =$_FILES['image3']['tmp_name'];
	  move_uploaded_file($file_tmp2,"../pictures/".$file_name2);
		 
		 $sql3 = "INSERT INTO productpic (productid,image,tag)VALUES('$proid','$file_name2','3')";
		$query3 = mysqli_query($db_conx, $sql3);
	 }
	 
    }
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
</style>

</head>

<body>
<?php include('header.php'); ?>
<form name="myform" enctype="multipart/form-data" action="add_items.php" method="post">
<table border="1" width="600px">
  <tr>
    <td>Product Name</td>
    <td><input name="txtproduct" type="text" required /></td>
  </tr>
  <tr>
    <td>Catagory</td>
    <td><select name="ddlcat">
    <option>Personal Care</option>
    <option>Home Care</option>
    <option>Pest Control</option>
    </select></td>
  </tr>
  <tr>
    <td>Pest Type</td>
    <td><select name="ddlptype">
    <option> </option>
    <option>Cocroach</option>
    <option>Mosquitoes</option>
    <option>Ants</option>
    <option>Bed Bugs</option>
    <option>Rats</option>
    <option>Birds</option>
    </select></td>
  </tr>
  <tr>
    <td>Price</td>
    <td><input name="txtprice" type="text" required /></td>
  </tr>
  <tr>
    <td>Price to cut</td>
    <td><input name="txtcprice" type="text" required /></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name="txtdesc" cols="" rows=""></textarea></td>
  </tr>
   <tr>
    <td>Url</td>
    <td><input name="txturl" type="text" required /></td>
  </tr>
  <tr>
    <td>Image1*</td>
    <td>
    <img id="output1" style="width:150px;"/><br />
    <input type="file" name="image1" accept="image/*" onchange="loadFile1(event)" required >

<script>
  var loadFile1 = function(event) {
    var output = document.getElementById('output1');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
    
    
    </td>
  </tr>
  <tr>
    <td>Image2</td>
    <td>
    <img id="output2" style="width:150px;"/><br />
    <input type="file" name="image2" accept="image/*" onchange="loadFile2(event)">

<script>
  var loadFile2 = function(event) {
    var output = document.getElementById('output2');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
    </td>
  </tr>
  <tr>
    <td>Image3</td>
    <td>
    <img id="output3" style="width:150px;"/><br />
    <input type="file" name="image3" accept="image/*" onchange="loadFile3(event)">

<script>
  var loadFile3 = function(event) {
    var output = document.getElementById('output3');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
    </td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td><input name="btnsubmit" type="submit" /></td>
  </tr>
</table>
</form>
</body>
</html>