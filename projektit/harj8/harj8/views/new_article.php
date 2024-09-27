<?php require "partials/head.php"; ?>

<h2 class="centered">Lisää uusi resepti</h2>

<div class="inputarea">
    <form action="/new_article" method="post">
        <label for="name">Nimi:</label>
        <input id="name" type="text" name="name" maxlength="255">
        <label for="category">Kategoria:</label>
        <select id="category" name="category">
            <option value="breakfast">Aamiainen</option>
            <option value="lunch">Pääruoka</option>
            <option value="dinner">Välipala</option>
            <option value="snack">Jälkiruoka</option>
            <option value="dessert">Muu</option>
            <option value="other">Muu</option>
        </select>
        <label for="ingredients">Ainesosat:</label>
        <textarea id="ingredients" name="ingredients" rows="5" cols="30"></textarea>
        <label for="instructions">Valmistusohjeet:</label>
        <textarea id="instructions" name="instructions" rows="5" cols="30"></textarea>
        <input id="sendbutton" type="submit" value="Lisää">
    </form>
</div>

<?php require "partials/footer.php"; ?>
