<?php
require_once "database/models/article.php";
require_once 'libraries/cleaners.php';

function viewArticlesController(){
    $allnews = getAllArticles();
    require "views/articles.view.php";    
}

function addArticleController(){
    if(isset($_POST['newstitle'], $_POST['newstext'], $_POST['newstime'], $_POST['removedate'], $_POST['section'])){
        $title = cleanUpInput($_POST['newstitle']);
        $text = cleanUpInput($_POST['newstext']);
        $time = cleanUpInput($_POST['newstime']);
        $removetime = cleanUpInput($_POST['removedate']);
        $section = cleanUpInput($_POST['section']); 
        $userid = $_SESSION["userid"];
        addArticle($title, $text, $time, $removetime, $section, $userid); 
        header("Location: /");    
    } else {
        require "views/newArticle.view.php";
    }
}

function editArticleController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            $news = getArticleById($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe uutista haettaessa: " . $e->getMessage();
    }
    
    if($news){
        $id = $news['articleid'];
        $title = $news['title'];
        $text = $news['text'];
        $dbtime = $news['created'];
        $time = implode("T", explode(" ",$dbtime));
        $removetime = $news['expirydate'];
        $id = $news['articleid'];
    
        require "views/updateArticle.view.php";
    } else {
        header("Location: /");
        exit;
    }
}

function updateArticleController(){
    if(isset($_POST['newstitle'], $_POST['newstext'], $_POST['newstime'], $_POST['removedate'], $_POST["id"])){
        $title = cleanUpInput($_POST['newstitle']);
        $text = cleanUpInput($_POST['newstext']);
        $time = cleanUpInput($_POST['newstime']);
        $removetime = cleanUpInput($_POST['removedate']);
        $id = cleanUpInput($_POST["id"]);

        try{
            updateArticle($title, $text, $time, $removetime, $id);
            header("Location: /");    
        } catch (PDOException $e){
                echo "Virhe uutista päivitettäessä: " . $e->getMessage();
        }
    } else {
        header("Location: /");
        exit;
    }
}

function deleteArticleController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            deleteArticle($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe uutista poistettaessa: " . $e->getMessage();
    }

    $allnews = getAllArticles();

    header("Location: /");
    exit;
}
?>
