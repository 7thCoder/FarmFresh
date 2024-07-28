<?php
   session_start();

   $sellerId = $_SESSION['uid'];

   $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

    if(isset($_POST['submit'])){
       $file = $_FILES['file'];
       $name=$_POST['name'];
       $details=$_POST['details'];
       $price = $_POST['price'];
       

       $fileName = $_FILES['file']['name'];

       $sql = "INSERT INTO products(Name, SellerId, Image, Description, Price)
               VALUES ('$name','$sellerId ', '$fileName', '$details', '$price')";

       $result = mysqli_query($conn, $sql);

       

        $fileTmpName = $_FILES['file']['tmp_name'];
       //  $fileSize = $_FILES['file']['size'];
       // $fileError = $_FILES['file']['error'];
       // $fileType = $_FILES['file']['type'];

       //  $fileExt = explode('.',$fileName);
       // $fileActualExt = strtolower(end($fileExt));
       
        $fileDestination = 'images/'.$fileName;
        if($result){
           move_uploaded_file($fileTmpName, $fileDestination);
           header("Location: viewproducts.php?uploadsuccess");
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
  
  <title>Add products</title>
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
                <div class="accordion-header">Vendors</div>
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

    
        </div>

        <section class="dashboard">
            <div class="nav">
                <div><img src="images/home.svg" alt="Dashboard"> <span>Add products</span></div>
                <div>Overview</div>
            </div>
            <div class="formc">
                <form action="" method="post" enctype="multipart/form-data">
                    <h1>Add Product</h1>
                    <div>
                        <label for="name">Product Name: </label>
                        <input type="text" name="name" placeholder="Product name...">
                    </div>
                    
                    <div>
                        <label for="file">Product image: </label>
                        <input type="file" name="file">
                    </div>
                    
                    <div>
                        <label for="price">Price: </label>
                        <input type="text" name="price" placeholder="Price....">
                    </div>
                    
                    <div>
                        <label for="desc">Description: </label>
                        <input type="text" name="details" placeholder="Brief description...">
                    </div>

                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>
    
        </section>
    </main>

 
  <script src="script.js"></script>

</body>
</html>
