<?php

session_start();

$sellerId = $_SESSION['uid'];

 $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

//  if(isset($_GET['showid'])){
//     $id=$_GET['showid'];

//  $sql = "select * from user where registered = 'no'";

//  $result = mysqli_query($conn, $sql);

//  while($row = mysqli_fetch_assoc($result)){
//     $name = $row['username'];
//     $password = $row['password'];
//     $email =$row['email'];
//     $adress =$row['adress'];
//     // $fileName = $row['Image'];
//     // $Role = $row['Role'];
//     $tel = $row['tel'];
//     $products = $row['products'];
//  }

 if(isset($_POST['submit'])){
    $vi = $_POST['vid'];
    $ap = $_POST['approve'];


    $quer = "Update user set registered = '$ap' where Id = '$vi'";
    
    $result = mysqli_query($conn, $quer);

    if($result){
        header("Location: pending.php?Sucess");
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="accordion.css">
  <link rel="stylesheet" href="style.css">
  
  <title>Approve Registration</title>
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
                <div><img src="images/home.svg" alt="Dashboard"> <span>Approve registration</span></div>
                <div>Overview</div>
            </div>
            <div class="pending">
                <?php
                    $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

                  
                   
                    $sql = "select * from user where status ='Seller' AND registered = 'no'";
                   
                    $result = mysqli_query($conn, $sql);
                   
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $Id = $row['Id'];
                            $name = $row['username'];
                            $email =$row['email'];
                            $adress =$row['adress'];
                            $fileName = $row['Image'];
                            // $Role = $row['Role'];
                            $tel = $row['tel'];
                            $products = $row['products'];

                            
                          
                            echo '<form action="" method="post">';
                            echo '    <img src="images/'.$fileName.'"" alt="Vendor picture">';
                            echo '    <div>';
                            echo '        <label for="">Name: </label>';
                            echo '        <input type="text" readonly value='.$name.'>';
                            echo '    </div>';
                            echo '    <div>';
                            echo '        <label for="">Email: </label>';
                            echo '        <input type="text" readonly value='.$email.'>';
                            echo '    </div>';
                            echo '    <div>';
                            echo '        <label for="">Address: </label>';
                            echo '        <input type="text" readonly value='.$adress.'>';
                            echo '    </div>';
                            echo '    <div>';
                            echo '        <label for="">Tel: </label>';
                            echo '        <input type="text" readonly value='.$tel.'>';
                            echo '    </div>';
                            echo '    <div>';
                            echo '        <label for="">Products: </label>';
                            echo '        <input type="text" readonly value='.$products.'>';
                            echo '    </div>';
                            echo '     <input type="hidden" name="vid" value='.$Id.'>';
                            echo '    <label for="">Approve (yes/no)</label>';
                            echo '    <select name="approve" id="">';
                            echo '        <option value="yes">Yes</option>';
                            echo '        <option value="no">No</option>';
                            echo '    </select>';
                            echo '    <button type="submit" name="submit">Confirm</button>';
                            echo '</form>';
                        }
                    }
                ?>
    </div>
    </section>
    
    </main>
 
  <script src="script.js"></script>

</body>
</html>
