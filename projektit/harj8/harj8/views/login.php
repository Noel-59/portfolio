<?php require "partials/head.php"; ?>

<h2 class="centered">Kirjaudu sisään</h2>

<div class="inputarea">
    <form action="/login" method="post">
        <label for="uname">Käyttäjänimi:</label>
        <input id="uname" type="text" name="username" maxlength="255">
        <label for="pword">Salasana:</label>
        <input id="pword" type="password" name="password" maxlength="255">
        <input id="sendbutton" type="submit" value="Kirjaudu">
    </form>
</div>

<?php require "partials/footer.php"; ?>
