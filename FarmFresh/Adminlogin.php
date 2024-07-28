<?php
    session_start();

    $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

    if(isset($_POST['submit'])){
        $uname= $_POST['uname'];
        $password = $_POST['password'];

        $sql = "Select * from user where
         username ='$uname' and password ='$password'";

        $result= mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        

            if(is_array($row)){
                $_SESSION['uname'] = $row["username"];
                $_SESSION['uid'] = $row["Id"];
                $_SESSION['Status'] = $row["Status"];
                $role = $row["Status"];
            }
            else{
                header("Location:http://localhost/FarmFresh/FarmFresh/adminlogin.php");
            }
            if(isset($_SESSION["uname"])){
                if($role == "seller" ){
                    header("Location:http://localhost/FarmFresh/FarmFresh/dashboardvendor/admin.php");
                }
                elseif($role == "admin"){
                    header("Location:http://localhost/FarmFresh/FarmFresh/dashboard/admin.php");
                }
                
            }    
            else{
                die("error");

            }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<br>
<br>
<br>
<br>
<br>
<div class="container " >
     <div class="row justify-content-center">
     <div class="col-18 col-sm-9 col-md-5">
       <br>                         
    <div class="container card shadow ">
    <br>
        <div class="bg-success">
        <div class="text-center text-white">
        <h1>  <i class="bi-people-fill h4 m-1 "></i> 
            <!-- <img src="person.ico"  class="mr-0 mt-1 rounded-circle" style="width:50px;"> -->
        <b>Login</b></h1> 
        </div>
    
    </div>
    <br>
    <form action="" method="POST">
        <div class="form-group">
            <div class="text-center">
            <div class="d-flex">
          <label for="text" class=""><h5><b>username:</b></h5></label>
          <input type="text" class="form-control my-0 ml-4" placeholder="Enter username" id="uname" name="uname">
            </div>
         <br>
         <div class="d-flex">
          <label for="pwd"><h5><b>Password:</b></h5></label>
          <input type="password" class="form-control my-0 ml-4" placeholder="Enter password" id="pwd" name="password">
         </div>
        </div>
        <br>
        <br>
        <div class="text-center">
        <a class="btn btn-danger" href="#" role="button">Cancel</a> 
        <button class="btn btn-success" type="submit" name="submit">Connect</button>
        </div>
    </form>
    <br>
</div>
     


    <!-- this is the script side -->

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