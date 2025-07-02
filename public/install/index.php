<?php
// Check requirements
$requirements = [
    'PHP >= 8.0' => version_compare(PHP_VERSION, '8.0.0', '>='),
    'PDO Extension' => extension_loaded('PDO'),
    'MBString Extension' => extension_loaded('mbstring'),
];

// Database setup form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and create .env file
    $envContent = "APP_NAME=BlogSystem\n";
    $envContent .= "DB_HOST={$_POST['db_host']}\n";
    $envContent .= "DB_DATABASE={$_POST['db_name']}\n";
    $envContent .= "DB_USERNAME={$_POST['db_user']}\n";
    $envContent .= "DB_PASSWORD={$_POST['db_pass']}\n";
    file_put_contents(__DIR__.'/../../.env', $envContent);
    
    
}
?>