<?php

@include 'config.php';

session_start();




if(isset($_POST['order_btn'])){

   $fname = $_POST['fname'];
   $mname = $_POST['mname'];
   $lname = $_POST['lname'];
   $phone = $_POST['phone'];
   $method = $_POST['method'];
   $house = $_POST['house'];
   $brgy = $_POST['brgy'];
   $city = $_POST['city'];
   $province = $_POST['province'];
   $postal = $_POST['postal'];


   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = ($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(firstname, middlename, lastname, phone, house, barangay, city, province, postal, method, totalproducts, totalprice, status) VALUES('$fname', '$mname', '$lname','$phone','$house','$brgy','$city','$province','$postal','$method','$total_product','$price_total','Pending')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <div class='order-detail'>
            <h3 style=\"margin-top:50px\"; >Thank you for shopping!</h3>
            <span>".$total_product."</span>
            <span class='total'> Total : ₱ ".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
         
            <p> your name : <span>".$fname." ".$mname." ".$lname."</span> </p>
            <p> your number : <span>".$phone."</span> </p>
            <p> your address : <span>".$house."</span> </p>
            <p> <span>".$house.", ".$brgy.", ".$city.", ".$province.", ".$postal."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p> Tracking number : <span>A82PHA01255146842</span> </p>
            <p>(*pay when product arrives*)</p>
            ?>
         </div>
            <a href=\"products.php\"><input type=\"button\" class=\"btn\" value=\"Continue Shopping\" name=\"delcart\"></a>
         </div>
         
      </div>
      ";
      
   }

   
   

   
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>KenshinBuilds | Checkout</title>

   <!-- font awesome cdn link  -->
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'header1.php'; ?>

<div class="container">

   <section class="small-container cart-page">

   <form action="" method="post">

   <div class="checkout">
      <?php
      session_reset();
      if(isset($_SESSION['user_name'])){
         echo"$_SESSION[user_name] ";
         echo"$_SESSION[middlename] ";
         echo"$_SESSION[lastname] ";
         echo"<p>$_SESSION[phone]</p> ";
         echo"<p style=\"text-align:right;\">$_SESSION[house]</p> ";
         echo"<p style=\"text-align:right;\">$_SESSION[barangay] $_SESSION[city] $_SESSION[province] $_SESSION[postal]</p> ";
         echo "

         <input type=\"hidden\" name=\"fname\" value=\"$_SESSION[user_name]\" readonly=\"true\">
         <input type=\"hidden\" name=\"mname\" value=\"$_SESSION[middlename]\" readonly=\"true\">
         <input type=\"hidden\" name=\"lname\" value=\"$_SESSION[lastname]\" readonly=\"true\">
         <input type=\"hidden\" name=\"phone\" value=\"$_SESSION[phone]\" readonly=\"true\">
         <input type=\"hidden\" name=\"house\" value=\"$_SESSION[house]\" readonly=\"true\">
         <input type=\"hidden\" name=\"brgy\" value=\"$_SESSION[barangay]\" readonly=\"true\">
         <input type=\"hidden\" name=\"city\" value=\"$_SESSION[city]\" readonly=\"true\">
         <input type=\"hidden\" name=\"province\" value=\"$_SESSION[province]\" readonly=\"true\">
         <input type=\"hidden\" name=\"postal\" value=\"$_SESSION[postal]\" readonly=\"true\">

         ";
      }

      else{
         echo"<p style=\"text-align:center\"; >Please Login To Check Out!</p>";
      }  
      ?> 
        
   </div>
  
   <table>

      <thead>
         <th>Product</th>
         <th>Model</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Item Subtotal</th>
      </thead>
   
      <tbody>
      
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>₱ <?php echo ($fetch_cart['price']); ?>/-</td>
            <td>
               <?php echo $fetch_cart['quantity']?>
            </td>
            <td>₱ <?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            
         </tr>
         <?php

            };
         };
         ?>
         
         <tr class="table-bottom">

            <td colspan="4" style="text-align:right ;">Grand Total</td>
            <td>₱ <?= $grand_total; ?>/-</td>
            
         </tr>

      </tbody>

   </table>

   

   

   <span>Payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>Cash on devlivery</option>
               <option value="credit cart">Credit cart</option>
               <option value="paypal">Paypal</option>
            </select>





   

      <?php
         if(isset($_SESSION['user_name'])){
            echo "<input type=\"submit\" value=\"Place Order\" name=\"order_btn\" class=\"btn\" style=\"position:relative; left:45%; margin-top:20px; width: 300px; text-align: center; font-size:20px; padding:2px 0;\">";
         }
      ?>

   
   </form>

</section>

</div>

<?php include 'footer.php'; ?>



<!-- custom js file link  -->
<script src="js/admin.js"></script>
<script src="js/script.js"></script>

</body>
</html>