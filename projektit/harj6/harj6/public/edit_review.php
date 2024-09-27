<?php
require_once "../database/connection.php";
require_once "../public/css/tyyli.php"; 

$pdo = connectDB();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $reviewId = $_GET['id'];
    
    // Fetch the review from the database
    $stmt = $pdo->prepare("SELECT * FROM arvostelu WHERE id = ?");
    $stmt->execute([$reviewId]);
    $review = $stmt->fetch(PDO::FETCH_ASSOC);

    // Display a form to edit the review
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Review</title>
        <link rel="stylesheet" href="/public/css/tyyli.php"> <!-- Include CSS -->
    </head>
    <body>
        <div class="container">
            <h2>Edit Review</h2>
            <form action="edit_review.php?id=<?php echo $reviewId; ?>" method="post"> <!-- Update form action -->
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" value="<?php echo $review['arvosteltavan_nimi']; ?>"><br>
                <label for="date">Date:</label><br>
                <input type="date" id="date" name="date" value="<?php echo $review['päiväys']; ?>"><br>
                <label for="rating">Rating:</label><br>
                <input type="number" id="rating" name="rating" min="0" max="10" value="<?php echo $review['arvosana']; ?>"><br>
                <label for="review">Review:</label><br>
                <textarea id="review" name="review" rows="4" cols="50"><?php echo $review['sanallinen_arvio']; ?></textarea><br>
                <input type="submit" value="Update">
            </form>
        </div>
    </body>
    </html>
    <?php
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    // Handle review update
    $reviewId = $_GET['id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $rating = $_POST['rating'];
    $reviewText = $_POST['review'];

    // Update the review in the database
    $updateStmt = $pdo->prepare("UPDATE arvostelu SET arvosteltavan_nimi = ?, päiväys = ?, arvosana = ?, sanallinen_arvio = ? WHERE id = ?");
    $updateStmt->execute([$title, $date, $rating, $reviewText, $reviewId]);

    // Redirect back to home.php
    header("Location: home.php");
    exit();
} else {
    // Handle invalid request
    echo "Invalid request!";
}
?>
