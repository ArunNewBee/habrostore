<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Personal and Home Care Products UAE India - Help</title>
<link href="styles/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.min.css">

</head>

<body>
<?php include('header.php'); ?>
<div class="container">
<div class="helptop">
<h2>How Can We Help You</h2>
</div>
</div>
<div class="container">
<div class="subcontainer padtb">
<div class="actbod">
<form method="post">
<div class="formhd">Want Help?</div>

<p class="formpara">
Write to us or call us for all kind of help related to personal care and home care products that we supply.
</p>

<div class="namebox">Name</div>
<div class="txthol">
<input name="txtname" type="text" class="txtbox" />
</div>

<div class="namebox mtop">Phone Number</div>
<div class="txthol">
<input name="txtphno" type="text" class="txtbox" />
</div>
<div class="namebox mtop">Email</div>
<div class="txthol">
<input name="txtmail" type="email" class="txtbox" />
</div>

<div class="namebox mtop">Message</div>
<div class="txthol">
<textarea name="txtmsg" cols="" rows="" class="txtbox" style="resize:none;"></textarea>
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