
<?php

session_start();


if (isset($_POST['next'])) {

    $postal=$_POST['postal'];
    $house=$_POST['house'];




    foreach ($_POST as $key => $value){
        $_SESSION['info'][$key] = $value;
    }


    $keys = array_keys($_SESSION['info']);

    if(strlen($postal) <4 || strlen($postal) >10){
		$error="Postal Code must be atleast 4 characters";
	}

    elseif(strlen($house) <8 || strlen($house) >100){
		$error=" Main Address must be atleast 8 characters";
	}


    elseif (in_array('next' ,$keys)) {
        unset($_SESSION ['info']['next']);
        header("location: regform3.php");
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
			<img src="src/logo.png">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Address</h2>

                <h1>
				<?php
				if(isset($error)){
					echo $error;
				}
				?>
				
				</h1>

				<div class="inpute-div pass">
                <label>Province</label>
				<select name="optone" required class="form-control" id="stateSel" size="1" value="<?= isset($_SESSION['info']['optone'])?   $_SESSION['info']['optone'] : ''?>>
           			 <option value="" selected="selected">Select Province</option>
       			 </select>
                 <br>

                 <label>City</label>
      			<select name="opttwo" required class="form-control" id="countySel" size="1 value="<?= isset($_SESSION['info']['opttwo'])?   $_SESSION['info']['opttwo'] : ''?>">
           			 <option value="" selected="selected">Select City</option>
       			</select>

                <br>

                <label>Barangay</label>
                 <select name="optthree" required class="form-control" id="citySel" size="1 value="<?= isset($_SESSION['info']['optthree'])?   $_SESSION['info']['optthree'] : ''?>">
                     <option value=""  selected="selected">Select Barangay</option>
                </select>
		</div>




				<!------- Postal Code INPUT FIELD --------->
				
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-map-pin"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Postal Code</h5>
           		    	<input type="text" class="input" required name="postal"  onkeypress="return restrictAlphabets(event)"
                        value="<?= isset($_SESSION['info']['postal'])?   $_SESSION['info']['postal'] : ''?>">
            	   </div>
            	</div>


				<!------- House INPUT FIELD --------->
				
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-map"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Building, House No., Street Name</h5>
           		    	<input type="text" class="input" required name="house" value="<?= isset($_SESSION['info']['house'])?   $_SESSION['info']['house'] : ''?>">
            	   </div>
            	</div>



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

	<script>
    var stateObject = {
        "Metro Manila": {
            "Caloocan": [
"Barangay 1 - Sangandaan", 
"Barangay 2 - Sangandaan", 
"Barangay 3 - Sangandaan", 
"Barangay 4 - Sangandaan", 
"Barangay 5 - Sangandaan", 
"Barangay 6 - Sangandaan", 
"Barangay 7 - Sangandaan", 
"Barangay 8 - Dagat-dagatan", 
"Barangay 9 - Poblacion", 
"Barangay 10 - Poblacion", 
"Barangay 11 - Poblacion", 
"Barangay 12 - Dagat-Dagatan",
"Barangay 13 - Poblacion", 
"Barangay 14 - Dagat-Dagatan", 
"Barangay 15 - Poblacion", 
"Barangay 16 - Poblacion", 
"Barangay 17 - Poblacion", 
"Barangay 18 - Poblacion", 
"Barangay 19 - Poblacion", 
"Barangay 20 - Kaunlaran Village (C-3 Road)", 
"Barangay 21 - Kaunlaran Village (C-3 Road)", 
"Barangay 22 - Kaunlaran Village (C-3 Road)", 
"Barangay 23 - Kaunlaran Village (C-3 Road)", 
"Barangay 24 - Kaunlaran Village (C-3 Road)", 
"Barangay 25 - Maypajo", 
"Barangay 26 - Maypajo", 
"Barangay 27 - Maypajo", 
"Barangay 28	Dagat-Dagatan", 
"Barangay 29 - Maypajo", 
"Barangay 30 - Maypajo", 
"Barangay 31 - Maypajo", 
"Barangay 32 - Maypajo", 
"Barangay 33 - Maypajo", 
"Barangay 34 - Maypajo", 
"Barangay 35 - Maypajo", 
"Barangay 36 - Marulas", 
"Barangay 37 - Marulas", 
"Barangay 38 - Grace Park West", 
"Barangay 39 - Grace Park West", 
"Barangay 40 - Grace Park West", 
"Barangay 41 - Grace Park West", 
"Barangay 42 - Grace Park West", 
"Barangay 43 - Grace Park West (3rd Avenue)", 
"Barangay 44 - Grace Park West (3rd Avenue)", 
"Barangay 45 - Grace Park West (3rd Avenue)", 
"Barangay 46 - Grace Park West (4th Avenue)", 
"Barangay 47 - Grace Park West (4th Avenue)", 
"Barangay 48 - Grace Park West (4th Avenue)", 
"Barangay 49 - Grace Park West (5th Avenue)", 
"Barangay 50 - Grace Park West (5th Avenue)", 
"Barangay 51 - Grace Park West (5th Avenue)", 
"Barangay 52 - Grace Park West (7th Avenue)", 
"Barangay 53 - Grace Park West (7th Avenue)", 
"Barangay 54 - Grace Park West (7th Avenue)", 
"Barangay 55 - Grace Park West (6th Avenue)", 
"Barangay 56 - Grace Park West (8th Avenue)", 
"Barangay 57 - Grace Park West (8th Avenue)", 
"Barangay 58 - Grace Park West (8th Avenue)", 
"Barangay 59 - Grace Park West (8th Avenue)", 
"Barangay 60 - Grace Park West (8th Avenue)", 
"Barangay 61 - Grace Park West (8th Avenue)", 
"Barangay 62 - Grace Park West (10th Avenue)", 
"Barangay 63 - Grace Park West (10th Avenue)", 
"Barangay 64 - Grace Park West (10th Avenue)", 
"Barangay 65 - Grace Park West (10th Avenue)", 
"Barangay 66 - Grace Park West (10th Avenue)", 
"Barangay 67 - Grace Park West (10th Avenue)", 
"Barangay 68 - Grace Park West (10th Avenue)", 
"Barangay 69 - Grace Park West", 
"Barangay 70 - Grace Park West", 
"Barangay 71 - Grace Park West", 
"Barangay 72 - Grace Park West (Victory Compound)", 
"Barangay 73 - Grace Park West (PNR Compound)", 
"Barangay 74 - Grace Park West (Heroes Del 96)", 
"Barangay 75 - Grace Park West (Heroes Del 96)", 
"Barangay 76 - Grace Park West (Monumento)", 
"Barangay 77 - University Hills (Samson Road)", 
"Barangay 78 - University Hills (Monumento)", 
"Barangay 79 - University Hills (Caimito Road)", 
"Barangay 80 - University Hills (UE Caloocan)", 
"Barangay 81 - Morning Breeze Subdivision", 
"Barangay 82 - Morning Breeze Subdivision", 
"Barangay 83 - Morning Breeze Subdivision", 
"Barangay 84 - Morning Breeze Subdivision (MCU)", 
"Barangay 85 - Morning Breeze Subdivision", 
"Barangay 86 - Grace Park East (EDSA)", 
"Barangay 87 - Grace Park East (EDSA)", 
"Barangay 88 - Grace Park East (11th Avenue)", 
"Barangay 89 - Grace Park East (11th Avenue)", 
"Barangay 90 - Grace Park East (11th Avenue)", 
"Barangay 91 - Grace Park East (11th Avenue)", 
"Barangay 92 - Grace Park East (11th Avenue)", 
"Barangay 93 - Grace Park East (11th Avenue)", 
"Barangay 94 - Grace Park East (Biglang-Awa)", 
"Barangay 95 - Balintawak", 
"Barangay 96 - Grace Park East (EDSA)", 
"Barangay 97 - Grace Park East (11th Avenue)", 
"Barangay 98 - Grace Park East (11th Avenue)", 
"Barangay 99 - Balintawak (Dorotea Compound)", 
"Barangay 100 - Grace Park East (11th Avenue)", 
"Barangay 101 - Grace Park East (Barrio Galino)", 
"Barangay 102 - Grace Park East (9th Avenue)", 
"Barangay 103 - Grace Park East (8th Avenue)", 
"Barangay 104 - Grace Park East (8th Avenue)", 
"Barangay 105 - Grace Park East (8th Avenue)", 
"Barangay 106 - Grace Park East (10th Avenue)", 
"Barangay 107 - Grace Park East (10th Avenue)", 
"Barangay 108 - Grace Park East (10th Avenue)", 
"Barangay 109 - Grace Park East (8th Avenue)", 
"Barangay 110 - Grace Park East (7th Avenue)", 
"Barangay 111 - Grace Park East (7th Avenue)", 
"Barangay 112 - Grace Park East (7th Avenue)", 
"Barangay 113 - Grace Park East (6th Avenue)", 
"Barangay 114 - Grace Park East (6th Avenue)", 
"Barangay 115 - Grace Park East (6th Avenue)", 
"Barangay 116 - Grace Park East (6th Avenue)", 
"Barangay 117 - Grace Park East (5th Avenue)", 
"Barangay 118 - Grace Park East (La Loma Cemetery)", 
"Barangay 119 - Grace Park East (4th Avenue)", 
"Barangay 120 - Grace Park East (2nd Avenue)", 
"Barangay 121 - Grace Park East (7th Avenue)", 
"Barangay 122 - Grace Park East (7th Avenue)", 
"Barangay 123 - Grace Park East (5th Avenue)", 
"Barangay 124 - Grace Park East (5th Avenue)", 
"Barangay 125 - Grace Park East (5th Avenue)", 
"Barangay 126 - Barrio San Jose", 
"Barangay 127 - Barrio San Jose", 
"Barangay 128 - Barrio San Jose", 
"Barangay 129 - Barrio San Jose", 
"Barangay 130 - Barrio San Jose", 
"Barangay 131 - Barrio San Jose", 
"Barangay 132 - Bagong Barrio West", 
"Barangay 133 - Bagong Barrio West", 
"Barangay 134 - Bagong Barrio West", 
"Barangay 135 - Bagong Barrio West", 
"Barangay 136 - Bagong Barrio West", 
"Barangay 137 - Bagong Barrio West", 
"Barangay 138 - Bagong Barrio West", 
"Barangay 139 - Bagong Barrio West", 
"Barangay 140 - Bagong Barrio West", 
"Barangay 141 - Bagong Barrio West", 
"Barangay 142 - Bagong Barrio West", 
"Barangay 143 - Bagong Barrio West", 
"Barangay 144 - Bagong Barrio West", 
"Barangay 145 - Bagong Barrio West", 
"Barangay 146 - Bagong Barrio West", 
"Barangay 147 - Bagong Barrio West", 
"Barangay 148 - Bagong Barrio West", 
"Barangay 149 - Bagong Barrio West", 
"Barangay 150 - Bagong Barrio West", 
"Barangay 151 - Bagong Barrio West", 
"Barangay 152 - Bagong Barrio West", 
"Barangay 153 - Bagong Barrio West", 
"Barangay 154 - Bagong Barrio West", 
"Barangay 155 - Bagong Barrio West", 
"Barangay 156 - Bagong Barrio East", 
"Barangay 157 - Bagong Barrio East", 
"Barangay 158 - Libis Baesa", 
"Barangay 159 - Libis Baesa", 
"Barangay 160 - Libis Baesa", 
"Barangay 161 - Libis Reparo", 
"Barangay 162 - Santa Quiteria", 
"Barangay 163 - Santa Quiteria", 
"Barangay 164 - Talipapa", 
"Barangay 165 - Bagbaguin", 
"Barangay 166 - Kaybiga", 
"Barangay 167 - Llano", 
"Barangay 168 - Deparo", 
"Barangay 169 - BF Homes Caloocan", 
"Barangay 170 - Deparo 2", 
"Barangay 171 - Bagumbong", 
"Barangay 172 - Urduja Village", 
"Barangay 173 - Congress", 
"Barangay 174 - Camarin (Central)", 
"Barangay 175 - Camarin", 
"Barangay 176 - Bagong Silang", 
"Barangay 177 - Cielito", 
"Barangay 178 - Kiko", 
"Barangay 179 - Amparo", 
"Barangay 180 - Tala", 
"Barangay 181 - Pangarap Village, Tala", 
"Barangay 182 - Pangarap Village, Tala", 
"Barangay 183 - Tala", 
"Barangay 184 - Tala", 
"Barangay 185 - Tala", 
"Barangay 186 - Tala", 
"Barangay 187 - Tala", 
"Barangay 188 - Tala"],

        "Las Piñas": [
            "Almanza Uno",
"Almanza Dos",
"Pamplona Dos",
"Pilar Village",
"Talon Dos",
"Talon Tres",
"Talon Kuatro",
"Talon Singko",
"B. F. International",
"Daniel Fajardo",
"Elias Aldana",
"Ilaya",
"Manuyo Uno",
"Manuyo Dos",
"Pamplona Uno",
"Pamplona Tres",
"Pulang Lupa Uno",
"Pulang Lupa Dos",
"Talon Uno",
"Zapote"],

        "Makati":[
            "Bangkal", 
"Bel-Air", 
"Carmona", 
"Cembo", 
"Comembo", 
"Dasmariñas",
"East Rembo",
"Forbes Park",
"Guadalupe Nuevo",
"Guadalupe Viejo",
"Kasilawan",
"La Paz",	
"Magallanes",
"Olympia",
"Palanan",
"Pembo",
"Pinagkaisahan",
"Pio del Pilar",
"Pitogo",
"Poblacion",
"Post Proper Northside",
"Post Proper Southside",
"Rizal",
"San Antonio",
"San Isidro",
"San Lorenzo",
"Santa Cruz",
"Singkamas",
"South Cembo",
"Tejeros",
"Urdaneta",
"Valenzuela",
"West Rembo"
],

    "Malabon":[
"Tugatog", 
"Tonsuya", 
"Tinajeros", 
"Tañong (Poblacion)", 
"Santulan", 
"San Agustin", 
"Potrero", 
"Niugan", 
"Muzon", 
"Maysilo", 
"Longos", 
"Ibaba", 
"Hulong Duhat", 
"Flores", 
"Dampalit", 
"Concepcion", 
"Catmon", 
"Bayan-bayanan", 
"Baritan", 
"Acacia"
],

        "Mandaluyong":[
            "Addition Hills", 
"Bagong Silang", 
"Barangka Drive", 
"Barangka Ibaba", 
"Barangka Ilaya", 
"Barangka Itaas", 
"Buayang Bato", 
"Burol", 
"Daang Bakal", 
"Hagdan Bato Itaas", 
"Hagdan Bato Libis", 
"Harapin Ang Bukas", 
"Highway Hills", 
"Hulo", 
"Mabini–J.Rizal", 
"Malamig", 
"Mauway", 
"Namayan", 
"New Zañiga", 
"Old Zañiga", 
"Pag-Asa", 
"Plainview", 
"Pleasant Hills", 
"Poblacion", 
"San Jose", 
"Vergara", 
"Wack-Wack Greenhill"
],


        "Marikina":[
"Barangka", 
"Calumpang", 
"Concepcion Uno", 
"Concepcion Dos", 
"Fortune", 
"Industrial Valley", 
"Jesus de la Peña", 
"Malanday", 
"Marikina Heights", 
"Nangka", 
"Parang", 
"San Roque", 
"Santa Elena", 
"Santo Niño", 
"Tañong", 
"Tumana",
],

        
        "Muntinlupa":[
"Alabang", 
"Ayala Alabang", 
"Bayanan", 
"Buli", 
"Cupang", 
"Poblacion", 
"Putatan", 
"Sucat", 
"Tunasan"
],
        "Parañaque":[
"Baclaran",
"BF Homes",
"Don Bosco",
"Don Galo",
"La Huerta",
"Marcelo Green",
"Merville",
"Moonwalk",
"San Antonio",
"San Dionisio",
"San Isidro",
"San Martin de Porres",
"Santo Niño",
"Sun Valley",
"Tambo",
"Vitalez"
],


        "Pasay":[
            "Barangay 1 - Sangandaan", 
"Barangay 2", 
"Barangay 3", 
"Barangay 4", 
"Barangay 5", 
"Barangay 6", 
"Barangay 7", 
"Barangay 8", 
"Barangay 9", 
"Barangay 10", 
"Barangay 11", 
"Barangay 12",
"Barangay 13", 
"Barangay 14", 
"Barangay 15", 
"Barangay 16", 
"Barangay 17", 
"Barangay 18", 
"Barangay 19", 
"Barangay 20", 
"Barangay 21", 
"Barangay 22", 
"Barangay 23", 
"Barangay 24", 
"Barangay 25", 
"Barangay 26", 
"Barangay 27", 
"Barangay 28", 
"Barangay 29", 
"Barangay 30", 
"Barangay 31", 
"Barangay 32", 
"Barangay 33", 
"Barangay 34", 
"Barangay 35", 
"Barangay 36", 
"Barangay 37", 
"Barangay 38", 
"Barangay 39", 
"Barangay 40", 
"Barangay 41", 
"Barangay 42", 
"Barangay 43", 
"Barangay 44", 
"Barangay 45", 
"Barangay 46", 
"Barangay 47", 
"Barangay 48", 
"Barangay 49", 
"Barangay 50", 
"Barangay 51", 
"Barangay 52", 
"Barangay 53", 
"Barangay 54", 
"Barangay 55", 
"Barangay 56", 
"Barangay 57", 
"Barangay 58", 
"Barangay 59", 
"Barangay 60", 
"Barangay 61", 
"Barangay 62", 
"Barangay 63", 
"Barangay 64", 
"Barangay 65", 
"Barangay 66", 
"Barangay 67", 
"Barangay 68", 
"Barangay 69", 
"Barangay 70", 
"Barangay 71", 
"Barangay 72", 
"Barangay 73", 
"Barangay 74", 
"Barangay 75", 
"Barangay 76", 
"Barangay 77", 
"Barangay 78", 
"Barangay 79", 
"Barangay 80)", 
"Barangay 81", 
"Barangay 82", 
"Barangay 83", 
"Barangay 84", 
"Barangay 85", 
"Barangay 86", 
"Barangay 87", 
"Barangay 88", 
"Barangay 89", 
"Barangay 90", 
"Barangay 91", 
"Barangay 92", 
"Barangay 93", 
"Barangay 94", 
"Barangay 95", 
"Barangay 96", 
"Barangay 97", 
"Barangay 98", 
"Barangay 99", 
"Barangay 100", 
"Barangay 101", 
"Barangay 102", 
"Barangay 103", 
"Barangay 104", 
"Barangay 105", 
"Barangay 106", 
"Barangay 107", 
"Barangay 108", 
"Barangay 109", 
"Barangay 110", 
"Barangay 111", 
"Barangay 112", 
"Barangay 113", 
"Barangay 114", 
"Barangay 115", 
"Barangay 116", 
"Barangay 117", 
"Barangay 118", 
"Barangay 119", 
"Barangay 120", 
"Barangay 121", 
"Barangay 122", 
"Barangay 123", 
"Barangay 124", 
"Barangay 125", 
"Barangay 126", 
"Barangay 127", 
"Barangay 128", 
"Barangay 129", 
"Barangay 130", 
"Barangay 131", 
"Barangay 132", 
"Barangay 133", 
"Barangay 134", 
"Barangay 135", 
"Barangay 136", 
"Barangay 137", 
"Barangay 138", 
"Barangay 139", 
"Barangay 140", 
"Barangay 141", 
"Barangay 142", 
"Barangay 143", 
"Barangay 144", 
"Barangay 145", 
"Barangay 146", 
"Barangay 147", 
"Barangay 148", 
"Barangay 149", 
"Barangay 150", 
"Barangay 151", 
"Barangay 152", 
"Barangay 153", 
"Barangay 154", 
"Barangay 155", 
"Barangay 156", 
"Barangay 157", 
"Barangay 158", 
"Barangay 159", 
"Barangay 160", 
"Barangay 161", 
"Barangay 162", 
"Barangay 163", 
"Barangay 164", 
"Barangay 165", 
"Barangay 166", 
"Barangay 167", 
"Barangay 168", 
"Barangay 169", 
"Barangay 170", 
"Barangay 171", 
"Barangay 172", 
"Barangay 173", 
"Barangay 174", 
"Barangay 175", 
"Barangay 176", 
"Barangay 177", 
"Barangay 178", 
"Barangay 179", 
"Barangay 180", 
"Barangay 181", 
"Barangay 182", 
"Barangay 183", 
"Barangay 184", 
"Barangay 185", 
"Barangay 186", 
"Barangay 187", 
"Barangay 188",
"Barangay 189",
"Barangay 190",
"Barangay 191",
"Barangay 192",
"Barangay 193",
"Barangay 194",
"Barangay 195",
"Barangay 196",
"Barangay 197",
"Barangay 198",
"Barangay 199",
"Barangay 200",
"Barangay 201"


],




        "Pasig":[
"Bagong Ilog",
"Bagong Katipunan",
"Bambang",
"Buting",
"Caniogan",
"Dela Paza",
"Kalawaan",
"Kapasigan",
"Kapitolyo",
"Malinao",
"Manggahanb",
"Maybunga",
"Oranbo",
"Palatiw",
"Pinagbuhatan",
"Pineda",
"Rosario",
"Sagad",
"San Antonio",
"San Joaquin",
"San Jose",
"San Miguel",
"San Nicolas",	
"Santa Cruz",	
"Santa Lucia",	
"Santa Rosa",	
"Santo Tomas",	
"Santolan",	
"Sumilang",
"Ugong"
],




"Pateros":[
"Aguho",
"Magtanggol",
"Martirez del 96",
"Poblacion",
"San Pedro",
"San Roque",
"Santa Ana",
"Santo Rosario–Kanluran",
"Santo Rosario–Silangan",
"Tabacalera"
],

        "Quezon City":[
            "Alicia", 
"Bagong Pag-asa", 
"Bahay Toro", 
"Balingasa", 
"Bungad", 
"Damar", 
"Damayan", 
"Del Monte", 
"Katipunan", 
"Lourdes", 
"Maharlika", 
"Manresa", 
"Mariblo", 
"Masambong", 
"N.S. Amoranto (Gintong Silahis)", 
"Nayong Kanluran", 
"Paang Bundok", 
"Pag-ibig sa Nayon", 
"Paltok", 
"Paraiso", 
"Phil-Am", 
"Project 6", 
"Saint Peter", 
"Salvacion", 
"San Antonio", 
"San Isidro Labrador", 
"San Jose", 
"Santa Cruz", 
"Santa Teresita", 
"Sto. Cristo",
"Santo Domingo",
"Siena", 
"Talayan", 
"Vasra", 
"Veterans Village", 
"West Triangle", 
"Bagong Silangan", 
"Batasan Hills", 
"Commonwealth", 
"Holy Spirit", 
"Payatas", 
"Bagumbayan", 
"Bagumbuhay", 
"Bayanihan", 
"Blue Ridge A", 
"Blue Ridge B", 
"Camp Aguinaldo", 
"Claro (Quirino 3-B)", 
"Dioquino Zobel", 
"Duyan-duyan", 
"E. Rodriguez", 
"East Kamias", 
"Escopa I", 
"Escopa II", 
"Escopa II", 
"Escopa IV", 
"Libis", 
"Loyola Heights", 
"Mangga", 
"Marilag", 
"Masagana", 
"Matandang Balara", 
"Milagrosa", 
"Pansol", 
"Quirino 2-A", 
"Quirino 2-B", 
"Quirino 2-C", 
"Quirino 3-A", 
"St. Ignatius", 
"San Roque", 
"Silangan", 
"Socorro", 
"Tagumpay", 
"Ugong Norte", 
"Villa Maria Clara", 
"West Kamias", 
"White Plains", 
"Bagong Lipunan ng Crame", 
"Botocan", 
"Central", 
"Damayan Lagi", 
"Don Manuel", 
"Doña Aurora", 
"Doña Imelda", 
"Doña Josefa", 
"Horseshoe", 
"Immaculate Concepcion", 
"Kalusugan", 
"Kamuning", 
"Kaunlaran", 
"Kristong Hari", 
"Krus na Ligas", 
"Laging Handa", 
"Malaya", 
"Mariana", 
"Obrero", 
"Old Capitol Site",
"Paligsahan",
"Pinagkaisahan", 
"Pinyahan", 
"Roxas", 
"Sacred Heart", 
"San Isidro Galas", 
"San Martin de Porres", 
"San Vicente", 
"Santol", 
"Sikatuna Village", 
"South Triangle", 
"Sto. Niño", 
"Tatalon", 
"Teacher's Village East	", 
"Teacher's Village West	", 
"U.P. Campus", 
"U.P. Village", 
"Valencia", 
"Bagbag", 
"Capri", 
"Fairview", 
"Greater Lagro", 
"Kaligayahan", 
"Nagkaisang Nayon", 
"North Fairview", 
"Novaliches Proper", 
"Pasong Putik Proper", 
"San Agustin", 
"Gulod", 
"San Bartolome", 
"Sta. Lucia", 
"Sta. Monica", 
"Apolonio Samson", 
"Baesa", 
"Balong Bato", 
"Culiat", 
"New Era", 
"Pasong Tamo", 
"Sangandaan", 
"Sauyo", 
"Talipapa", 
"Tandang Sora", 
"Unang Sigaw"
],

        "San Juan":[
"Addition Hills", 
"Balong–Bato", 
"Batis", 
"Corazón de Jesús", 
"Ermitaño", 
"Greenhills", 
"Isabelita", 
"Kabayanan", 
"Little Baguio", 
"Maytunas", 
"Onse", 
"Pasadeña", 
"Pedro Cruz", 
"Progreso", 
"Rivera", 
"Saint Joseph", 
"Salapán", 
"San Perfecto", 
"Santa Lucia", 
"Tibagan", 
"West Crame"
],
        "Taguig":[
"Bagumbayan", 
"Bambang", 
"Calzada", 
"Hagonoy", 
"Ibayo Tipas", 
"Ligid Tipas", 
"Lower Bicutan", 
"New Lower Bicutan", 
"Napindan", 
"Palingon", 
"San Miguel", 
"Santa Ana", 
"Tuktukan", 
"Ususan", 
"Wawa", 
"Central Bicutan", 
"Central Signal Village", 
"Fort Bonifacio", 
"Katuparan", 
"Maharlika Village", 
"North Daang Hari", 
"North Signal Village", 
"Pinagsama", 
"South Daang Hari", 
"South Signal Village", 
"Bagong Tanyag", 
"Upper Bicutan", 
"Western Bicutan"
],

        "Valenzuela":[
"Arkong Bato", 
"Bagbaguin", 
"Balangkas", 
"Bignay", 
"Buli", 
"Canumay East", 
"Canumay West", 
"Coloong", 
"Dalandanan", 
"Gen. T. de Leon", 
"Isla", 
"Karuhatan", 
"Lawang Bato", 
"Lingunan", 
"Mabolo", 
"Malanday", 
"Malinta", 
"Mapulang Lupa", 
"Marulas", 
"Maysan", 
"Palasan", 
"Parada", 
"Pariancillo Villa", 
"Paso de Blas", 
"Pasolo", 
"Poblacion", 
"Polo", 
"Punturin", 
"Rincon", 
"Tagalag", 
"Ugong", 
"Viente Reales", 
"Wawang Pulo", 
"Valenzuela"
],


            
        },
        /*
        "United States": {
            "California": ["San Diego", "Sears Point"],
            "Nevada": ["Las Vegas", "Lamoille Canyon"]
        },
        "United Kingdom": {
            "England": ["Cambridge.", "London", "Bristol"],
            "Scotland": ["Glasgow", "Edinburgh"]
        }*/
    }
    window.onload = function(){
        var stateSel = document.getElementById("stateSel"),
        countySel = document.getElementById("countySel"),
        citySel = document.getElementById("citySel");
        
        for (var state in stateObject){
            stateSel.options[stateSel.options.length] = new Option(state, state);
        }
        
        stateSel.onchange = function(){
            countySel.length = 1;
            citySel.length =1;
            if(this.selectedIndes < 1) return;
            for(var county in stateObject[this.value]){
                countySel.options[countySel.options.length] = new Option(county, county);
            }
        }
        
        stateSel.onchange();
        
        countySel.onchange = function(){
            citySel.length = 1;
            if(this.selectedIndex < 1) return;
            
            var cities = stateObject[stateSel.value][this.value];
            for(var i = 0; i < cities.length; i++){
                citySel.options[citySel.options.length] = new Option(cities[i], cities[i]);
            }
        }
    }
    </script>
</body>
</html>
