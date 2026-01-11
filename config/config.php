<?php

    try {
        // Auto-detect environment
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $isLocalhost = ($host == 'localhost' || $host == 'localhost:8000' || strpos($host, '127.0.0.1') !== false);
        
        if ($isLocalhost) {
            // Local development settings
            define("HOST", "localhost");
            define("DBNAME", "caffee");
            define("USER", "root");
            define("PASS", "");
        } else {
            // Production settings for InfinityFree
            // Your actual InfinityFree database credentials
            define("HOST", "sql306.infinityfree.com"); // Your database host
            define("DBNAME", "if0_40757292_caffe"); // Your database name (corrected to single 'e')
            define("USER", "if0_40757292"); // Your database username
            define("PASS", "St3EsR0M2gsnQ"); // Your database password
        }


        $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $Exception ) { 

        echo $Exception->getMessage();
    }
   