<?php
require_once "database/connection.php";

function getAllArticles(){
    $pdo = connectDB();
    $sql = "SELECT * FROM articles";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

function addArticle($title, $text, $time, $removetime, $userid, $section){
    $pdo = connectDB();
    $data = [$title, $text, $time, $removetime, $userid, $section];
    $sql = "INSERT INTO articles (title, text, created, expirydate, userid, section) VALUES(?,?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function getArticleById($id){
    $pdo = connectDB();
    $sql = "SELECT * FROM articles WHERE articleid=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$id]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function deleteArticle($id){
    $pdo = connectDB();
    $sql = "DELETE FROM articles WHERE articleid=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$id]);
}

function updateArticle($title, $text, $time, $removetime, $articleid){
    $pdo = connectDB();
    $data = [$title, $text, $time, $removetime, $articleid];
    $sql = "UPDATE articles SET title = ?, text = ?, created = ?, expirydate = ? WHERE articleid = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}
?>
