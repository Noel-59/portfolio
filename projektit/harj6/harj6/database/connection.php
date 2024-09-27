<?php

function connectDB(){
    static $connection;
    if(!isset($connection)) {
        $connection = connect();
    }      
    return $connection;
}

function connect() {
    $host = getenv('DB_HOST', true) ?: "noekiv23.treok.io";
    $port = getenv('DB_PORT', true) ?: 3306; 
    $dbname = getenv('DB_NAME', true) ?: "noekiv23_harj6"; 
    $user = getenv('DB_USERNAME', true) ?: "noekiv23_harj6"; 
    $password = getenv('DB_PASSWORD', true) ?: "KEOuRvoMLAa12"; 

    $connectionString = "mysql:host=$host;dbname=$dbname;port=$port;charset=utf8";

    try {       
        $pdo = new PDO($connectionString, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e){
        echo "Virhe tietokantayhteydessä: " . $e->getMessage();
        die();
    }
}

function register($pdo, $username, $password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO käyttäjä (käyttäjänimi, salasana) VALUES (?, ?)");
    $stmt->execute([$username, $hashedPassword]);
}

function login($pdo, $username, $password) {
    $stmt = $pdo->prepare("SELECT * FROM käyttäjä WHERE käyttäjänimi = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['salasana'])) {
        // Login successful
        // You might want to set session variables or something similar
        return true;
    } else {
        // Login failed
        return false;
    }

    
}
