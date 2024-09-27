<?php 
require_once "../partials/head.php"; 
require_once "../public/css/tyyli.php"; 
require_once "../database/connection.php";

$pdo = connectDB();

// Function to handle form submission to add a review
function addReview($pdo) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $rating = $_POST['rating'];
        $reviewText = $_POST['review'];

        // Insert the review into the database
        $stmt = $pdo->prepare("INSERT INTO arvostelu (päiväys, arvosteltavan_nimi, arvosana, sanallinen_arvio) VALUES (?, ?, ?, ?)");
        $stmt->execute([$date, $title, $rating, $reviewText]);

        // Redirect back to home.php
        header("Location: home.php");
        exit();
    }
}

addReview($pdo); // Call the function to handle form submission

// Fetch all reviews from the database
$stmt = $pdo->query("SELECT * FROM arvostelu");
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h2>Welcome to the Reviews Page</h2>
    <p>Here you can see all reviews.</p>
    <!-- Display all reviews here -->
    <div class="review-list">
        <?php foreach ($reviews as $review): ?>
        <div class="review">
            <h3><?php echo $review['arvosteltavan_nimi']; ?></h3>
            <p>Arvosana: <?php echo $review['arvosana']; ?></p>
            <p>Arvostelu: <?php echo $review['sanallinen_arvio']; ?></p>
            <p>Date: <?php echo $review['päiväys']; ?></p>
            <!-- Add links for editing and deleting reviews -->
            <a href="edit_review.php?id=<?php echo $review['id']; ?>">Edit</a>
            <a href="delete_review.php?id=<?php echo $review['id']; ?>">Delete</a>

        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container">
    <h2>Add a Review</h2>
    <form action="home.php" method="post"> <!-- Update form action -->
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date"><br>
        <label for="rating">Rating:</label><br>
        <input type="number" id="rating" name="rating" min="0" max="10"><br> <!-- Fix the rating input -->
        <label for="review">Review:</label><br>
        <textarea id="review" name="review" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</div>

<a href="/public/logout"><button class="pink-button">Log Out</button></a>

<?php require_once "../partials/footer.php"; ?>
