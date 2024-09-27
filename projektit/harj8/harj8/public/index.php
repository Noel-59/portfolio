<?php
session_start();
set_include_path(dirname(__FILE__) . '/../');

$route = explode("?", $_SERVER["REQUEST_URI"])[0];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

require_once 'libraries/auth.php';
require_once 'controllers/userManagement.php';
require_once 'controllers/articleManagement.php';

switch($route) {
    case "/":
        if ($method == "get") {
            $category = isset($_GET['category']) ? $_GET['category'] : null;
            viewArticlesController($category);
        }
    break;

    case "/":
            viewArticlesController();
       
    break;

    case "/register":
        registerController();
    break;

    case "/login":
        loginController();
    break;

    case "/logout":
        logoutController();
    break;

    case "/delete_article":
        if (isLoggedIn()) {
            deleteArticleController();
        } else {
            loginController();
        }
    break;

    case "/update_article":
        if (isLoggedIn()) {
            if ($method == "get") {
                editArticleController();  
            } else {
                updateArticleController();
            }
        } else {
            loginController();
        }
    break;
    
    case "/generate_pdf":
        require_once '../views/generate_pdf.php';
        break;

    case "/more":
        viewMoreArticlesController(); 
        break;

    case "/new_article":
        if ($method == "post") {
            addArticleController();
        } else {
            require "../views/newArticle.view.php";
        }
    break;
    default:
        echo "404";
}
?>