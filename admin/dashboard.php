<?php

session_start();
@include 'config.php';





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <h2><span class="lab la-accusoft"></span> KenshinBuilds</h2>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="dashboard.php" class="active" ><span class="las la-igloo" ></span>
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
                <a href="products.php"><span class="las la-receipt" ></span>
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

                Dashboard
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
            <div class="cards">
                <div class="card-single">
                    <div>
                    <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "kenshindb";
                            // Create connection
                            $con = mysqli_connect($servername, $username, $password, $database);

                            $sql="SELECT count(id) AS total FROM accounts";
                            $result=mysqli_query($con,$sql);
                            $values=mysqli_fetch_assoc($result);
                            $num_rows=$values['total'];                           
                            

                            echo "<h1>$num_rows</h1>";
                            ?>


                            

                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-user-circle"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <span>Messages</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                    <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "kenshindb";
                            // Create connection
                            $con = mysqli_connect($servername, $username, $password, $database);

                            $sql="SELECT count(id) AS total FROM orders";
                            $result=mysqli_query($con,$sql);
                            $values=mysqli_fetch_assoc($result);
                            $num_rows=$values['total'];                           
                            

                            echo "<h1>$num_rows</h1>";
                            ?>


                        <span>Orders</span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>₱ 0.00</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div>

            </div>

            

        </main>
    </div>
    
</body>
</html>