<?php


    session_start();
    session_unset();
    session_destroy();
    $baseUrl = ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'localhost:8000') ? 'http://localhost:8000' : 'https://' . $_SERVER['HTTP_HOST'];
    header("location: " . $baseUrl);