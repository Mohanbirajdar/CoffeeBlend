<?php

    try {
        //host - InfinityFree uses specific hostnames
        define("HOST", "sql###.infinityfreeapp.com"); // Replace ### with your actual number
        
        //dbname - Format: ifXXXXX_caffee (replace with your actual database name)
        define("DBNAME", "ifXXXXX_caffee"); // Replace ifXXXXX with your account ID
        
        //user - Format: ifXXXXX_user (replace with your actual username)
        define("USER", "ifXXXXX_user"); // Replace ifXXXXX with your account ID
        
        //pass - Your database password
        define("PASS", "your_password_here"); // Replace with your actual password


        $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $Exception ) { 

        echo $Exception->getMessage();
    }
   
