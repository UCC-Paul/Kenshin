<?php


@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>Products - KenshinBuilds</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin.css">

   <style>
	
.row{
	margin-left: 30px;
	margin-right: 30px;
	display: flex;
	align-items: center;
	flex-wrap: wrap;
	justify-content: space-around;
}

.column3{
	flex-basis: 25%;
	padding: 11px;
	min-width: 22px;
	margin-bottom: 50px;
	transition: transform 0.5s;
}

.column3:hover{
	transform: translateY(-5px);
}

.column3 img{
	width: 100%;
}

h4{
	font-weight: normal;
}

.column3 p{
	font-size: 18px;
}

.column3 h4{
	font-size: 18px;
}
   </style>

</head>
<body>

<?php include 'header.php'; ?>


		<div class="small-container">

			
			<div class="row">	

			<?php
         
     		$select_products = mysqli_query($conn, "SELECT * FROM `products`");
    	    if(mysqli_num_rows($select_products) > 0){
       			while($fetch_product = mysqli_fetch_assoc($select_products)){
     		?>
				
			

				<div class="column3">
					<a href="includes/product-details3.php"><img src="uploaded_img/<?php echo $fetch_product['image']; ?>"></a>
					<a href="includes/product-details3.php"><h4><?php echo $fetch_product['name']; ?></h4></a>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
					</div>
					<p>₱ <?php echo $fetch_product['price']; ?></p>

				</div>

				<?php
         };
      };
      ?>

				
		</div>	
	

		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/function.js"></script>

	
</body>
</html>