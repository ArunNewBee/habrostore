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
<div class="container" style="background-color:#edca00;">
<div class="subcontainer padtb">
<div class="actbod" style="background-color:#FFF;">

<h1 class="mainhd" style="margin-bottom:20px;"><div class="d1"></div>Career<div class="d2"></div></h1>
<form method="post">
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
<div class="namebox mtop">Qualification</div>
<div class="txthol">
<input name="txtqua" type="text" class="txtbox" />
</div>
<div class="namebox mtop">Job Title</div>
<div class="txthol">
<input name="txtjob" type="text" class="txtbox" />
</div>
<div class="namebox mtop">Experience</div>
<div class="txthol">
<input name="txtexp" type="text" class="txtbox" />
</div>
<div class="namebox mtop">Date of Birth</div>
<div class="txthol">
<input name="txtdob" type="text" class="txtbox" />
</div>
<div class="namebox mtop">Message</div>
<div class="txthol">
<textarea name="txtmsg" cols="" rows="" class="txtbox" style="resize:none;"></textarea>
</div>
<div class="btnhol">
<input name="btnsubmit" type="submit" class="btn1"  id="btnSubmit" value="Submit">
</div>

</form>
</div>
</div>
</div>

<?php include('footer.php'); ?>
</body>
</html>