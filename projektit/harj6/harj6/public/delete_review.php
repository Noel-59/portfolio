<?php
require_once "../database/connection.php";
require_once "../public/css/tyyli.php"; 

$pdo = connectDB();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Display a confirmation page for deleting the review
    $reviewId = $_GET['id'];
    // Fetch the review details from the database
    $stmt = $pdo->prepare("SELECT * FROM arvostelu WHERE id = ?");
    $stmt->execute([$reviewId]);
    $review = $stmt->fetch(PDO::FETCH_ASSOC);
    // Display a confirmation message with review details
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Review Confirmation</title>
        <link rel="stylesheet" href="/public/css/tyyli.php"> <!-- Include CSS -->
    </head>
    <body>
        <div class="container">
            <h2>Delete Review Confirmation</h2>
            <p>Are you sure you want to delete the following review?</p>
            <p><strong>Title:</strong> <?php echo $review['arvosteltavan_nimi']; ?></p>
            <p><strong>Rating:</strong> <?php echo $review['arvosana']; ?></p>
            <p><strong>Review:</strong> <?php echo $review['sanallinen_arvio']; ?></p>
            <form action="/delete_review.php" method="post">
                <input type="hidden" name="id" value="<?php echo $reviewId; ?>">
                <input type="submit" value="Confirm Delete">
            </form>
            <a href="/home.php">Cancel</a>
        </div>
    </body>
    </html>
    <?php
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // If a POST request is received with a review ID, delete the review
    $reviewId = $_POST['id'];

    // Delete the review from the database
    $deleteStmt = $pdo->prepare("DELETE FROM arvostelu WHERE id = ?");
    $deleteStmt->execute([$reviewId]);

    // Redirect back to home.php
    header("Location: home.php");
    exit();
} else {
    // If no review ID is provided or method is neither GET nor POST, redirect to home.php
    header("Location: home.php");
    exit();
}
?>
