<?php require "partials/head.php"; ?>

<?php 

global $apartment;

?>

<div class="apartment">
    <div class="apartmentheader">
        <div class="icon"><img src="<?=$apartment["kuva"]?>"></div>
        <ul class="tours">
            <?php
            $list = [
                ["Otsikko"=>"Esittely 1"],
                ["Otsikko"=>"Esittely 2"],
                ["Otsikko"=>"Esittely 3"]
            ]; 
            foreach ($list as $li) {
                ?>
                <li class="tour">
                    <h2><?=$li["Otsikko"]?></h2>
                    <a href="">Liity</a>
                </li>
                <?php
            }
            ?>
        </ul>
        <div class="frame">
            <div class="top">
                <h2><?=$apartment["Osoite"]?></h2>
                <h2><?=$apartment["Koko"]?>m<sup>2</sup></h2>
                <h2><?=$apartment["Hinta"]?>€</h2>
            </div>
            <div class="middle">
                <p><?=$apartment["Muuta"]?></p>
            </div>
        </div>
    </div>
</div>

<?php require "partials/footer.php"; ?>