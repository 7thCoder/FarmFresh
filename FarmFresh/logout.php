<?php
    session_start();
    session_destroy();
    // Redirect to login page or another location
    header("Location:http://localhost/FarmFresh/FarmFresh/index.php");
    exit;
?>