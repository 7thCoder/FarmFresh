<?php
    session_start();

    $sellerId = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="accordion.css">
  <link rel="stylesheet" href="style.css">
  
  <title>Vendors</title>
</head>
<body>
    <nav>
        <div id="title"><a href="../index.php">Btech Market</a></div>
        <div class="profile">

        <?php
            $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

                $sql ="select * from user where Id = $sellerId";
                $result = mysqli_query($conn, $sql);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                    $name = $row['username'];
                    $fileName = $row['Image'];

                    }
            }
            echo'<img src="images/'.$fileName.'"" alt="">';
            echo'<span>'.$name.'</span>';
        ?>
            <a href="../logout.php"><img src="images/logout.svg" alt="Logout"></a>
        </div>
    </nav>
    <main>
    <div class="accordion-container">
            <div class="accordion">
                <div class="accordion-header"><a href="Dashboard.php">Dashboard</a></div>
            </div>

            <div class="accordion">
                <div class="accordion-header">Products</div>
                <div class="accordion-content">
                    <p>
                        <ul>
                            <li><a href="viewproducts.php">View products</a></li>
                            <li><a href="addproducts.php">Add product</a></li>
                            <li>Modify products</li>
                        </ul>
                    </p>
                </div>
            </div>

            <div class="accordion">
                <div class="accordion-header now">Vendors</div>
                <div class="accordion-content">
                    <p>
                        <ul>
                            <li><a href="vendors.php">View vendors</a></li>
                            <li><a href="pending.php">Pending registrations</a></li>
                            <li><a href="addvendors.php">Add vendor</a></li>
                            <li>Modify vendor</li>
                        </ul>
                    </p>
                </div>
            </div>
            <div class="accordion">
                <div class="accordion-header">Clients</div>
                <div class="accordion-content">
                    <p>
                        <ul>
                            <li><a href="client.php">View clients</a></li>
                            <li><a href="addclient.php">Add clients</a></li>
                            <li>Modify clients</li>
                        </ul>
                    </p>
                </div>
            </div>

            <div class="accordion">
                <div class="accordion-header">Orders</div>
                <div class="accordion-content">
                    <ul>
                        <li><a href="myorders.php">My Orders</a></li>
                        <li><a href="orders.php">All Orders</a></li>
                    </ul>
                </div>
            </div>
    
    </div>

        <section class="dashboard">
            <div class="nav">
                <div><img src="images/home.svg" alt="Dashboard"> <span>Vendors</span></div>
                <div>Overview</div>
            </div>

            <divc class="tablec">
                <table>
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Adress</th>
                        <th>Contact</th>
                        <th>Products</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php

                        $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

                        $sql ="select * from user where Status = 'seller'";
                        $result = mysqli_query($conn, $sql);

                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $Id = $row['Id'];
                                $name = $row['username'];
                                $email =$row['email'];
                                $adress =$row['adress'];
                                // $fileName = $row['Image'];
                                // $Role = $row['Role'];
                                $tel = $row['tel'];
                                $products = $row['products'];
                               

                                echo'<tr>';
                                    echo'<td>'.$Id.'</td>';
                                    // echo'<td>'.$fileName.'</td>';
                                    echo'<td>'.$name.'</td>';
                                    echo'<td>'.$email.'</td>';
                                    echo'<td>'.$adress.'</td>';
                                    // echo'<td>'.$Role.'</td>';
                                    echo'<td>'.$tel.'</td>';
                                    echo'<td>'.$products.'</td>';
                                    echo '<td><a href="modifyvendors.php?showid='.$Id.'">Modify</a>
                                    <a href="delete_farmer.php?showid='.$Id.'" class="odd">Delete</a></td>';
                                echo'</tr>';
                                            
                            }

                        }
                    ?>
                        <!-- <tr>
                            <td>lorem</td>
                            <td>lorem</td>
                            <td>lorem</td>
                            <td>lorem</td>
                            <td>lorem</td>
                            <td>
                                <a href="">Modify</a>
                                <a href="">Delete</a>
                            </td>
                        </tr> -->
                        
                    </tbody>
                </table>
            </div>
        </section>
    </main>

 
  <script src="script.js"></script>

</body>
</html>
