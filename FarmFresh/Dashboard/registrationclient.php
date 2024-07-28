<?php

   $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

    if(isset($_POST['submit'])){
    //    $file = $_FILES['file'];
       $name=$_POST['name'];
       $password =$_POST['password'];
       $email = $_POST['email'];
       $adress = $_POST['adress'];
       $tel = $_POST['contact'];
       $products = $_POST['desc'];
       

    //    $fileName = $_FILES['file']['name'];

       $sql = "INSERT INTO user(username, email, password,  tel, adress, Status, registered)
               VALUES ('$name','$email', '$password','$tel','$adress', 'client','yes')";

       $result = mysqli_query($conn, $sql);

       

        $fileTmpName = $_FILES['file']['tmp_name'];
       //  $fileSize = $_FILES['file']['size'];
       // $fileError = $_FILES['file']['error'];
       // $fileType = $_FILES['file']['type'];

       //  $fileExt = explode('.',$fileName);
       // $fileActualExt = strtolower(end($fileExt));
       
        // $fileDestination = 'images/'.$fileName;
        if($result){
        //    move_uploaded_file($fileTmpName, $fileDestination);
           header("Location:login.php");
        }
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="formreg.css">
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
            <h1>Sign up</h1>
            <span>
                Already have an account?
                <a href="login.php">Login </a>instead
            </span>
            <form action="" method="post" enctype="multipart/form-data">

            <div>
                <label for="name">Name: </label>
                <input type="text" name="name" placeholder="Enter your name...">
            </div>

            <div>
                <label for="password">Password: </label>
                <input type="password" name="password" placeholder="password...">
            </div>

            <div>
                <label for="email">Email: </label>
                <input type="email" name="email" placeholder="Email...">
            </div>
            
            
            <div>
                <label for="adress">Adress: </label>
                <input type="text" name="adress" placeholder="Adress....">
            </div>

            <div>
                <label for="contact">Contact: </label>
                <input type="text" name="contact" placeholder="Contact....">
            </div>
            
        <button type="submit" name="submit">Submit</button>
                
            </form>
        </div>
   </div>
</body>
</html>