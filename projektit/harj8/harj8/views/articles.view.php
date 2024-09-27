<?php require "partials/head.php"; ?>

<h2 class="centered">Reseptit</h2>

<form method="get" action="/">
    <label for="category">Filtteröi</label>
    <select id="category" name="category" onchange="this.form.submit()">
        <option value="">All</option>
        <option value="aamiainen">Aamiainen</option>
        <option value="pääruoka">Pääruoka</option>
        <option value="välipala">Välipala</option>
        <option value="jälkiruoka">Jälkiruoka</option>
        <option value="muu">Muu</option>
    </select>
</form>

<div class="recipe-list">
    <?php foreach($allRecipes as $recipe): ?>
        <div class="recipe-item">
            <h3><?=$recipe["name"] ?></h3>
            <p>Kategoria: <?=$recipe["category"]?></p>
            <p>Ainesosat: <?=$recipe["ingredients"]?></p>
            <p>Ohjeet: <?=$recipe["instructions"]?></p>
            <?php if(isLoggedIn()): ?>
                <a href="/more?id<?= $recipe['id']?>">LISÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄ</a> 
            <?php endif; ?>
        </div>
    <?php endforeach ?>
</div>

<?php require "partials/footer.php"; ?>
