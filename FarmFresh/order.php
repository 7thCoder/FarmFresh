<?php
     session_start();

     $clientId = $_SESSION['uid'];

     echo '<script>';
     echo 'alert("Order placed successfully!");';
     echo '</script>';
     
    if(isset($_POST['submit'])){
        $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

        $pid = $_POST['product'];
        $clid = $_POST['product'];

        $sql ="select * from products where Id= $pid";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Fetch the first row
            $row = mysqli_fetch_assoc($result);
            $Id = $row['Id'];
            $name = $row['Name'];
            $vendor = $row['SellerId'];
            $fileName = $row['Image'];
            $Description = $row['Description'];
            $Price = $row['Price'];
        } else {
            die("No product found with ID: $pid");
        }
    
        // if($result){
        //     while($row = mysqli_fetch_assoc($result)){
        //         $Id = $row['Id'];
        //         $name = $row['Name'];
        //         $sId = $row['SellerId'];
        //         $fileName = $row['Image'];
        //         $Description = $row['Description'];
        //         $Price = $row['Price'];
        //     }
        // }

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
        }     
            
        $quer = "INSERT INTO orders(Name,  clientId, SellerId, buyer, tel, adress, Description, Price)
        VALUES ('$name', '$cId','$vendor','$cname','$ctel','$cadress','$Description', '$Price')";

        $resul = mysqli_query($conn, $quer);

        if($resul){
            header("Location:http://localhost/FarmFresh/FarmFresh/Dashboard/confirm.php");
        }

    }

?>