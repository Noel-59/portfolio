<?php require "partials/head.php"; ?>

<h2 class="centered">Lisää asunto</h2>

<div class="inputarea">
<form  action="/add_apartment" method="post">
    <label for="title">Osoite:</label>
    <input id="Osoite" type="text" name="Osoite" maxlength=30 value="">
    <label for="text">Hinta:</label>
    <input type="number" id="Hinta" name="Hinta">
    <label for="Koko">Koko:</label>
    <input id="Koko" type="text"  name="Koko"> 
    <label for="Muuta">Muuta:</label>
    <textarea id="Muuta" name="Muuta" rows="5" cols="30"></textarea>
    <label for="kuva">Asunnon kuvan osoite</label>
    <input id="kuva" name="kuva" type="url">
    <input id="sendbutton" type="submit" value="Lähetä">
</form>
</div>

<?php require "partials/footer.php"; ?>