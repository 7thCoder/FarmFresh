<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Btech farm - Organic Farm </title>
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
                        <h1 class="m-0 display-4 text-primary"><span class="text-secondary">B-Tech</span>Market</h1>
                    </a>
                </div>
            </div>
            <!-- <div class="col-lg-3">
                <div class="d-flex align-items-center justify-content-end">
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-primary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Topbar End -->

   <!-- Navbar Start -->
   <nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex d-lg-none">
            <h1 class="m-0 display-4 text-secondary"><span class="text-white">B-Tech</span>Farm</h1>
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


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 bg-hero mb-5">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-white mb-md-4">Our Products</h1>
                    <a href="index.php" class="btn btn-primary py-md-3 px-md-5 me-3">Home</a>
                    <a href="" class="btn btn-secondary py-md-3 px-md-5">Products</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">Products</h6>
                <h1 class="display-5"> Fresh Products</h1>
            </div>
            <div class="owl-carousel product-carousel px-5">
            <?php
                $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");
                
                $sql ="select * from products";
                $result = mysqli_query($conn, $sql);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $Id = $row['Id'];
                        $name = $row['Name'];
                        $fileName = $row['Image'];
                        $Description = $row['Description'];
                        $Price = $row['Price'];

                        echo '<div class="pb-5">';
                            echo '<div class="product-item position-relative bg-white d-flex flex-column text-center">';
                            echo'<img class="img-fluid mb-4" src="Dashboard/images/'.$fileName.'" alt="product image unavailable">';
                                echo'<h6 class="mb-3">'.$name.'</h6>';
                                echo'<h5 class="text-primary mb-0">'.$Price.'</h5>';
                                echo'<div class="btn-action d-flex justify-content-center">';
                                    echo'<a class="btn bg-primary py-2 px-3" href=""><i class="bi bi-cart text-white"></i></a>';
                                    echo'<a class="btn bg-secondary py-2 px-3" href="view_products.php?showid='.$Id.'"><i class="bi bi-eye text-white">details</i></a>';
                                echo'</div>';
                            echo'</div>';
                        echo'</div>';
                    }
                }
            ?>
            </div>
        </div>
    </div>
    <!-- Products End -->


   
    <!-- Features Start -->
   <!-- <div class="container-fluid bg-primary feature py-5 pb-lg-0 my-5">
    <div class="container py-5 pb-lg-0">
        <div class="mx-auto text-center mb-3 pb-2" style="max-width: 500px;">
            <h6 class="text-uppercase text-secondary">Features</h6>
            <h1 class="display-5 text-white">Why Choose Us!!!</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-3">
                <div class="text-white mb-5">
                    <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fa fa-seedling fs-4 text-white"></i>
                    </div>
                    <h4 class="text-white">100% Organic</h4>
                    <p class="mb-0">Grown without any artificial fertilizers to guarantee you with the best nutrients</p>
                </div>
                <div class="text-white">
                    <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fa fa-award fs-4 text-white"></i>
                    </div>
                    <h4 class="text-white">Award Winning</h4>
                    <p class="mb-0">Recognized by the state and other associations for our relentless efforts</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-block bg-white h-100 text-center p-5 pb-lg-0">
                    <p>Choose us for a farm-to-table experience rooted in integrity. Our unwavering commitment to organic excellence, sustainable practices and personalised services ensure that each bite is a conscious choice for your health and your planet</p>
                    <img class="img-fluid" src="img/feature.png" alt="">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="text-white mb-5">
                    <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fa fa-tractor fs-4 text-white"></i>
                    </div>
                    <h4 class="text-white">Modern Farming</h4>
                    <p class="mb-0">Modern equipments to ensure timely delivery</p>
                </div>
                <div class="text-white">
                    <div class="bg-secondary rounded-pill d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt fs-4 text-white"></i>
                    </div>
                    <h4 class="text-white">24/7 Support</h4>
                    <p class="mb-0">We are always available for all your needs</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Features Start -->

    

  <!-- Footer Start -->
  <!-- <div class="container-fluid bg-footer bg-primary text-white mt-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <h4 class="text-white mb-4">Get In Touch</h4>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-white me-2"></i>
                            <p class="text-white mb-0">123 Street, PK8, CMT</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-white me-2"></i>
                            <p class="text-white mb-0">info@example.com</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-white me-2"></i>
                            <p class="text-white mb-0">(+237)123456789</p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-secondary btn-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-secondary btn-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-white mb-4">Quick Links</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Home</a>
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>About Us</a>
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Our Services</a>
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Meet The Team</a>
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Latest Blog</a>
                            <a class="text-white" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h4 class="text-white mb-4">Popular Links</h4>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Home</a>
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>About Us</a>
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Our Services</a>
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Meet The Team</a>
                            <a class="text-white mb-2" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Latest Blog</a>
                            <a class="text-white" href="#"><i class="bi bi-arrow-right text-white me-2"></i>Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-lg-n5">
                <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-secondary p-5">
                    <h4 class="text-white">Newsletter</h4>
                    <h6 class="text-white">Subscribe Our Newsletter</h6>
                    <p>Stay updated on our latest developments and never miss a single update</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
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