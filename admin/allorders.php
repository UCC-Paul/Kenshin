<?php

session_start();

@include '../config.php';

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `orders` WHERE id = $delete_id ") or die('query failed');
    if($delete_query){
       header('location:../admin/allorders.php');
       $message[] = 'product has been deleted';
    }else{
       header('location:../admin/allorders.php');
       $message[] = 'product could not be deleted';
    };
 };
 
 if(isset($_POST['update_order'])){
    $update_o_id = $_POST['update_o_id'];
    $update_o_firstname = $_POST['update_o_firstname'];
    $update_o_middlename = $_POST['update_o_middlename'];
    $update_o_lastname = $_POST['update_o_lastname'];
    $update_o_phone = $_POST['update_o_phone'];
    $update_o_house = $_POST['update_o_house'];
    $update_o_barangay = $_POST['update_o_barangay'];
    $update_o_city = $_POST['update_o_city'];
    $update_o_province = $_POST['update_o_province'];
    $update_o_postal = $_POST['update_o_postal'];
    $update_o_method = $_POST['update_o_method'];
    $update_o_totalproducts = $_POST['update_o_totalproducts'];
    $update_o_totalprice = $_POST['update_o_totalprice'];
    $update_o_status = $_POST['update_o_status'];
 
    $update_query = mysqli_query($conn, "UPDATE `orders` SET status = '$update_o_status' WHERE id = '$update_o_id'");
 
    if($update_query){
       $message[] = 'order updated succesfully';
       header('location:../admin/allorders.php');
    }else{
       $message[] = 'order could not be updated';
       header('location:../admin/allorders.php');
    }
 
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">

            <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            /* padding-bottom: 5rem; */
        }

        section {
            padding: 10px;
            

        }

        .add-product-form {
            
            max-width: 35rem;
            background-color: white;
            border-radius: .5rem;
            margin: 0 auto;
            margin-top: 10px;
        }

        .add-product-form h3{
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color:var(--black);
        text-transform: uppercase;
        text-align: center;
        }

        .add-product-form .box {
            text-transform: none;
            padding: .5rem 0.4rem;
            font-size: 1rem;
            color: black;
            border-radius: .5rem;
            background-color: white;
            margin-top: 1.5rem;
            margin-left: 1rem;
            margin-right: 1rem;
            width: 94%;
        }

        .btn,
        .option-btn,
        .delete-btn{
        display: block;
        width: 100%;
        text-align: center;
        background-color: black;
        color:white;
        font-size: 1.7rem;
        padding:.2rem 3rem;
        border-radius: .5rem;
        cursor: pointer;
        margin-top: 1rem;
        }

        .option-btn i,
        .delete-btn i{
        padding-right: .5rem;
        }

        .option-btn{
        background-color: orange;
        }

        .delete-btn{
        margin-top: 0;
        background-color: tomato;
        }

        .recent-grid {
            margin-top: 3.5rem;
            display: grid;
            grid-gap: 2rem;
            grid-template-columns: 100% auto;
        }
            </style>
</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>



<div class="main-content" style="margin-left: 0;">
        

        <main style="margin-top:0;">

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recent Projects</h2>
                            <a href="orders.php"><button >Back <span class="las la-arrow-right"></span></button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    
                                    <td>Order ID</td>
                                    <td>Name</td>
                                    <td>Phone</td>
                                    <td>Address</td>
                                    <td>Products</td>
                                    <td>Total Price</td>
                                    <td>Method</td>
                                    <td>Status</td>
                                    <td>Remarks</td>
                                </thead>
                                <tbody>
                                    <?php
         
                                    $select_orders = mysqli_query($conn, "SELECT * FROM `orders`");
                                    if(mysqli_num_rows($select_orders) > 0){
                                    while($row = mysqli_fetch_assoc($select_orders)){
                                    
                                    ?>
                                    


                                    <tr>
                                        
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['firstname']; echo "<p> </p>" ; echo $row['middlename']; echo "<p> </p>" ; echo $row['lastname']; ?></td>    
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['house']; echo "<p> </p>" ; echo $row['barangay']; echo "<p> </p>" ; echo $row['city']; echo "<p> </p>" ; echo $row['province']; echo "<p> </p>" ; echo $row['postal']; ?></td>   
                                        <td><?php echo $row['totalproducts']; ?></td> 
                                        <td><?php echo $row['totalprice']; ?></td>
                                        <td><?php echo $row['method']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td>
                                            
                                            <a href="../admin/allorders.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
                                            <a href="../admin/allorders.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
                                        </td>
                                    </tr>

                                    <?php
                                        };    
                                        }else{
                                        echo "<div class='empty'>no product added</div>";
                                        };
                                    ?>

                                </tbody>
                            </table>
                            </div>

                        </div>
                    </div>
                </div>                
            </div>
        </main>



        
        </div>
<div class="container">
<section class="edit-form-container">

<?php

if(isset($_GET['edit'])){
   $edit_id = $_GET['edit'];
   $edit_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE id = $edit_id");
   if(mysqli_num_rows($edit_query) > 0){
      while($fetch_edit = mysqli_fetch_assoc($edit_query)){
?>

<form action="" method="post" enctype="multipart/form-data">
   <input type="hidden" name="update_o_id" value="<?php echo $fetch_edit['id']; ?>">
   <input type="hidden" name="update_o_firstname" value="<?php echo $fetch_edit['firstname']; ?>">
   <input type="hidden" name="update_o_middlename" value="<?php echo $fetch_edit['middlename']; ?>">
   <input type="hidden" name="update_o_lastname" value="<?php echo $fetch_edit['lastname']; ?>">
   <input type="hidden" name="update_o_phone" value="<?php echo $fetch_edit['phone']; ?>">
   <input type="hidden" name="update_o_house" value="<?php echo $fetch_edit['house']; ?>">
   <input type="hidden" name="update_o_barangay" value="<?php echo $fetch_edit['barangay']; ?>">
   <input type="hidden" name="update_o_city" value="<?php echo $fetch_edit['city']; ?>">
   <input type="hidden" name="update_o_province" value="<?php echo $fetch_edit['province']; ?>">
   <input type="hidden" name="update_o_postal" value="<?php echo $fetch_edit['postal']; ?>">
   <input type="hidden" name="update_o_method" value="<?php echo $fetch_edit['method']; ?>">
   <input type="hidden" name="update_o_totalproducts" value="<?php echo $fetch_edit['totalproducts']; ?>">
   <input type="hidden" name="update_o_totalprice" value="<?php echo $fetch_edit['totalprice']; ?>">
   <input type="hidden" name="update_o_status" value="<?php echo $fetch_edit['status']; ?>">

   <select name="update_o_status" required class="form-control" size="1" value="<?php echo $fetch_edit['status']; ?>">
        <option disabled selected hidden value="" >Select Status</option>
        <option value="Approved" >Approved</option>
        <option value="Shipped" >Shipped</option>
        <option value="Pending">Pending</option>
        <option value="Canceled">Canceled</option>
    </select>


   <input type="submit" value="Update order" name="update_order" class="btn">
   <input type="reset" value="Cancel" class="option-btn" onclick="location.href='allorders.php';">

</form>

<?php
         };
      };
      echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
   };
?>

</section>
</div>




    
</body>
</html>


