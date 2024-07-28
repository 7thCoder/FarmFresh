<?php

session_start();

$sellerId = $_SESSION['uid'];

 $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

 if(isset($_GET['showid'])){
    $id=$_GET['showid'];

 $sql = "select * from user where Id = $id";

 $result = mysqli_query($conn, $sql);

 if($result){
    while($row = mysqli_fetch_assoc($result)){
        $cname = $row['username'];
        $password = $row['password'];
        $email =$row['email'];
        $adress =$row['adress'];
        // $fileName = $row['Image'];
        // $Role = $row['Role'];
        $tel = $row['tel'];
        
     }
 }



 if(isset($_POST['submit'])){
    $Nname = $_POST['Nname'];
    $Npassword = $_POST['Npassword'];
    $Nemail = $_POST['Nemail'];
    $Ncontact = $_POST['Ncontact'];
    $Nadress = $_POST['Nadress'];
   

    $quer = "Update user set username = '$Nname', password ='$Npassword', email ='$Nemail', tel ='$Ncontact', adress = '$Nadress'
        where Id = '$id'";
    
    $result = mysqli_query($conn, $quer);

    if($result){
        header("Location: client.php?updateSucess");
    }
 }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="accordion.css">
  <link rel="stylesheet" href="style.css">
  
  <title>Update clients</title>
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
                <div class="accordion-header now">Clients</div>
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
                <div><img src="images/home.svg" alt="Dashboard"> <span>Update client</span></div>
                <div>Overview</div>
            </div>
            <div class="formc">
                <form action="" method="POST">
                    <h1>Modify Client</h1>
                    <div>
                        <label for="Nname">Client Name: </label>
                        <input type="text" name="Nname" placeholder="Client Name..." value="<?php echo $cname;?>">
                    </div>
                    <div>
                        <label for="Npassword">Client password: </label>
                        <input type="text" name="Npassword" placeholder="Client password..." value="<?php echo $password;?>">
                    </div>

                    <div>
                        <label for="Nemail">Client Email: </label>
                        <input type="email" name="Nemail" placeholder="client email..." value="<?php echo $email;?>">
                    </div>

                    
                    <div>
                        <label for="adress">Adress: </label>
                        <input type="text" name="Nadress" placeholder="Adress...." value="<?php echo $adress;?>">
                    </div>

                    <div>
                        <label for="contact">Contact: </label>
                        <input type="text" name="Ncontact" placeholder="Contact...." value="<?php echo $tel;?>">
                    </div>
                    

                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>
    
        </section>
    </main>

 
  <script src="script.js"></script>

</body>
</html>
