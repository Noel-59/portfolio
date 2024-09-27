<?php require "partials/head.php"; ?>

<h2 class="centered">Asunnot</h2>


<div class = "news">
    <img src="" alt="">
<?php
    foreach($allnews as $newsitem): ?>
        <div class='newsitem'>
            <div class='neweritem'>
        <img class="homeimg" src="<?=$newsitem["kuva"]?>" alt="">
        <h3><?=$newsitem["Osoite"] ?></h3>
        <p><?=$newsitem["Hinta"] ?>€/kk</p>
        <h3>Tiedot:</h3>
        <p><?=$newsitem["Muuta"]?></p>
        <p><?=$newsitem["Koko"]?>m²</p>
        <p><?=$newsitem["julkaisuPvm"]?> by user: <?=$newsitem["vuokraajaID"]?></p>
        <a href="/asunnot/<?=$newsitem["asunnotID"]?>">Tietoja</a>
        <?php
        if(isLoggedIn() && ($newsitem["vuokraajaID"] == isLoggedIn())):
            $id = $newsitem['asunnotID'];
            $newsid = 'deleteApartment' . $id; ?>
            <a id=<?=$newsid ?> onClick='confirmDelete(<?=$id?>)' href='/delete_apartment?id=<?=$id?>'>Poista</a> | 
            <a href='/update_apartment?id=<?=$id?>'>Päivitä</a>
        <?php endif; ?>
            </div>
        </div>
    <?php endforeach ?>
</div>
<img src="" alt="">

<?php require "partials/footer.php"; ?>