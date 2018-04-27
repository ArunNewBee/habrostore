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
if (isset($_GET['id']) && isset($_GET['pic'])) {
	
	include "../storescripts/connect_to_mysql.php"; 
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
	$pic = preg_replace('#[^0-9]#i', '', $_GET['pic']);
	$sql = "SELECT * FROM productpic WHERE productid='$id' AND tag='$pic'";
    $user_query = mysqli_query($db_conx, $sql);
    while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	$code = $row['id'];
	$img = "../pictures/".$row['image'];
    
    }
}
?>

 <?php 
    if(isset($_POST['btnsubmit'])){
		include "../storescripts/connect_to_mysql.php";
		if($_FILES['image1']['name'])
	 {
		 $file_name = $_FILES['image1']['name'];
      $file_tmp =$_FILES['image1']['tmp_name'];
	  move_uploaded_file($file_tmp,"../pictures/".$file_name);
	  if($pic=="1")
	  {
	  $sql2 = "UPDATE products SET image='$file_name' WHERE id='$id'";
    if ($db_conx->query($sql2) === TRUE) {
    echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
} else {
    echo "Error updating record: " . $db_conx->error;
}

	  }

$sql2 = "UPDATE productpic SET image='$file_name' WHERE productid='$id' AND tag='$pic'";
    if ($db_conx->query($sql2) === TRUE) {
    echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
	header("location: edit.php?id=$id");
} else {
    echo "Error updating record: " . $db_conx->error;
}

	  
	 }
	 
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<img src="<?php echo $img ?>" width="400px"/>
<br />&nbsp;<br />&nbsp;<br />
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