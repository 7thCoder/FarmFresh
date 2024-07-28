<?php
   $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

    $id=$_GET['showid'];

    $sql = "select * from products where Id = $id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['Name'];
    }

       $del = "delete from products where Id = '$id'";

       $result = mysqli_query($conn, $del);

        if($result){
           header("Location: viewproducts.php?deletesuccess");
        }
       
?>