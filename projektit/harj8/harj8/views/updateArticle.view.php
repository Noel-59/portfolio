<?php require "partials/head.php"; ?>

<h2 class="centered">Muokkaa reseptiä</h2>

<div class="inputarea">
<form action="/update_article" method="post">
    <input type="hidden" name="id" value="<?=$recipe['id']?>">
    <label for="name">Nimi:</label>
    <input id="name" type="text" name="name" maxlength="255" value="<?=$recipe['name']?>">
    <label for="category">Kategoria:</label>
    <select id="category" name="category">
        <option value="aamiainen" <?=($recipe['category'] == 'aamiainen') ? 'selected' : '' ?>>Aamiainen</option>
        <option value="pääruoka" <?=($recipe['category'] == 'pääruoka') ? 'selected' : '' ?>>Pääruoka</option>
        <option value="välipala" <?=($recipe['category'] == 'välipala') ? 'selected' : '' ?>>Välipala</option>
        <option value="jälkiruoka" <?=($recipe['category'] == 'jälkiruoka') ? 'selected' : '' ?>>Jälkiruoka</option>
        <option value="muu" <?=($recipe['category'] == 'muu') ? 'selected' : '' ?>>Muu</option>
    </select>
    <label for="ingredients">Ainesosat:</label>
    <textarea id="ingredients" name="ingredients" rows="5" cols="50"><?=$recipe['ingredients']?></textarea>
    <label for="instructions">Valmistusohjeet:</label>
    <textarea id="instructions" name="instructions" rows="10" cols="50"><?=$recipe['instructions']?></textarea>
    <input id="sendbutton" type="submit" value="Tallenna">
</form>
</div>

<?php require "partials/footer.php"; ?>
