<?php
session_start();
set_include_path(dirname(__FILE__) . '/../');
$method = strtolower($_SERVER["REQUEST_METHOD"]);

require_once 'public/css/tyyli.php';
require_once 'database/connection.php';

$pdo = connectDB();

switch($_SERVER['REQUEST_URI']) {
    case '/login': 
        if ($method === 'post') {
            // Handle login form submission
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(login($pdo, $username, $password)) {
                // Redirect user after successful login
                header("Location: home.php");

 // Change this to the correct path of home.php
                exit();
            } else {
                // Handle login failure, maybe show an error message
                echo "Kirjautuminen epäonnistui";
            }
        } else {
            require_once 'views/login.view.php';
        }
        break;
    case '/register': 
        if ($method === 'post') {
            // Handle register form submission
            $username = $_POST['username'];
            $password = $_POST['password'];
            register($pdo, $username, $password);
            // Optionally, you might want to redirect the user to the login page after registration
            header("Location: /login");
            exit();
        } else {
            require_once 'views/register.view.php';
        }
        break;
    default:
       echo "<h2>Noelin sivusto</h2>";
}
?>

<a href="/login"><button class="pink-button">Kirjaudu</button></a>

<a href="/register"><button class="pink-button">Rekisteröidy</button></a>
