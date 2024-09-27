<?php
require_once "../database/models/article.php";

require_once "../database/models/article.php";

function viewArticlesController($category = null) { 
    if ($category) {
        $allRecipes = getRecipesByCategory($category);
    } else {
        $allRecipes = getAllRecipes();
    }
    require "../views/articles.view.php";
}

function addArticleController() {
    if(isset($_POST['name'], $_POST['category'], $_POST['ingredients'], $_POST['instructions'])){
        $name = cleanUpInput($_POST['name']);
        $category = cleanUpInput($_POST['category']);
        $ingredients = cleanUpInput($_POST['ingredients']);
        $instructions = cleanUpInput($_POST['instructions']);
        
        try {
            $result = addRecipe($name, $category, $ingredients, $instructions); 
            if ($result) {
                header("Location: /"); // Redirect to home.php after successful addition
                exit;
            } else {
                echo "Error: Recipe addition failed."; // Debugging message
            }
        } catch (PDOException $e){
            echo "Error adding recipe: " . $e->getMessage(); // Debugging message
        }
    } else {
        require "../views/newArticle.view.php";
    }
}



function editArticleController() {
    if(isset($_GET["id"])){
        $id = cleanUpInput($_GET["id"]);
        $recipe = getRecipeById($id);
    } else {
        echo "Error: ID missing ";    
    }

    if($recipe){
        $id = $recipe['id'];
        $name = $recipe['name'];
        $category = $recipe['category'];
        $ingredients = $recipe['ingredients'];
        $instructions = $recipe['instructions'];

        require "../views/updateArticle.view.php";
    } else {
        header("Location: /");
        exit;
    }
}

function updateArticleController() {
    if(isset($_POST['name'], $_POST['category'], $_POST['ingredients'], $_POST['instructions'], $_POST["id"])){
        $name = cleanUpInput($_POST['name']);
        $category = cleanUpInput($_POST['category']);
        $ingredients = cleanUpInput($_POST['ingredients']);
        $instructions = cleanUpInput($_POST['instructions']);
        $id = cleanUpInput($_POST["id"]);

        try {
            updateRecipe($name, $category, $ingredients, $instructions, $id);
            header("Location: /");    
        } catch (PDOException $e){
            echo "Error updating recipe: " . $e->getMessage();
        }
    } else {
        header("Location: /");
        exit;
    }
}

function deleteArticleController() {
    if(isset($_GET["id"])){
        $id = cleanUpInput($_GET["id"]);
        deleteRecipe($id);
    } else {
        echo "Error: ID missing ";    
    }

    header("Location: /");
    exit;
}

function viewMoreArticlesController() {
    $allRecipes = getAllRecipes(); 
    require "../views/more.php";
}


?>


