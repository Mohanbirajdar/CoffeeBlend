<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 


    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        $baseUrl = ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'localhost:8000') ? 'http://localhost:8000' : 'https://' . $_SERVER['HTTP_HOST'];
        header('location: ' . $baseUrl);
        exit;
    }

    if(!isset($_SESSION['user_id'])) {
        header("location: ".APPURL."");
    }

    $deleteAll = $conn->query("DELETE FROM cart WHERE user_id='$_SESSION[user_id]'");
    $deleteAll->execute();

    header("location: cart.php");