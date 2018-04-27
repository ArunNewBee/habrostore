<?php
       if(isset($_POST['srch'])){
		include "storescripts/connect_to_mysql.php";
		$find = $_REQUEST['srchitem'];
		header("location: products.php?search=$find");
	}
	
	if(!isset($_SESSION["manager1"]))
   {
	   $cl1="bl2";
	   $cl2="bl1";
   }
   else if(isset($_SESSION["manager1"]))
   {
	   $cl1="bl1";
	   $cl2="bl2";
   }
	
?>

<div class="header1">
<div class="subheader">
<div class="topp">
<ul class="app fa">
<li style="color:#689f38;"><a>&#xf17b;</a></li>
<li style="color:#343434;"><a>&#xf179;</a></li>
<li style="color:#0078d7;"><a>&#xf17a;</a></li>
</ul>
<ul class="app1 fa">
<li><a href="help-pest-control-India.php"><i class="fa">&#xf2b5;</i> Help</a></li>
<li><a href="feedbacks.php"><i class="fa">&#xf2b7;</i> Feedback</a></li>
<li><a href="ask-a-question.php"><i class="fa">&#xf0a6;</i> Ask a Question</a></li>
<li><a href="#"><i class="fa">&#xf08a;</i> 0</a></li>
</ul>

<div class="clr"></div>
</div>
</div>
</div>
<div class="header">
<div class="subheader">

<div class="table">

<div class="headleft">
<div class="logohol">
<a href="index.php"><img src="images/habrostore-logo.svg" /></a>
</div>
</div>

<div class="headright">
<div class="htp">
<div class="srho">
<form method="post">
<div class="sr1">
<ul class="srul">
<li><input type="text" name="srchitem" class="srbx"/></li>
<li><input type="submit" name="srch" class="fa fa-lg srbtn" aria-hidden="true" value="&#xf002;" /></li>

</ul>

<div class="clr"></div>
</div>
</form>
</div>
<div class="meho">
<ul class="me1 <?php echo $cl1; ?>">
<li><a href="create-account.php">Join Now</a></li>
<li><i class="fa fa-lg" style="color:#FFF;">&#xf2bd;</i><a href="login.php">Login</a></li>
</ul>
<ul class="me1 <?php echo $cl2; ?>">

<li><a href="logout.php">Logout</a></li>
</ul>
<div class="clr"></div>
</div>
<div class="clr"></div>
</div>
<div class="hbt">




<div class="outer-menu">
  <input class="checkbox-toggle" type="checkbox" />
  <div class="hamburger">
    <div></div>
  </div>
  <div class="menu">
    <div>
      <div>
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="products.php?cat=Home Care">Home Care</a></li>
<li><a href="products.php?cat=Personal Care">Personal Care</a></li>
</ul>
</div>
</div>
</div>
</div>



<div class="clr"></div>
</div>
</div>

</div>
</div>
</div>