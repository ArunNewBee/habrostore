<?php
   session_start();
   ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Habrostore Forgot Password</title>
<link href="styles/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>
<?php include('header.php'); ?>

<div class="container">
<div class="subcontainer padtb">
<div class="actbod">
<form>
<div class="formhd">Forgot Password</div>
<div class="namebox1">
Enter email address associated with Habro Store account.
</div>
<div class="namebox">Email</div>
<div class="txthol">
<input name="txtmail" type="text" class="txtbox" />
</div>

<div class="btnhol">
<input name="" type="submit" class="btn1" value="Submit">
</div>

</form>
</div>
</div>
</div>

<?php include('footer.php'); ?>
</body>
</html>