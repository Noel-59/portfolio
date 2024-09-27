<?php
require_once "database/models/apartment.php";
require_once 'libraries/cleaners.php';
require_once "controllers/userManagement.php";


function viewArticlesController(){
    $allnews = getAllArticles();
    require "views/articles.view.php";    
}
function viewApartmentsController(){
    $allnews = getAllApartments();
    require "views/apartments.view.php";    
}

function addApartmentController(){
    global $userid;
    if(isset($_POST['Osoite'], $_POST['Hinta'], $_POST['Koko'], $_POST['Muuta'], $_POST['kuva'])){
        $title = cleanUpInput($_POST['Osoite']);
        $text = cleanUpInput($_POST['Hinta']);
        $size = cleanUpInput($_POST['Koko']);
        $other = cleanUpInput($_POST['Muuta']);
        $pic = cleanUpInput($_POST['kuva']);
        $rDate = date("Y/m/d");
        addArticle($title, $text, $size, $other, $pic, $rDate, $userid); //kovakoodattu 5 
        header("Location: /");    
    } else {
        require "views/newApartment.view.php";
    }
}

function editApartmentController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            $news = getArticleById($id);
            if($news){
                $id = $news['asunnotID'];
                $address = $news['Osoite'];
                $price = $news['Hinta'];
                $size = $news['Koko'];
                $other = $news['Muuta'];
                $pic = $news['kuva'];
                $id = $news['asunnotID'];
            
                require "views/apartment.edit.php";
            } else {
                header("Location: /");
                exit;
            }
        } else {
            //lomake lähetetty
            if(isset($_POST['Osoite'], $_POST['Hinta'], $_POST['Koko'], $_POST['Muuta'], $_POST['kuva'], $_POST['asunnotID'])){
                $title = cleanUpInput($_POST['Osoite']);
                $text = cleanUpInput($_POST['Hinta']);
                $size = cleanUpInput($_POST['Koko']);
                $other = cleanUpInput($_POST['Muuta']);
                $pic = cleanUpInput($_POST['kuva']);
                $id= cleanUpInput($_POST['asunnotID']);
                updateApartment($title, $text, $size, $other, $pic, $id); 
                header("Location: /");    
            } else {
                require "views/newApartment.view.php";
            }
        }
    } catch (PDOException $e){
        echo "Virhe uutista haettaessa: " . $e->getMessage();
    }
    
   
}

function updateApartmentController(){
    if(isset($_POST['newstitle'], $_POST['newstext'], $_POST['size'], $_POST['other'], $_POST["id"])){
        $title = cleanUpInput($_POST['newstitle']);
        $text = cleanUpInput($_POST['newstext']);
        $size = cleanUpInput($_POST['size']);
        $other = cleanUpInput($_POST['other']);
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

function deleteApartmentController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            deleteApartment($id);
            header("Location: /");
            exit;
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe asuntoa poistettaessa: " . $e->getMessage();
    }
}