<?php require_once __DIR__ . "/../partials/head.php"; ?>

<body>
    <header>
        <?php require __DIR__ . "/../partials/head.php"; ?>
    </header>

    <h2 class="centered">Reseptit</h2>
    

    <div class="recipe-list">
    <?php 
    // Check if $allRecipes is set before looping through it
    if(isset($allRecipes) && count($allRecipes) > 0) {
        foreach($allRecipes as $recipe): ?>
            <div class="recipe-item">
                <h3><?= $recipe["name"] ?></h3>
                <p>Kategoria: <?= $recipe["category"]?></p>  
            </div>
        <?php endforeach;
    } else {
        echo "<p>No recipes found.</p>";
    }
    ?>
</div>

    <div class="more-button">
        <a href="/more">More</a>
    </div>

    <?php if(isLoggedIn()): ?>
        <div class="add-recipe-button">
            <a href="/new_article">Lisää uusi resepti</a>
        </div>
    <?php else: ?>
        <div class="add-recipe-button">
            <a href="/login">Kirjaudu lisätäksesi reseptin</a>
        </div>
    <?php endif; ?>

    <!-- HTML form for adding a new recipe -->
    <div class="add-recipe-form">
        <h3>Lisää uusi resepti</h3>
        <form action="/add_article" method="post">
            <label for="name">Nimi:</label>
            <input type="text" id="name" name="name" required>
            <label for="category">Kategoria:</label>
            <select id="category" name="category">
                <option value="aamiainen">Aamiainen</option>
                <option value="pääruoka">Pääruoka</option>
                <option value="välipala">Välipala</option>
                <option value="jälkiruoka">Jälkiruoka</option>
                <option value="muu">Muu</option>
            </select>
            <label for="ingredients">Ainesosat:</label>
            <textarea id="ingredients" name="ingredients" required></textarea>
            <label for="instructions">Valmistusohjeet:</label>
            <textarea id="instructions" name="instructions" required></textarea>
            <button type="submit">Lisää resepti</button>
        </form>
    </div>

    <!-- HTML forms for updating and deleting recipes can be similarly added here -->

    <?php require __DIR__ . "/../partials/footer.php"; ?>
</body>
</html>