<?php
function hashPassword($password){
    $password = trim($password);
    $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
    return $hashedpassword;
}

function isLoggedIn(){
    global $userid;
    $username = $_COOKIE["username"];
    $token = $_COOKIE["token"];
    if (isset($username) && isset($token)) {
        $info = getUserInfo($username);
        if ($info && $token == $info["Token"]) {
            $userid= $info["Id"];
            return $userid;
        }
    } 
    return false;
}