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
<h1 class="mainhd"><div class="d1"></div>Ask A Question<div class="d2"></div></h1>
<div class="actbod" style="margin-top:30px;">
<form method="post">
<div class="namebox mtop">Message</div>
<div class="txthol">
<textarea name="txtmsg" cols="" rows="" class="txtbox" style="resize:none;"></textarea>
</div>
<ul class="ccul">
<li>
<div class="namebox mtop">First Name</div>
<div class="txthol">
<input name="txtfname" type="text" class="txtbox" />
</div>
</li>
<li>
<div class="namebox mtop">Last Name</div>
<div class="txthol">
<input name="txtlname" type="text" class="txtbox" />
</div>
</li>
<li>
<div class="namebox mtop">Phone Number</div>
<div class="txthol">
<input name="txtphno" type="text" class="txtbox" />
</div>
</li>
<li>
<div class="namebox mtop">Email</div>
<div class="txthol">
<input name="txtmail" type="email" class="txtbox" />
</div>
</li>
</ul>
<div class="clr"></div>
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