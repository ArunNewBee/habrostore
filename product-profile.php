<?php
   session_start();
   ?>
<?php
if (isset($_GET['id'])) {
	include "storescripts/connect_to_mysql.php";
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
	$sql = "SELECT * FROM products WHERE id='$id'";
$user_query = mysqli_query($db_conx, $sql);
while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	$code = $row['id'];
	$pic = "pictures/".$row['image'];
$product = $row["productname"];
$dscr = $row["dscr"];
$cat = $row["catagory"];
$price=$row["price"];
$cprice=$row["cprice"];	
$url=$row["url"];	
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

<link rel="stylesheet" href="css/easyzoom.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
</head>

<body>
<?php include('header.php'); ?>

<div class="container">
<div class="subcontainer padtb">

<div class="phol">
<div class="prolef">
<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails" style="border:1px solid #CCC">
				<a href="<?php echo $pic ?>">
					<img src="<?php echo $pic ?>" alt="" width="100%" />
				</a>
			</div>
<?php
  
  
 include "storescripts/connect_to_mysql.php";
 $sql1 = "SELECT * FROM productpic WHERE productid=".$id." ORDER BY id ASC";
    $query1 = mysqli_query($db_conx, $sql1); 
//$row=mysql_fetch_array($result);


echo "<ul class=thumbnails>";
while($row=mysqli_fetch_array($query1))
{
echo "<li><a href=pictures/".$row["image"]." data-standard=pictures/".$row["image"]."><img src=pictures/".$row["image"]." /></a></li>";
}
echo "</ul>";
  
  
  ?>
	
            <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="dist/easyzoom.js"></script>
	<script>
		// Instantiate EasyZoom instances
		var $easyzoom = $('.easyzoom').easyZoom();

		// Setup thumbnails example
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

		$('.thumbnails').on('click', 'a', function(e) {
			var $this = $(this);

			e.preventDefault();

			// Use EasyZoom's `swap` method
			api1.swap($this.data('standard'), $this.attr('href'));
		});

		// Setup toggles example
		var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

		$('.toggle').on('click', function() {
			var $this = $(this);

			if ($this.data("active") === true) {
				$this.text("Switch on").data("active", false);
				api2.teardown();
			} else {
				$this.text("Switch off").data("active", true);
				api2._init();
			}
		});
	</script>
</div>
<div class="promid">
</div>
<div class="prorig">
<h1 class="prohead"><?php echo $product; ?></h1>

<div class="dschd">Description</div>
<div class="dscul">
<?php echo $dscr; ?>
</div>

<div class="dschd">Store</div>

<ul class="store">
<li>
<table>
<tr>
<td>
<img src="images/amazon-large.png" />
</td>
<td>
<a href="#">Buy</a>
</td>
</tr>
</table>
</li>

<li>
<table>
<tr>
<td>
<img src="images/flipkart-large.png" />
</td>
<td>
<a href="#">Buy</a>
</td>
</tr>
</table>
</li>
</ul>

</div>
</div>

</div>
</div>

<?php include('footer.php'); ?>
</body>
</html>