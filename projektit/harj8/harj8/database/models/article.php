<?php
require_once "database/connection.php";

function getAllRecipes() {
    $pdo = connectDB();
    $sql = "SELECT * FROM recipes";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addRecipe($name, $category, $ingredients, $instructions) {
    try {
        $pdo = connectDB();
        $sql = "INSERT INTO recipes (name, category, ingredients, instructions) VALUES (?, ?, ?, ?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$name, $category, $ingredients, $instructions]);
        return true; // Return true if insertion is successful
    } catch (PDOException $e) {
        echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
        return false; // Return false if insertion fails
    }
}

function getRecipeById($id) {
    $pdo = connectDB();
    $sql = "SELECT * FROM recipes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateRecipe($name, $category, $ingredients, $instructions, $id) {
    try {
        $pdo = connectDB();
        $sql = "UPDATE recipes SET name = ?, category = ?, ingredients = ?, instructions = ? WHERE id = ?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$name, $category, $ingredients, $instructions, $id]);
        return true; // Return true if update is successful
    } catch (PDOException $e) {
        echo "Error updating recipe: " . $e->getMessage();
        return false; // Return false if update fails
    }
}

function deleteRecipe($id) {
    try {
        $pdo = connectDB();
        $sql = "DELETE FROM recipes WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        return true; // Return true if deletion is successful
    } catch (PDOException $e) {
        echo "Error deleting recipe: " . $e->getMessage();
        return false; // Return false if deletion fails
    }
}

function getRecipesByCategory($category) {
    $pdo = connectDB();
    $sql = "SELECT * FROM recipes WHERE category = ?";
    $stm = $pdo->prepare($sql);
    $stm->execute([$category]);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
?>
