<?php
   $conn = mysqli_connect('localhost','root','','farm') or die("unable to connect to db");

    $id=$_GET['showid'];

    $sql = "select * from user where Id = $id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['username'];
    }

       $del = "delete from user where Id = '$id'";

       $result = mysqli_query($conn, $del);

        if($result){
           header("Location: vendors.php?deletesuccess");
        }
       
?>