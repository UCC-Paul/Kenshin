

<div class="header">
	<div class="container">
		<div class="navbar">
				<div class="logo">
					<a href="index.php"><img src="src/logo.png" width="125px"></a>
				</div>
				<div class="logo">
					<?php
					
					if(isset($_SESSION['user_name'])){
					echo "
					<h3 style=\"color:white; position:relative; left:20px;\" >Hello $_SESSION[user_name]</h3>
					";
				}
				?>
				</div>
				<nav>
					<ul id="MenuItems">


						<li><a href="index.php">Home</a></li>
						<li><a href="products.php">Products</a></li>
						<li><a href="about.php">About</a></li>			
						<li><a href="contact.php">Contact</a></li>
						<li>
							<?php
								if(isset($_SESSION['user_name'])){
									echo "<a href=\"logout.php\">Logout</a>";
								}
								else{
									echo "<a href=\"login.php\">Login</a>";
								}
							?>
						</li>
					
					</ul>
				</nav>


				<?php
				$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
				$row_count = mysqli_num_rows($select_rows);

				if(isset($_SESSION['user_name'])){
				?>
				<a href="cart.php" class="cart"><img src="src/cart.png" width="30px" height="30px"><span> <?php echo $row_count; ?></span></a>
				
				<?php } ?>
				<img src="src/menu.png" class="menu-icon" onclick="menutoggle">
				
			</div>
			
	</div>
</div>