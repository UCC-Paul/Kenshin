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
    <title>Customers</title>
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
                <a href="dashboard.php"><span class="las la-igloo" ></span>
                <span>Dashboard</span></a>
            </li>
            <li>
                <a href="customers.php" class="active"><span class="las la-users" ></span>
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

                Accounts
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
            <div class="recent-grid" style="grid-template-columns: 100% auto;">
            <div class="projects" >
                    <div class="card" >
                        <div class="card-header">
                            <h2>All Accounts</h2>
                            <button>See all <span class="las la-arrow-right"></span></button>
                        </div>
                        <div class="card-body" >
                            <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <td>User ID</td>
                                    <td>Username</td>
                                    <td>Email</td>
                                    <td>Phone</td>
                                    <td>Password</td>
                                </thead>
                                <tbody>
                                    <?php
                                        $conn = mysqli_connect("localhost", "root", "", "kenshindb");
                                        $sql = "SELECT * from accounts";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result-> fetch_assoc()) {
                                                echo "<tr>
                                                <td> $row[id]</td>
                                                <td> $row[username]</td>
                                                <td> $row[email]</td>
                                                <td> $row[phone]</td>
                                                <td> $row[password]</td>
                                                </tr>";
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>


    
</body>
</html>