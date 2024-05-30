
<?php

session_start();


if (isset($_POST['next'])) {


    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];






    foreach ($_POST as $key => $value){
        $_SESSION['info'][$key] = $value;
    }


    $keys = array_keys($_SESSION['info']);

    if(strlen($fname) <3 || strlen($fname) >30){
		$error="Firstname must be atleast 3 characters";
	}

    elseif(strlen($lname) <2 || strlen($lname) >30){
		$error="Lastname must be atleast 2 characters";
	}
    elseif(strlen($phone) <10 || strlen($phone) >10){
		$error="Phone must be 10 digits starting at 9 (+63 9xxx)";
	}
    
    
    
    elseif (in_array('next' ,$keys)) {
        unset($_SESSION ['info']['next']);
        header("location: regform2.php");
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
	<link rel="stylesheet" type="text/css" href="css/style3.css?version=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<script type="text/javascript">
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [year, month, day].join('-');

        }

        function getAge(dateString) {
            var birthdate = new Date().getTime();
            if (typeof dateString === 'undefined' || dateString === null || (String(dateString) === 'NaN')) {
                // variable is undefined or null value
                birthdate = new Date().getTime();
            }
            birthdate = new Date(dateString).getTime();
            var now = new Date().getTime();
            // now find the difference between now and the birthdate
            var n = (now - birthdate) / 1000;
            if (n < 604800) { // less than a week
                var day_n = Math.floor(n / 86400);
                if (typeof day_n === 'undefined' || day_n === null || (String(day_n) === 'NaN')) {
                    // variable is undefined or null
                    return '';
                } else {
                    return day_n + ' day' + (day_n > 1 ? 's' : '') + ' old';
                }
            } else if (n < 2629743) { // less than a month
                var week_n = Math.floor(n / 604800);
                if (typeof week_n === 'undefined' || week_n === null || (String(week_n) === 'NaN')) {
                    return '';
                } else {
                    return week_n + ' week' + (week_n > 1 ? 's' : '') + ' old';
                }
            } else if (n < 31562417) { // less than 24 months
                var month_n = Math.floor(n / 2629743);
                if (typeof month_n === 'undefined' || month_n === null || (String(month_n) === 'NaN')) {
                    return '';
                } else {   
                    return month_n + ' month' + (month_n > 1 ? 's' : '') + ' old';
                }
            } else {
                var year_n = Math.floor(n / 31556926);
                if (typeof year_n === 'undefined' || year_n === null || (String(year_n) === 'NaN')) {
                    return year_n = '';
                } else {
                    return year_n + ' year' + (year_n > 1 ? 's' : '') + ' old';
                }
            }
        }

        function getAgeVal(pid) {
            var birthdate = formatDate(document.getElementById("birthdate").value);
            var count = document.getElementById("birthdate").value.length;
            if (count == '10') {
                var age = getAge(birthdate);
                var str = age;
                var res = str.substring(0, 1);
                if (res == '-' || res == '0') {
                    document.getElementById("birthdate").value = "";
                    document.getElementById("age").value = "";
                    $('birthdate').focus();
                    return false;
                } else {
                    document.getElementById("age").value = age;
                }
            } else {
                document.getElementById("age").value = "";
                return false;
            }
        }
    </script>






</head>
<body>
	<img class="wave" src="src/blackwave2.jpg">
	<div class="container">
		<div class="img">
			<img class="wave" src="src/logo.png" style="width: 335px; height: 335px">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title"></h2>PERSONAL INFORMATION</h2>

                <h1>
				<?php
				if(isset($error)){
					echo $error;
				}
				?>
				
				</h1>

				<!------ FIRSTNAME INPUT FIELD --------->

           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Firstname</h5>
           		   		<input type="text" class="input" required name="fname" onkeydown="return /[a-z, ]/i.test(event.key)" maxlength="20" value="<?= isset($_SESSION['info']['fname'])?   $_SESSION['info']['fname'] : ''?>">
           		   </div>
           		</div>

                <!------ Middle Name INPUT FIELD --------->

           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Middle Name (optional)</h5>
           		   		<input type="text" class="input" name="mname" onkeydown="return /[a-z, ]/i.test(event.key)" maxlength="20" value="<?= isset($_SESSION['info']['mname'])?   $_SESSION['info']['mname'] : ''?>">
           		   </div>
           		</div>

				<!------- LASTNAME INPUT FIELD --------->



				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Lastname</h5>
           		   		<input type="text" class="input" required name="lname" onkeydown="return /[a-z, ]/i.test(event.key)" maxlength="20" value="<?= isset($_SESSION['info']['lname'])?   $_SESSION['info']['lname'] : ''?>">
           		   </div>
           		</div>
                




                   <label>Gender</label>
				<select name="" required class="form-control" size="1">
           			 <option disabled selected hidden value="" selected="selected">Select Gender</option>
                     <option value="" selected="selected">Male</option>
                     <option value="" selected="selected">Female</option>
       			 </select>
                


				<!------- BIRTHDATE INPUT FIELD --------->

				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-cake-candles"></i>
           		   </div>
           		   <div class="div">
           		   		<!--<h5>Birthdate</h5>-->
           		   		<input type="date" id="birthdate" class="input" required name="birthdate" maxlength="10" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);">
           		   </div>
           		</div>

				<!------- AGE INPUT FIELD --------->

				<div class="input-div one">
           		   <div class="i">
                      <i class="fas fa-cake-candles"></i>
           		   </div>
           		   <div class="div">
           		   		<!---<h5>Age</h5>---->
           		   		<input type="text" class="input" name="age" id="age" autocomplete="off" readonly="true" placeholder="Age">
           		   </div>
           		</div>


				<!------- EMAIL INPUT FIELD --------->
				
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-envelope"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Email</h5>
           		    	<input type="email" class="input" required name="email" value="<?= isset($_SESSION['info']['email'])?   $_SESSION['info']['email'] : ''?>">
            	   </div>
            	</div>


				<!------- Phone INPUT FIELD --------->
				
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-phone"></i>
           		   </div>
           		   <div class="div">
                      <h4 style="    position: absolute; top: -20px; left: 2px; font-size: 16px; color: gray;">+Phone</h4>
                        <h4 style="    position: absolute; top: 7px; left: 2px; font-size: 20px; color: #333;">+63</h4>
           		    	<input type="text" style="padding: 0.5rem 2.7rem;" class="input" required name="phone" placeholder="9xx" maxlength="10" onkeypress="return restrictAlphabets(event)"
                        value="<?= isset($_SESSION['info']['phone'])?   $_SESSION['info']['phone'] : ''?>">
            	   </div>
            	</div>


                <!------- FOOTER --------->


            	<a href="#">Terms and Conditions</a>
            	<input type="submit" class="btn" value="Next" name="next">
				<p>already have an account? <a href="login.php" style="text-align:center;">Log In</a></p>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        function restrictAlphabets(e){
            var x = e.which || e.keycode;
            if((x >=48 && x <= 57))
            return true;
            else
            return false;
        }
    </script>

	
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
