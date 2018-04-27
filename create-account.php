<?php
   session_start();
   ?>
<?php 
    if(isset($_POST['btnsubmit'])){
		include "storescripts/connect_to_mysql.php";
$fname = $_REQUEST['txtfname'];
$lname = $_REQUEST['txtlname'];
$phno = $_REQUEST['txtphno'];
$mail = $_REQUEST['txtmail'];
$pass = $_REQUEST['txtcpass'];

$sql = "SELECT id FROM users WHERE email='$email' LIMIT 1";
    $query = mysqli_query($db_conx, $sql); 
    $uname_check = mysqli_num_rows($query);
	
	if ($uname_check < 1) {

$sql3 = "INSERT INTO users (fname,lname,phno,email,password,signup,lastlogin)VALUES('$fname','$lname','$phno','$mail','$pass',now(),now())";
		$query3 = mysqli_query($db_conx, $sql3);
		
		echo "<script type='text/javascript'>alert('You are successfully registered in habrostore.com');</script>";
	   
    } else {
	    echo "<script type='text/javascript'>alert('$email is already registered in habrostore.com');</script>";
    }
		
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
<div class="subcontainer padtb">
<div class="actbod">
<form method="post">
<div class="formhd">Create An Account</div>
<div class="namebox">First Name</div>
<div class="txthol">
<input name="txtfname" type="text" class="txtbox" />
</div>
<div class="namebox mtop">Last Name</div>
<div class="txthol">
<input name="txtlname" type="text" class="txtbox" />
</div>
<div class="namebox mtop">Phone Number</div>
<div class="txthol">
<input name="txtphno" type="text" class="txtbox" />
</div>
<div class="namebox mtop">Email</div>
<div class="txthol">
<input name="txtmail" type="email" class="txtbox" />
</div>
<div class="namebox mtop">Password</div>
<div class="txthol">
<input name="txtpass" type="password" id="txtPassword" class="txtbox" />
</div>
<div class="namebox mtop">Confirm Password</div>
<div class="txthol">
<input name="txtcpass" type="password" id="txtConfirmPassword" class="txtbox" />
</div>
<div class="btnhol">
<input name="btnsubmit" type="submit" class="btn1"  id="btnSubmit" value="Submit">
</div>

</form>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match. Check password");
                return false;
            }
            return true;
        });
    });
</script>
</div>
</div>
</div>

<?php include('footer.php'); ?>
</body>
</html>