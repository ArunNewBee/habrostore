
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
	$sql = "SELECT tag FROM productpic WHERE productid='$id'";
      $pro_query = mysqli_query($db_conx, $sql);
	  $numrow_check = mysqli_num_rows($pro_query);
	  $pls=$numrow_check+1;
	
	
}
?>

<?php 
    if(isset($_POST['btnsubmit'])){
		include "../storescripts/connect_to_mysql.php";
		
		if($_FILES['image1']['name'])
	 {
		 $file_name1 = $_FILES['image1']['name'];
      $file_tmp1 =$_FILES['image1']['tmp_name'];
	  move_uploaded_file($file_tmp1,"../pictures/".$file_name1);
	  
	  $sql2 = "INSERT INTO productpic (productid,image,tag)VALUES('$id','$file_name1','$pls')";
	  $query2 = mysqli_query($db_conx, $sql2);
	  header("location: edit.php?id=$id");
	 }
		
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Picture</title>
</head>

<body>

<form name="myform" enctype="multipart/form-data" action="" method="post">
<table border="1" width="600px">
  <tr>
    <td>Image</td>
    <td><input type="file" name="image1" accept="image/*" required ></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <input name="btnsubmit" type="submit" />
    </td>
  </tr>
  </table>
  </form>

</body>
</html>