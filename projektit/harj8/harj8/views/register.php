<?php require "partials/head.php"; ?>

<h2 class="centered">Rekisteröidy</h2>

<div class="inputarea">
    <form action="/register" method="post">
        <label for="uname">Käyttäjänimi:</label>
        <input id="uname" type="text" name="username" maxlength="255">
        <label for="email">Sähköposti:</label>
        <input id="email" type="email" name="email" maxlength="255">
        <label for="pword">Salasana:</label>
        <input id="pword" type="password" name="password" maxlength="255">
        <label for="birth_year">Syntymävuosi:</label>
        <input id="birth_year" type="number" name="birth_year" min="1900" max="<?= date('Y') ?>">
        <input id="sendbutton" type="submit" value="Rekisteröidy">
    </form>
</div>

<?php require "partials/footer.php"; ?>
