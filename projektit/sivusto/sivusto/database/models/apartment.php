<?php
require_once "database/connection.php";
require_once "controllers/userManagement.php";

function getAllApartments(){
    $pdo =connectDB();
    $sql = "SELECT * FROM asunnot";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}


function getApartment($id){
    $pdo = connectDB();
    $sql = "SELECT * FROM asunnot WHERE asunnotId=?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$id]);
    $res = $stm->fetch(PDO::FETCH_ASSOC);
    return $res;
}
function addArticle($title, $text, $size, $other, $pic, $rdate, $userid){
    $pdo = connectDB();
    $data = [$title, $text, $size, $other, $pic, $rdate, $userid];
    $sql = "INSERT INTO asunnot (Osoite, Hinta, Koko, Muuta, kuva, julkaisuPvm, vuokraajaID) VALUES(?,?,?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function getArticleById($id){
    $pdo = connectDB();
    $sql = "SELECT * FROM asunnot WHERE asunnotID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$id]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function deleteApartment($id){
    $pdo = connectDB();
    $sql = "DELETE FROM asunnot WHERE asunnotID=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$id]);
}

function updateApartment($title, $text, $size, $other, $pic, $id){
    $pdo = connectDB();
    $data = [$title, $text, $size, $other, $pic, $id];
    $sql = "UPDATE asunnot SET Osoite = ?, Hinta = ?, Koko = ?, Muuta = ?, kuva = ? WHERE asunnotID = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}