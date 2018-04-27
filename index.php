<?php
   session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Habrostore</title>
<link href="styles/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="scripts/jquery.js"></script>
   <script src="scripts/responsiveslides.min.js"></script>
<script>
    $(function () {
        $(".rslides").responsiveSlides();
    });
</script>
 <script>
    // You can also use "$(window).load(function() {"
    $(function () {

      // Slideshow 1
      $("#slider1").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "centered-btns"
      });

    });
  </script>
  </head>

<body>
<?php include('header.php'); ?>
<div class="container">
<ul class="rslides">
  <li><a href="#">
  <div class="table">
  <div class="top1">
  <img src="images/habrostore-image.jpg" />
  </div>
   <div class="top1 gbak">
  <img src="images/habrostore-text.svg" />
  </div>
  </div>
  </a></li>
  <li><a href="#">
  <div class="table">
  <div class="top1 gbak">
  <img src="images/habrostore-text.svg" />
  </div>
  <div class="top1">
  <img src="images/habrostore-image.jpg" />
  </div>
   
  </div>
  </a></li>
</ul>
</div>
<div class="container">
<div class="subcontainer padtb">
<h1 class="mainhd"><div class="d1"></div>How to Control<div class="d2"></div></h1>

<div class="pesthol">
<ul class="pest">
<li>
<div class="aa">
<a href="products.php?pest=Cocroach">
<img src="images/cocroach.png"/>
<div class="tag">Cocroach</div>
</a>
</div>
</li>
<li>
<div class="aa">
<a href="products.php?pest=Mosquitoes">
<img src="images/mosquitoes.png"/>
<div class="tag">Mosquitoes</div>
</a>
</div>
</li>
<li>
<div class="aa">
<a href="products.php?pest=Ants">
<img src="images/ant.png"/>
<div class="tag">Ants</div>
</a>
</div>
</li>
<li>
<div class="aa">
<a href="products.php?pest=Bed Bugs">
<img src="images/bed-bugs.png"/>
<div class="tag">Bed Bugs</div>
</a>
</div>
</li>
<li>
<div class="aa">
<a href="products.php?pest=Rats">
<img src="images/rats.png"/>
<div class="tag">Rats</div>
</a>
</div>
</li>
<li>
<div class="aa">
<a href="products.php?pest=Flies">
<img src="images/fly.png"/>
<div class="tag">Flies</div>
</a>
</div>
</li>
<li>
<div class="aa">
<a href="products.php?pest=Termite">
<img src="images/termite.png"/>
<div class="tag">Termite</div>
</a>
</div>
</li>
</ul>
<div class="clr"></div>
</div>


</div>
</div>

<div class="container bgg">
<div class="subcontainer padtb" style="padding-bottom:60px">
<h1 class="mainhd"><div class="d1"></div>Home Care<div class="d2"></div></h1>
<div class="pesthol">
<?php

  
 include "storescripts/connect_to_mysql.php";

 $sql = "SELECT * FROM products WHERE catagory='Home Care' ORDER BY id ASC LIMIT 9";
    $query = mysqli_query($db_conx, $sql); 
//$row=mysql_fetch_array($result);


echo "<ul class=items>";
while($row=mysqli_fetch_array($query))
{
	$id = $row["id"];
	$prod = $row["productname"];
	$im="pictures/".$row["image"];
echo "<li><div class=bb><a href=product-profile.php?id=".$row["id"]."><img src=".$im." class=proim /><div class=tag1>".$prod."</div></a></div></li>";
}
echo "</ul>";
  
  
  ?>
<div class="clr"></div>
</div>

</div>
</div>

<div class="container">
<div class="subcontainer padtb">
<h1 class="mainhd" style="padding-bottom:30px;"><div class="d1"></div>Our Brands<div class="d2"></div></h1>
<div id="tech-slideshow">
    <div id="tech-slideshow-1">
    
<img src="images/Dutch-&-Habro-casears.png" class="marim"/>
<img src="images/Dutch-&-Habro-habro.png" class="marim"/>
<img src="images/Dutch-&-Habro-goodbye-roaches.png" class="marim"/>
<img src="images/Dutch-&-Habro-lovaire.png" class="marim"/>
<img src="images/Dutch-&-Habro-royal-family.png" class="marim"/>
<img src="images/Dutch-&-Habro-gardenz.png" class="marim"/>

<img src="images/Dutch-&-Habro-casears.png" class="marim"/>
<img src="images/Dutch-&-Habro-habro.png" class="marim"/>
<img src="images/Dutch-&-Habro-goodbye-roaches.png" class="marim"/>
<img src="images/Dutch-&-Habro-lovaire.png" class="marim"/>
<img src="images/Dutch-&-Habro-royal-family.png" class="marim"/>
<img src="images/Dutch-&-Habro-gardenz.png" class="marim"/>

</div>
</div>

</div>
</div>

<div class="container bg1">
<div class="subcontainer padtb">
<h1 class="mainhd" style="color:#FFF;"><div class="d1"></div>Media<div class="d2"></div></h1>

<div class="table padt30">
<div class="lefhab">
<p class="newshd">Better Products for Better Life</p>
<p class="newspara">
To express our brand message to our consumers, we constantly take up and initiate a lot of researches that leads us to the latest market innovations. Our constantly improved production techniques ensure that the customers get the best end products. The thought behind all this is to not only provide the best products, but also ensure that the consumers take an informed decision. A conscious buyer would be aware of all the products available, but would also know what goes in to manufacture them. Our role here is to provide them with complete knowledge about their choices.
</p>

</div>
<div class="midhab"></div>
<div class="righab">
<iframe class="you" src="https://www.youtube.com/embed/Sm_vCDqct0Y" frameborder="0" allowfullscreen></iframe>
</div>
</div>


</div>
</div>

<div class="container bgg">
<div class="subcontainer padtb">
<h1 class="mainhd"><div class="d1"></div>Available in<div class="d2"></div></h1>

<div class="pesthol">
<div class="clr"></div>
<ul class="fourul2">
<li><div><a href="#"><img src="images/amazon-large.png"/></a></div></li>
<li><div><a href="#"><img src="images/flipkart-large.png"/></a></div></li>
<li><div><a href="#"><img src="images/shopclues-large.png"/></a></div></li>
<li><div><a href="#1"><img src="images/homeshop18-large.png"/></a></div></li>
</ul>
<div class="clr"></div>
</div>

</div>
</div>

<?php include('footer.php'); ?>
</body>
</html>