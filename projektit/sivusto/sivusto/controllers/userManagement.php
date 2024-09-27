<?php
require_once "database/models/users.php";
require_once 'libraries/cleaners.php';

function registerController(){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    if(isset($username) && isset($password) && isset($type)){
        $username = cleanUpInput($username);
        $password = cleanUpInput($password);
        $type = cleanUpInput($type);

        try {
            $user = getUserInfo($username);
            if (!$user) {
                $token = addUser($username, $password, $type);
                $t = time() + 1200;
                setcookie("username",$username,$t,"/");
                setcookie("userid",$userid,$t,"/");
                setcookie("token",$token,$t,"/");
                header("Location: /"); 
            } else {
                echo "Käyttäjä on jo olemassa!";
            }
        } catch (PDOException $e){
            echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
        }
    } else {
        require "views/register.view.php";
    }
}

function loginController(){
    if(isset($_POST['username'], $_POST['password'])){
        $username = cleanUpInput($_POST['username']);
        $password = cleanUpInput($_POST['password']);
  
        $result = login($username, $password);
        if($result){
            $t = time() + 1200;
            setcookie("username",$result['Käyttäjänimi'],$t,"/");
            setcookie("token",$result['Token'],$t,"/");
            header("Location: /"); 
        } else {
            require "views/login.view.php";
        }
    } else {
        require "views/login.view.php";
    }
}

function logoutController(){
    setcookie("token",null);
    header("Location: /login"); // forward eli uudelleenohjaus
    die();
}