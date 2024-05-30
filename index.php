<?php

@include 'config.php';

	session_start();

	$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
    $row_count = mysqli_num_rows($select_rows);


	

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>KenshinBuilds | Keyboard Store</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
	<script src="https://use.fontawesome.com/a517593387.js"></script>

</head>
<body>

<?php include 'header1.php'; ?>


		<!------ Main Product ------>

		<div class="header">
			<div class="container">
				<div class="row">
					<div class="column">
						<h1>KENSHIN<br>MECHANICAL SERIES</h1>
						<p>K120 Corded is reliable and durable, equipped with a<br>number pad with an easy-to-use design that works<br>right out of the box. Just plug in this corded keyboard<br>via USB and go.</p>
				<a href="products.php" class="btn" style="position: relative; top:25px;" >Explore now &#8594</a>
					</div>
					<div class="column">
						<img src="src/kb.png">
					</div>
				</div>
			</div>
		</div>


		<!------ Featured Categories 
		<div class="categories">
			<div class="small-container">
				<div class="row">
				<div class="column2">
					<img src="src/products/kb (1).webp">
				</div>
				<div class="column2">
					<img src="src/products/kb (2).webp">
				</div>
				<div class="column2">
					<img src="src/products/kb (11).webp">
				</div>	
			</div>
	
		</div>
			
		------>
	
	
		<!------ Featured Products 
		<div class="small-container">
			<h2 class="title">Featured Products</h2>
			<div class="row">
				<div class="column3">
					<a href="includes/product-details.php"><img src="src/products/kb (6).webp"></a>
					<a href="includes/product-details.php"><h4>Kenshin</h4></a>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<p>100 PESOS</p>
				</div>
				<div class="column3">
					<a href="includes/product-details.php"><img src="src/products/product6.jpg"></a>
					<a href="includes/product-details.php"><h4>Rakk</h4></a>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<p>100 PESOS</p>
				</div>
				<div class="column3">
					<a href="includes/product-details.php"><img src="src/products/product7.jpg"></a>
					<a href="includes/product-details.php"><h4>Corsair</h4></a>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
					</div>
					<p>100 PESOS</p>
				</div>
				<div class="column3">
					<a href="includes/product-details.php"><img src="src/products/product8.jpg"></a>
					<a href="includes/product-details.php"><h4>Logitech</h4></a>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<p>100 PESOS</p>
				</div>
			</div>

			------>
	
			<!------ latest Products ------>
			
	
		<!-------- Special Offers 
		<div class="offer">
			<div class="small-container">
				<div class="row">
					<div class="column">
						<img src="src/products/product10.jpg" class="offer-img">
					</div>
					<div class="column">
						<p>KENSIN BUILDS EXCLUSIVE!</p>
						<h1>KENSHIN BOARD</h1>
						<small>K120 Corded is reliable and durable, equipped with a number pad with an easy-to-use design that works right out of the box. Just plug in this corded keyboard via USB and go.</small>
						<br>
						<a href="" class="btn">BUY NOW &#8594;</a>
					</div>
				</div>
			</div>
		</div>

		--------->


		<!-------- ALL PRODUCTS ------>

		<div class="small-container">

            <div class="row row-2">
			<h2 class="title" style="color: white;">Latest Products</h2>
               

            </div>
			
			<div class="row">

			<?php
         
     		$select_products = mysqli_query($conn, "SELECT * FROM `products`");
    	    if(mysqli_num_rows($select_products) > 0){
       			while($fetch_product = mysqli_fetch_assoc($select_products)){
     		?>
						
			<form action="" method="post" style="flex-basis:25% ;">
				<div class="column3">
					<a href="#"><img src="./admin/uploaded_img/<?php echo $fetch_product['image']; ?>"></a>
					<a href="#"><h4 style="margin-top:15px ;"><?php echo $fetch_product['name']; ?></h4></a>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
					</div>
					<p style="font-size:20px ;">₱ <?php echo $fetch_product['price']; ?></p>
					<input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
           			<input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
           			<input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">


					

					
				</div>
			</form>
				
		<?php
         };
      };
      ?>
	
		<!------------- REVIEWS -------------->
		<div class="reviews">
			<div class="small-container">
				<div class="row">
					<div class="column2">
						<i class="fa fa-quote-left"></i>
						<p>OMG THIS IS SO GOOD</p>
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<img src="img/avatar.svg">
						<h3>Paul Pogi</h3>
					</div>
					<div class="column2">
						<i class="fa fa-quote-left"></i>
						<p>Very good product highly recommended must buy!!</p>
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<img src="img/avatar.svg">
						<h3>Juan Dela Cruz</h3>
					</div>
					<div class="column2">
						<i class="fa fa-quote-left"></i>
						<p>WOW VERY AMAZING</p>
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
						</div>
						<img src="img/avatar.svg">
						<h3>Jon Snow</h3>
					</div>
					
				</div>
			</div>
		</div>



		<?php include 'footer.php'; ?>
	
		


	<script type="text/javascript" src="js/function.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>