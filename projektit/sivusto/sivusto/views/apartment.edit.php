<?php require "partials/head.php"; ?>
<form  action="/edit_apartment" method="post">
    <p>MUOKKAA ASUNTOA</p>
    <label for="title">Osoite:</label>
    <input id="Osoite" type="text" name="Osoite" maxlength=30 value="<?=$address?>">
    <label for="text">Hinta:</label>
    <input type="number" id="Hinta" name="Hinta" value="<?=$price?>">
    <label for="Koko">Koko:</label>
    <input id="Koko" type="text"  name="Koko" <?=$size?>> 
    <label for="Muuta">Muuta:</label>
    <textarea id="Muuta" name="Muuta" rows="5" cols="30"></textarea>
    <label for="kuva">Asunnon kuvan osoite</label>
    <input id="kuva" name="kuva" type="url" value="<?=$pic?>">
    <input id="sendbutton" type="submit" value="Lähetä">
    <input type="hidden" name="asunnotID" value="<?=$id?>">
</form>
<?php require "partials/footer.php"; ?>