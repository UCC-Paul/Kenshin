<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <style>


ul li {
display: block;
position: relative;
}
ul li a {
margin-left: 8px;
display: inline-block;
color: #FFF;
text-decoration: none;
text-align: center;
font-size: 20px;
}
ul li ul.dropdown li {
display: block;
}
ul li ul.dropdown {
width: 200px;
position: absolute;
background-color: black;
z-index: 999;
display: none;
}

ul li:hover ul.dropdown {
display: block;
transition: 1s;
}
</style>

</head>
<body>
  
   

<header class="header">

   <div class="flex">

      <a href="#" class="logo">KenshinBuilds</a>
      <nav class="navbar">

         <a href="admin.php">Dashboard</a>
      </nav>

      <ul>
      <li>
       	<a href="productsadmin.php">Products ▾</a>
       	<ul class="dropdown">
        	<li><a href="addproducts.php">Manage Products</a></li>
      	</ul>
      	</li>
      </ul>

      <?php
      if(isset($_SESSION['admin_name'])){
          echo 
          "<ul>
          <li>
          <a href=\"#\">$_SESSION[admin_name]</a>
          <ul class=\"dropdown\">
          <li><a href=\"logout.php\">Logout</a></li>
      	</ul>
      	</li>
          </li>
          </ul>"; 
         
      }
      ?>

      ?>


      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <!----   <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a> ------>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>

</body>
</html>