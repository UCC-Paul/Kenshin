<?php

session_start();

/*
echo "<pre>";
print_r($_SESSION['info']);
echo "</pre>";
*/



if (isset($_SESSION['info'])) {
    extract($_SESSION['info']);




    $conn = mysqli_connect('localhost', 'root', '','kenshindb');
    
    $sql = mysqli_query($conn, "INSERT INTO accounts (firstname,middlename, lastname, birthdate, age,  email, phone, province, city, barangay, postal, house, username, password) 
         VALUES ('$fname','$mname','$lname','$birthdate','$age','$email','+63$phone','$optone','$opttwo','$optthree','$postal','$house','$uname','$pass')");

if ($sql) {
    unset($_SESSION['info']);

    echo "Account Registered Successfuly!  Redirecting...";

    echo '<meta http-equiv="refresh" content="3;URL=\'login.php\'">';
}
else{
    echo mysqli_error($conn);
}


}

?>
