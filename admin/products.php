<?php

session_start();

@include '../config.php';

if(isset($_POST['add_product'])){
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_qty = $_POST['p_qty'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'uploaded_img/'.$p_image;
 
    $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, quantity, image) VALUES('$p_name', '$p_price', '$p_qty', '$p_image')") or die('query failed');
 
    if($insert_query){
       move_uploaded_file($p_image_tmp_name, $p_image_folder);
       $message[] = 'product add succesfully';
    }else{
       $message[] = 'could not add the product';
    }
 };
 
 if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
    if($delete_query){
       header('location:../admin/products.php');
       $message[] = 'product has been deleted';
    }else{
       header('location:../admin/products.php');
       $message[] = 'product could not be deleted';
    };
 };
 
 if(isset($_POST['update_product'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_qty = $_POST['update_p_qty'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'uploaded_img/'.$update_p_image;
 
    $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");
 
    if($update_query){
       move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
       $message[] = 'product updated succesfully';
       header('location:../admin/products.php');
    }else{
       $message[] = 'product could not be updated';
       header('location:../admin/products.php');
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

<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span class="lab la-accusoft"></span> KenshinBuilds</h2>
    </div>
    <div class="sidebar-menu">
    <ul>
            <li>
                <a href="dashboard.php"><span class="las la-igloo" ></span>
                <span>Dashboard</span></a>
            </li>
            <li>
                <a href="customers.php"><span class="las la-users" ></span>
                <span>Accounts</span></a>
            </li>
            <li>
                <a href="orders.php"><span class="las la-shopping-bag" ></span>
                <span>Orders</span></a>
            </li>
            <li>
                <a href="products.php" class="active"><span class="las la-receipt" ></span>
                <span>Products</span></a>
            </li>
            <li>
                <a href=""><span class="las la-clipboard-list" ></span>
                <span>Tasks</span></a>
            </li>
        </ul>
    </div>
</div>

<div class="main-content">
        <header>
            <h2>
                <label for="">
                    <span class="las la-bars"></span>
                </label>

                Products
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search Here" />
            </div>

            <div class="user-wrapper">
                <img src="img/avatar.svg" width="40px" height="40px" alt="">
                <div>
                    <h4>
                        <?php
                            if(isset($_SESSION['admin_name'])){
                                echo "$_SESSION[admin_name]";
                            }
                        ?>
                    </h4>
                    <small>
                        <?php
                            if(isset($_SESSION['admin_name'])){
                                echo "<a href=\"..\logout.php\">Logout</a>";
                            }
                        ?>
                    </small>
                </div>
            </div>
        </header>

        <main>

        <div class="container">
            <section>

                <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                    <h3>add a new product</h3>
                    <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
                    <input type="number" name="p_price" min="0" placeholder="enter the product price" class="box" required>
                    <input type="number" name="p_qty" min="0" placeholder="Quantity" class="box" required>
                    <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required style="border:2px solid black;">
                    <input type="submit" value="add the product" name="add_product" class="btn">
                </form>

            </section>
            </div>
            

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>Recent Projects</h2>
                            <button>See all <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <td>Product Image</td>
                                    <td>Product Model</td>
                                    <td>Product Price</td>
                                    <td>Action</td>
                                </thead>
                                <tbody>
                                    <?php
         
                                    $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                                    if(mysqli_num_rows($select_products) > 0){
                                    while($row = mysqli_fetch_assoc($select_products)){
                                    
                                    ?>
                                    


                                    <tr>
                                        <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td>₱<?php echo $row['price']; ?>/-</td>
                                        <td>
                                           
                                            <a href="../admin/products.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
                                            <a href="../admin/products.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
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
   $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
   if(mysqli_num_rows($edit_query) > 0){
      while($fetch_edit = mysqli_fetch_assoc($edit_query)){
?>

<form action="" method="post" enctype="multipart/form-data">
   <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="80px" alt="">
   <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
   <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
   <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
   <input type="number" class="box" required name="update_p_qty" value="<?php echo $fetch_edit['quantity']; ?>">
   <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
   <input type="submit" value="update the product" name="update_product" class="btn">
   <input type="reset" value="cancel" class="option-btn" onclick="location.href='products.php';">

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


