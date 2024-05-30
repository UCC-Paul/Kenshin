<?php
session_start();

@include 'config.php';




if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'Product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'Product added to cart succesfully';
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
	<title>KenshinBuilds | Products</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
	<script src="https://use.fontawesome.com/a517593387.js"></script>
</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>



<?php include 'header1.php'; ?>


			
		</div>

		<div class="small-container">

            <div class="row row-2">
                <h2>All Products</h2>
                <select>
                    <option>Default Sorting</option>
                    <option>Default Price</option>
                    <option>Default Popularity</option>
                    <option>Default Rating</option>
                    <option>Default Sale</option>
                </select>

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

					   <?php
							if(isset($_SESSION['user_name'])){
		
						?>
						<input type="submit" class="btn" value="Add to cart" name="add_to_cart" onclick="return confirm('Add to Cart?')">
						<?php }
						?>











					   


					
				</div>
			</form>
				
		<?php
         };
      };
      ?>
	
<?php include 'footer.php'; ?>

		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/function.js"></script>
		<script type="text/javascript" src="js/admin.js"></script>

	
</body>
</html>


