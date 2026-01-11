<?php

// Database setup script
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "caffee";

echo "=== Coffee Blend Database Setup ===\n\n";

try {
    // Connect without database to create it
    $conn = new PDO("mysql:host=$host", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "✓ Connected to MySQL server\n";
    
    // Create database
    $conn->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
    echo "✓ Database '$dbname' created/verified\n";
    
    // Use the database
    $conn->exec("USE `$dbname`");
    
    // Read and execute SQL file
    $sqlFile = __DIR__ . '/SQL_FILE/coffee-blend.sql';
    
    if (!file_exists($sqlFile)) {
        die("✗ Error: SQL file not found at $sqlFile\n");
    }
    
    $sql = file_get_contents($sqlFile);
    
    // Split SQL statements and execute them
    $statements = array_filter(array_map('trim', explode(';', $sql)));
    
    $count = 0;
    foreach ($statements as $statement) {
        if (!empty($statement) && $statement != '' && !preg_match('/^--/', $statement)) {
            try {
                $conn->exec($statement);
                $count++;
            } catch (PDOException $e) {
                // Skip comments and non-critical errors
                if (strpos($e->getMessage(), 'already exists') === false) {
                    echo "Warning: " . $e->getMessage() . "\n";
                }
            }
        }
    }
    
    echo "✓ Executed $count SQL statements\n";
    
    // Verify tables
    $tables = $conn->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
    echo "✓ Database tables created: " . count($tables) . " tables\n";
    echo "  Tables: " . implode(', ', $tables) . "\n";
    
    echo "\n=== Setup Complete! ===\n";
    echo "You can now access the website at: http://localhost:8000\n";
    
} catch (PDOException $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    exit(1);
}
