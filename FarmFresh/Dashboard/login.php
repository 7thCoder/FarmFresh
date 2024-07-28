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
                $state = $row['registered'];
                $role = $row["Status"];
            }
            else{
                header("Location:http://localhost/FarmFresh/FarmFresh/dashboard/login.php");
            }
            if(isset($_SESSION["uname"])){
                if($role == "Seller" ){
                    if($state == "no"){
                        header("Location:http://localhost/FarmFresh/FarmFresh/dashboard/sorry.php");

                    }
                    else{
                        header("Location:http://localhost/FarmFresh/FarmFresh/dashboardvendor/viewproducts.php");
                    }
                    
                }
                elseif($role == "admin"){
                    header("Location:http://localhost/FarmFresh/FarmFresh/dashboard/dashboard.php");
                }
                elseif($role == "client"){
                    header("Location:http://localhost/FarmFresh/FarmFresh/index.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
   <div class="main">
        <div class="first">
            <div >
                <h1>Welcome, to B-Tech Farm</h1>
                <h2>The trusted website to purchase all your Agro- pastoral products</h2>
            </div>
            
        </div>
        <div class="second">
            <h1>Login</h1>
            <span>
                Don't have an account?
                <a href="landing.php">Register </a>instead
            </span>
            <form action="" method="POST">
                <div>
                    <label for="name">Name: </label>
                    <input type="text" name="uname" placeholder="Enter your name...">
                </div>
                <div>
                    <label for="password">Password: </label>
                    <input type="password" name="password" placeholder="Ener password...">
                </div>

                <button type="submit" name="submit">Submit</button>
                
            </form>
        </div>
   </div>
</body>
</html>