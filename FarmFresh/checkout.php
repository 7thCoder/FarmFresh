<?php
    session_start();
    if (!isset($_SESSION['uname'])) {
        header("Location:http://localhost/FarmFresh/FarmFresh/dashboard/login.php");
    } else{
        $clientId = $_SESSION['uid'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<script ></script>

<head>
    <meta charset="utf-8">
    <title>Btech </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!--CSS-->
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="checkout.css">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none d-lg-block">
        <div class="row gx-5 py-3 align-items-center">
            <div class="col-lg-3">
                <!-- <div class="d-flex align-items-center justify-content-start">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-2"></i>
                    <h2 class="mb-0">(+237)61234678</h2>
                </div> -->
            </div>
            <div class="col-lg-6">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="index.php" class="navbar-brand ms-lg-5">
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">Btech</span>Market</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- <div class="d-flex align-items-center justify-content-end">
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex d-lg-none">
            <h1 class="m-0 display-4 text-secondary"><span class="text-white">Btech</span>Market</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="about.php" class="nav-item nav-link">Vendor</a>
                <!-- <a href="service.php" class="nav-item nav-link">Service</a> -->
                <a href="product.php" class="nav-item nav-link active">Product</a>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="blog.html" class="dropdown-item">Blog Grid</a>
                        <a href="detail.html" class="dropdown-item">Blog Detail</a>
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="team.html" class="dropdown-item">The Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    </div>
                </div> -->
                <!-- <a href="contact.php" class="nav-item nav-link">Contact</a> -->
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <?php
    echo '<div class="main">';
    if(isset($_GET['pid'])){
        $id=$_GET['pid'];

        $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

        $sql ="select * from products where Id= $id";
        $result = mysqli_query($conn, $sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $Id = $row['Id'];
                $name = $row['Name'];
                $fileName = $row['Image'];
                $Description = $row['Description'];
                $Price = $row['Price'];
            }

            echo '    <img src="Dashboard/images/'.$fileName.'"" alt="">';
            echo '    <form action="order.php" method="Post">';
            echo '        <h1>Product information</h1>';
            echo '        <div>';
            echo '            <label for="name">Product name: </label>';
            echo '            <input type="text" class="inf" name="name" placeholder="Product name..." readonly value='.$name.'>';
            echo '        </div>';
            echo '        <div>';
            echo '            <label for="desc">Product description: </label>';
            echo '            <input type="text" class="inf" name="desc" placeholder="Product description..." readonly value='.$Description.'>';
            echo '        </div>';
            echo '      <input type="hidden" name="product" value='.$Id.'>';
        }

        $query= "select * from user where Id= $clientId";
        $res = mysqli_query($conn, $query);
        if($res){
            while($row = mysqli_fetch_assoc($res)){
                $cId = $row['Id'];
                $cname = $row['username'];
                $cadress =$row['adress'];
                // $fileName = $row['Image'];
                // $Role = $row['Role'];
                $ctel = $row['tel'];
            }
        echo '        <h1>Payment Info</h1>';
        echo '        <div>';
        echo '            <label for="cname">Name: </label>';
        echo '            <input type="text" name="cname" placeholder="Buyer\'s name.."  value ='.$cname.'>';
        echo '        </div>';
        echo '        <div>';
        echo '            <label for="cadress">Adress: </label>';
        echo '            <input type="text" name="cadress" placeholder="Buyer\'s adress.." value ='.$cadress.'>';
        echo '        </div>';
        echo '        <div>';
        echo '            <label for="ccontact">Contact: </label>';
        echo '            <input type="text" name="ccontact" placeholder="Buyer\'s contact.." value ='.$ctel.'>';
        echo '        </div>';
        echo '      <input type="hidden" name="pId" value='.$cId.'>';
        }
        echo '        <div>';
        echo '            <label for="payment">Payment method: </label>';
        echo '            <select name="payment" id="">';
        echo '                <option value="">MTN Mobile Money</option>';
        echo '                <option value="">Orange Money</option>';
        echo '                <option value="">Paypal</option>';
        echo '                <option value="">Visa card</option>';
        echo '            </select>';
        echo '        </div>';
        echo '        <button type="submit" name="submit">Place order</button>';
        echo '    </form>';
    }     
   
    echo '</div>';
    ?>
    
            
    ?>
    

    </div>
    <div class="container-fluid bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; <a class="text-secondary fw-bold" href="#">BtechMarket</a> Designed by <a class="text-secondary fw-bold" href="#">Group7</a></p>
        </div>
    </div>
    <!-- Footer End -->
    


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>