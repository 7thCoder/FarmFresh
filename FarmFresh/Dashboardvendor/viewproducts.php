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
  
  <title>Products</title>
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
            echo'<img src="../Dashboard/images/'.$fileName.'"" alt="">';
            echo'<span>'.$name.'</span>';
        ?>
            <a href="../logout.php"><img src="images/logout.svg" alt="Logout"></a>
        </div>
    </nav>

    <main>
    <div class="accordion-container">
            <div class="accordion">
                <div class="accordion-header"><a href="">Dashboard</a></div>
            </div>

            <div class="accordion">
                <div class="accordion-header now">Products</div>
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
                <div class="accordion-header">Orders</div>
                <div class="accordion-content">
                    <ul>
                        <li><a href="myorders.php">My Orders</a></li>
                    </ul>
                </div>
            </div>
    
    </div>

        <section class="dashboard">
            <div class="nav">
                <div><img src="images/home.svg" alt="Dashboard"> <span>Products</span></div>
                <div>Overview</div>
            </div>

            <divc class="tablec">
                <table>
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image name</th>
                        <!-- <th>SellerId</th> -->
                        <th>Price</th>
                        <th>Description</th>
                        <th >Action</th>
                    </thead>
                    <tbody>
                    <?php

                        $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

                        $sql ="select * from products where sellerId = $sellerId";
                        $result = mysqli_query($conn, $sql);

                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $Id = $row['Id'];
                                $name = $row['Name'];
                                $fileName = $row['Image'];
                                $Description = $row['Description'];
                                $Price = $row['Price'];

                                echo'<tr>';
                                    echo'<td>'.$Id.'</td>';
                                    echo'<td>'.$name.'</td>';
                                    echo'<td>'.$fileName.'</td>';
                                    echo'<td>'.$Price.'</td>';
                                    echo'<td>'.$Description.'</td>';
                                    echo '<td><a href="modifyproducts.php?showid='.$Id.'">Modify</a>
                                    <a href="delete_product.php?showid='.$Id.'" class="odd">Delete</a></td>';
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
