<?php require "partials/head.php"; ?>

<h2 class="centered">KIRJAUDU</h2>

<div class="inputarea">
<form action="/login" method="post">
    <table>
        <tr>
            <td><label for="uname">KÄYTTÄJÄNIMI:</label></td>
            <td><input id="uname" type="text" name="username" maxlength=30></td>
        </tr>
        <tr>
            <td><label for="pwprd">SALASANA:</label></td>
            <td><input id="pword" type="password" name="password" maxlength=30></td>
        </tr>
        <tr>
            <td></td><td><input id="sendbutton" type="submit" value="KIRJAUDU"></td>
        </tr>
    </table>
</form>
</div>

<?php require "partials/footer.php"; ?>