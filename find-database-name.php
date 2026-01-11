<!DOCTYPE html>
<html>
<head>
    <title>Database Name Finder</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f5f5f5; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
        .warning { color: orange; font-weight: bold; }
        .box { background: white; padding: 15px; margin: 10px 0; border-left: 4px solid #2196F3; }
        pre { background: #263238; color: #aed581; padding: 15px; border-radius: 5px; overflow-x: auto; }
        table { border-collapse: collapse; width: 100%; margin: 10px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #2196F3; color: white; }
        .highlight { background-color: yellow; font-weight: bold; }
    </style>
</head>
<body>
    <h1>🔍 Database Name Finder</h1>
    
    <div class="box">
        <h3>Testing Different Database Names:</h3>
        <?php
        $host = "sql306.infinityfree.com";
        $user = "if0_40757292";
        $pass = "St3EsR0M2gsnQ";
        
        // List of possible database names to try
        $possibleDatabases = [
            "if0_40757292_caffe",    // Current attempt (single 'e')
            "if0_40757292_caffee",   // Old attempt (double 'e')
            "if0_40757292_coffee",   // Alternative
            "if0_40757292_coffeeblend",
            "if0_40757292",          // Just the username
        ];
        
        echo "<table>";
        echo "<tr><th>Database Name</th><th>Status</th><th>Details</th></tr>";
        
        $foundDatabase = null;
        
        foreach ($possibleDatabases as $dbname) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($dbname) . "</td>";
            
            try {
                $testConn = new PDO(
                    "mysql:host=$host;dbname=$dbname",
                    $user,
                    $pass
                );
                $testConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Try to query products table
                $stmt = $testConn->query("SHOW TABLES");
                $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
                
                echo "<td class='success'>✓ CONNECTED!</td>";
                echo "<td>Found " . count($tables) . " tables: " . implode(", ", $tables) . "</td>";
                
                if (!$foundDatabase) {
                    $foundDatabase = $dbname;
                }
                
            } catch(PDOException $e) {
                echo "<td class='error'>✗ Failed</td>";
                echo "<td>" . htmlspecialchars($e->getMessage()) . "</td>";
            }
            
            echo "</tr>";
        }
        
        echo "</table>";
        
        if ($foundDatabase) {
            echo "<div class='box' style='border-left-color: green; background: #e8f5e9;'>";
            echo "<h2 class='success'>✓ FOUND YOUR DATABASE!</h2>";
            echo "<p class='highlight'>Your correct database name is: <code>$foundDatabase</code></p>";
            echo "</div>";
        } else {
            echo "<div class='box' style='border-left-color: red; background: #ffebee;'>";
            echo "<h2 class='error'>✗ NO DATABASE FOUND</h2>";
            echo "<p>None of the common database names worked.</p>";
            echo "</div>";
        }
        ?>
    </div>
    
    <div class="box">
        <h3>📋 How to Check Your Actual Database Name:</h3>
        <ol>
            <li>Log in to your InfinityFree control panel: <a href="https://app.infinityfree.com/" target="_blank">app.infinityfree.com</a></li>
            <li>Click on your website (mycafe.free.nf)</li>
            <li>Go to "MySQL Databases" section</li>
            <li>Look for the database name - it should start with "if0_40757292_"</li>
            <li>Tell me the EXACT name you see there</li>
        </ol>
    </div>
    
    <div class="box">
        <h3>⚠️ Important Note:</h3>
        <p>The error "Access denied...to database" means:</p>
        <ul>
            <li>Either the database doesn't exist in your InfinityFree account</li>
            <li>Or the database name is spelled differently</li>
            <li>You may need to CREATE the database first in your control panel</li>
        </ul>
    </div>
    
    <div class="box" style="border-left-color: #ff5722;">
        <h3>🔧 Quick Fix Steps:</h3>
        <ol>
            <li><strong>Go to InfinityFree control panel</strong></li>
            <li><strong>Check MySQL Databases section</strong></li>
            <li>If no database exists → <strong>Create one</strong></li>
            <li>If database exists → <strong>Copy the exact name</strong></li>
            <li>Import your SQL file (coffee-blend.sql) via phpMyAdmin</li>
            <li>Tell me the exact database name</li>
        </ol>
    </div>
</body>
</html>
