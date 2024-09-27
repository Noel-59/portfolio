<?php require "partials/head.php"; ?>

<h2 class="centered">Lisää uusi resepti</h2>

<div class="inputarea">
<form action="/new_article" method="post">
    <label for="name">Nimi:</label>
    <input id="name" type="text" name="name" maxlength="255">
    <label for="category">Kategoria:</label>
    <select id="category" name="category">
        <option value="aamiainen">Aamiainen</option>
        <option value="pääruoka">Pääruoka</option>
        <option value="välipala">Välipala</option>
        <option value="jälkiruoka">Jälkiruoka</option>
        <option value="muu">Muu</option>
    </select>
    <label for="ingredients">Ainesosat:</label>
    <textarea id="ingredients" name="ingredients" rows="5" cols="50"></textarea>
    <label for="instructions">Valmistusohjeet:</label>
    <textarea id="instructions" name="instructions" rows="10" cols="50"></textarea>
    <input id="sendbutton" type="submit" value="Lisää">
</form>
</div>

<?php require "partials/footer.php"; ?>
