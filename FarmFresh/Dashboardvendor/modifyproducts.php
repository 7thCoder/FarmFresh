<?php
 $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

 $id = $_GET['showid'];

 $sql = "select * from products where Id = $id";

 $result = mysqli_query($conn, $sql);

 while($row = mysqli_fetch_assoc($result)){
    $name = $row['Name'];
    $details = $row['Description'];
    $price = $row['Price'];
 }

 if(isset($_POST['submit'])){
    $Nname = $_POST['name'];
    $Ndetails = $_POST['details'];
    $Nprice = $_POST['price'];

    $quer = "Update products set Name = '$Nname', Description = '$Ndetails', Price = '$Nprice'
        where Id = '$id'";
    
    $result = mysqli_query($conn, $quer);

    if($result){
        header("Location: viewproducts.php?updateSucess");
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
  
  <title>Update products</title>
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
                <div><img src="images/home.svg" alt="Dashboard"> <span>Modify products</span></div>
                <div>Overview</div>
            </div>
            <div class="formc">
                <form action="" method="POST">
                    <h1>Modify Product</h1>
                    <div>
                        <label for="name">Product Name: </label>
                        <input type="text" name="name" placeholder="Product name..."  value="<?php echo $name;?>">
                    </div>
                    
                    
                    <div>
                        <label for="price">Price: </label>
                        <input type="text" name="price" placeholder="Price...." value="<?php echo $price;?>">
                    </div>
                    
                    <div>
                        <label for="desc">Description: </label>
                        <input type="text" name="details" placeholder="Brief description..." value="<?php echo $details;?>">
                    </div>

                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>
    
        </section>
    </main>

 
  <script src="script.js"></script>

</body>
</html>
