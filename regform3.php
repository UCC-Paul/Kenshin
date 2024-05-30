
<?php

session_start();


if (isset($_POST['submit'])) {


	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];

	

	

    foreach ($_POST as $key => $value){
        $_SESSION['info'][$key] = $value;
    }


    $keys = array_keys($_SESSION['info']);

	if(strlen($uname) <8 || strlen($uname) >15){
		$error="Username must be atleast 8 characters";
	}
	elseif($pass != $cpass){
        $error="Password does not match";
    }
	

    elseif (in_array('submit' ,$keys)) {
        unset($_SESSION ['info']['submit']);
		header("location: submit.php");
    }

    

    /*
    echo "<pre>";
    print_r($_SESSION['info']);
    echo "</pre>";
    */


}

?>




<!DOCTYPE html>
<html>
<head>
	<title>KenshinShop - Register</title>
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">




</head>
<body>
	<img class="wave" src="src/blackwave2.jpg">
	<div class="container">
		<div class="img">
			<img src="SRC/logo.png">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Registration</h2>

				<h1>
				<?php
				if(isset($error)){
					echo $error;
				}
				?>
				
				</h1>



				<!------- Username Code INPUT FIELD --------->
				
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Username</h5>
           		    	<input type="text" class="input" required name="uname" maxlength="15" style="text-transform: lowercase;"
						value="<?= isset($_SESSION['info']['uname'])?   $_SESSION['info']['uname'] : ''?>">
            	   </div>
            	</div>


				<!------- Password INPUT FIELD --------->
				
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" required name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
						title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
						value="<?= isset($_SESSION['info']['pass'])?   $_SESSION['info']['pass'] : ''?>">
            	   </div>
            	</div>


				<!------- Confirm Password INPUT FIELD --------->
				
				<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Confirm Password</h5>
           		    	<input type="password" class="input" required name="cpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
						title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
						value="<?= isset($_SESSION['info']['cpass'])?   $_SESSION['info']['cpass'] : ''?>">
            	   </div>
            	</div>



            	<a href="#">Terms and Conditions</a>
            	<input type="submit" class="btn" value="Submit" name="submit">
				<p>already have an account? <a href="login.php" style="text-align:center;">Log In</a></p>
            </form>
        </div>
    </div>


    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
