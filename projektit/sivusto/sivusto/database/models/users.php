<?php
require_once "database/connection.php";

function addUser($username, $password, $type){
    $loginToken = "";

    for ($x=0;$x<32;$x++) {
        $num = rand(0,15);
    
        $loginToken = $loginToken.dechex($num);
    }

    $pdo = connectDB();
    $hashedpassword = hashPassword($password);
    $data = [$username, $hashedpassword, $loginToken, $type];
    $sql = "INSERT INTO Käyttäjät (Käyttäjänimi, Salasana, Token, TyyppiID) VALUES(?,?,?,?)";
    $stm=$pdo->prepare($sql);
    $stm->execute($data);
    return $loginToken;
}

function login($username, $password){
    $user = getUserInfo($username);
    $hashedpassword = $user["Salasana"];

    if($hashedpassword && password_verify($password, $hashedpassword))
        return $user;
    else 
        return false;
}
function getUserInfo($username) {
    $pdo = connectDB();
    $sql = "SELECT * FROM Käyttäjät WHERE Käyttäjänimi=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$username]);
    return $stm->fetch(PDO::FETCH_ASSOC);
}
