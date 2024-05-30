<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    
	$email = $_POST['email'];
	$pass =  $_POST['password'];
 
 
	$select = " SELECT * FROM accounts WHERE (email = '$email' or username = '$email') && password = '$pass'";
 
	$result = mysqli_query($conn, $select);
 
	if(mysqli_num_rows($result) > 0){
 
	   $row = mysqli_fetch_array($result);
 
	   if($row['usertype'] == 'admin'){
 
		  $_SESSION['admin_name'] = $row['firstname'];
		  header('location:./admin/dashboard.php');
 
	   }elseif($row['usertype'] == 'user'){
		
		  $_SESSION['user_name'] = $row['firstname'];
		  $_SESSION['middlename'] = $row['middlename'];
		  $_SESSION['lastname'] = $row['lastname'];

		  $_SESSION['phone'] = $row['phone'];
		  $_SESSION['house'] = $row['house'];
		  $_SESSION['barangay'] = $row['barangay'];
		  $_SESSION['city'] = $row['city'];
		  $_SESSION['province'] = $row['province'];
		  $_SESSION['postal'] = $row['postal'];

		  header('location:index.php');
 
	   }
	  
	}else{
	   $error[] = 'incorrect email or password!';
	}
 
 };

?>








<!DOCTYPE html>
<html>
<head>
	<title>KenshinShop - Login</title>
	<link rel="stylesheet" type="text/css" href="css/style3.css">	
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
		
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="SRC/blackwave2.jpg">
	<div class="container">
		<div class="img">
			<img src="src/logo.png">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome</h2>
				<h1>
				<?php
      			if(isset($error)){
        		 foreach($error as $error){
           		 echo '<span class="error-msg">'.$error.'</span>';
        		 };
      			};
     			?>
				
				</h1>
				<p style="margin-bottom:40px ;">Please log in to use platform</p>
				
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email/Username</h5>
           		   		<input type="text" class="input" name="email">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Log In" name="submit">
				<p style="font-size:16px ;">don't have an account? <a href="regform1.php" style="text-align:center;">Create new account</a></p>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
