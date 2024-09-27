<?php require "partials/head.php"; ?>

<h2 class="centered">Lisää</h2>

<div class="recipe-list">
    <?php foreach($allRecipes as $recipe): ?>
        <div class="recipe-item">
            <h3><?=$recipe["name"] ?></h3>
            <p>Kategoria: <?=$recipe["category"]?></p>
            <p>Ainesosat: <?=$recipe["ingredients"]?></p>
            <p>Ohjeet: <?=$recipe["instructions"]?></p>
            <?php if(isLoggedIn()): ?>
                <a href="/update_article?id=<?=$recipe['id']?>">Muokkaa</a> | 
                <a href="/delete_article?id=<?=$recipe['id']?>">Poista</a> |
                <a href="/generate_pdf" class="btn btn-primary">Lataa PDF</a>

            <?php endif; ?>
        </div>
    <?php endforeach ?>
</div>



<?php require "partials/footer.php"; ?>
