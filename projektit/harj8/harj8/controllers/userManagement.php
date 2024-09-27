<?php
require_once "database/models/users.php";
require_once 'libraries/cleaners.php';

function registerController(){
    if(isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['birth_year'])){
        $username = cleanUpInput($_POST['username']);
        $email = cleanUpInput($_POST['email']);
        $password = cleanUpInput($_POST['password']);
        $birth_year = cleanUpInput($_POST['birth_year']);

        $current_year = date("Y");
        $age = $current_year - $birth_year;

        if ($age < 15) {
            echo "You must be at least 15 years old to register.";
            require "views/register.php";
            return;
        }

        try {
            addUser($username, $email, $password, $birth_year);
            header("Location: /login"); 
            exit(); 
        } catch (PDOException $e){
            echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
        }
    } else {
        require "views/register.php";
    }
}

function loginController(){
    if(isset($_POST['username'], $_POST['password'])){
        $username = cleanUpInput($_POST['username']);
        $password = cleanUpInput($_POST['password']);
  
        $result = login($username, $password);
        if($result){
            $_SESSION['username'] = $result['username'];
            $_SESSION['userid'] = $result['id'];
            $_SESSION['session_id'] = session_id();
            header("Location: /"); // Redirect to index.php after successful login
            exit(); 
        } else {
            // Do not include header here
            require "views/login.php";
        }
    } else {
        // Do not include header here
        require "views/login.php";
    }
}
function logoutController(){
    session_unset(); //poistaa kaikki muuttujat
    session_destroy();
    setcookie(session_name(),'',0,'/'); //poistaa evästeen selaimesta
    session_regenerate_id(true);
    header("Location: /login"); // forward eli uudelleenohjaus
    die();
}

function viewUsersController() {
    // Check if the current page is the login or register page
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage === '../views/login.php' || $currentPage === '../views/register.php') {
        // If the current page is login or register, don't load recipes
        require "../views/{$currentPage}";
        return; // Stop execution here
    }
}
