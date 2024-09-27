<?php require "partials/head.php"; ?>

<h2 class="centered">Kirjaudu sisään</h2>

<div class="inputarea">
    <form action="/login" method="post">
        <label for="username">Käyttäjänimi:</label>
        <input id="username" type="text" name="username" maxlength="30">
        <label for="password">Salasana:</label>
        <input id="password" type="password" name="password" maxlength="30">
        <input id="loginbutton" type="submit" value="Kirjaudu">
    </form>
</div>

<?php require "partials/footer.php"; ?>
<a href="/"><button class="pink-button">Takaisin etusivulle</button></a>
