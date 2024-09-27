<?php require "partials/head.php"; ?>

<h2 class="centered">Rekisteröidy</h2>

<div class="inputarea">
<form action="/register" method="post">
    <table>
        <tr>
            <td><label for="uname">KÄYTTÄJÄNIMI:</label></td>
            <td><input id="uname" type="text" name="username" maxlength=30></td>
        </tr>
        <tr>
            <td><label for="pword">SALASANA:</label></td>
            <td><input id="pword" type="password" name="password" maxlength=30></td>
        </tr>
        <tr>
            <td><label for="type">KÄYTTÄJÄMUOTO:</td>
            <td><select id="type" name="type">
                <option value="2">Vuokranantaja</option>
                <option value="3">Vuokraaja</option>
            </select></td>
        </tr>
        <tr>
            <td></td><td><input id="sendbutton" type="submit" value="REKISTERÖIDY"></td>
        </tr>
    </table>
</form>
</div>

<?php require "partials/footer.php"; ?>