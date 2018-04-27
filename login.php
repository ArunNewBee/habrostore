<?php 
session_start();
// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["txtphno"]) && isset($_POST["txtpass"])) {

	$manager =$_POST["txtphno"]; // filter everything but numbers and letters
    $password =$_POST["txtpass"]; // filter everything but numbers and letters
    // Connect to the MySQL database  
    include "storescripts/connect_to_mysql.php"; 
    $sql = "SELECT id FROM users WHERE (phno='$manager' OR email='$manager') AND (password='$password') LIMIT 1"; // query the person
	$query = mysqli_query($db_conx, $sql);
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysqli_num_rows($query); // count the row nums
    if ($existCount == 1) { // evaluate the count
	     while($row = mysqli_fetch_array($query)){ 
             $id = $row["id"];
		 }
		 $_SESSION["id1"] = $id;
		 $_SESSION["manager1"] = $manager;
		 $_SESSION["password1"] = $password;
		 header("location: index.php");
         exit();
    } else {
		echo "<script type='text/javascript'>alert('Incorrect email, phone number or password');</script>";
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Habrostore Login</title>
<link href="styles/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>
<?php include('header.php'); ?>

<div class="container">
<div class="subcontainer padtb">
<div class="actbod">
<form method="post">
<div class="formhd">Login</div>
<div class="namebox">Email or Phone Number</div>
<div class="txthol">
<input name="txtphno" type="text" class="txtbox" />
</div>
<div class="namebox mtop">Password</div>
<div class="txthol">
<input name="txtpass" type="password" class="txtbox" />
</div>
<div class="btnhol">
<input name="" type="submit" class="btn1" value="Submit">
</div>
<div class="for">
<a href="forgot-password.php">Forgot Password?</a>
</div>
<div class="shd">
<div class="sshd">New to Habrostore</div>
</div>
<div class="btnhol">
<a href="create-account.php" class="btn2">Create An Account</a>
</div>
</form>
</div>
</div>
</div>

<?php include('footer.php'); ?>
</body>
</html>