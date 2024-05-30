<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>Products - KenshinBuilds</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
	<script src="https://use.fontawesome.com/a517593387.js"></script>
</head>
<body>


		<div class="container">
			<div class="navbar">
				<div class="logo">
					<a href="../index.html"><img src="../src/logo.png" width="125px"></a>
				</div>
				<nav>
					<ul id="MenuItems">
						<li><a href="../index.html">Home</a></li>
						<li><a href="../products.html">Products</a></li>
						<li><a href="../about.html">About</a></li>			
						<li><a href="../contact.html">Contact</a></li>
						<li><a href="../account.html">Accounts</a></li>
					
					
					</ul>
				</nav>
				<a href="../cart.html"><img src="../src/cart.png" width="30px" height="30px"></a>
				<img src="../src/menu.png" class="menu-icon" onclick="menutoggle">
				
			</div>
		</div>

		<!------------ SINGLE PRODUCT DETAILS --------------->

		<div class="small-container single-product">
			<div class="row">
				<div class="column">
					<img src="../src/products/product5.jpg" width="100%" id="ProductImg">


					<div class="small-img-row">
						<div class="small-img-col">
							<img src="../src/products/product5.jpg" width="100%" class="small-img">
						</div>
						<div class="small-img-col">
							<img src="../src/products/product5.jpg" width="100%" class="small-img">
						</div>
						<div class="small-img-col">
							<img src="../src/products/product5.jpg" width="100%" class="small-img">
						</div>
						<div class="small-img-col">
							<img src="../src/products/product5.jpg" width="100%" class="small-img">
						</div>
					</div>

				</div>
				<div class="column">
					<p>Home / Keyboard</p>
					<h1>Mechanical Keyboard by Kenshin</h1>
					<h4>₱959.99</h4>
					<select>
						<option>Select Variation</option>
						<option>Red and Black</option>
						<option>Black and Blue</option>
						<option>White</option>
						<option>Matte Black</option>
						<option>Base only</option>
					</select>
					<input type="number" value="1">
					<a href="" class="btn">Add To Cart</a>
					<h3>Product Details <i class="fa fa-indent"></i> </h3>
					<br>
					<p>AJOKHDOIKJAHASD<br>AAJHDGSDJHSADHGASHDG</p>
				</div>
			</div>
		</div>

		<!-------------- TTILE ---------->
		<div class="small-container">
			<div class="row row-2">
				<h2>Related Products</h2>
				<p>View More</p>
			</div>
		</div>


		
		<!-------------- PRODUCTS ---------->
		<div class="small-container">
			
			<div class="row">
				<div class="column3">
					<img src="../src/products/product1.jpg">
					<h4>Kenshin</h4>
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
					<img src="../src/products/product2.jpg">
					<h4>Rakk</h4>
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
					<img src="../src/products/product3.jpg">
					<h4>Corsair</h4>
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
					<img src="../src/products/product4.jpg">
					<h4>Logitech</h4>
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

		</div>	
	
	
		<!-------------- FOOTER ---------->
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="footer-col-1">
						<h3>THE KENSHIN GROUP INC.</h3>
						<p>Kenshin olrayt</p>
						<div class="logofooter">
							<img src="../src/logo.png">
							<img src="../src/logo2.png">
	
						</div>
					</div>
					<div class="footer-col-2">
						<img src="../src/logo.png">
						<p>KAMI AY NANDITO HINDI PARA MAKIPAG AWAY</p>
					</div>
					<div class="footer-col-3">
						<h3>USEFUL LINKS</h3>
						<ul>
							<li>Blog Post</li>
							<li>Return Policy</li>
							<li>Terms & Conditions</li>
						</ul>
					</div>
					<div class="footer-col-4">
						<h3>Follow Us</h3>
						<ul>
							<li>Facebook</li>
							<li>Twitter</li>
							<li>Instagram</li>
						</ul>
					</div>
				</div>
				<hr>
				<p class="copyright">Copyright 2022 TEAM KENSHIN</p>
			</div>
		</div>

		<script src="../js/script.js"></script>

	
</body>
</html>