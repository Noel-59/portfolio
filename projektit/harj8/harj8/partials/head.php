<?php require_once __DIR__ . "/../libraries/auth.php"; ?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <title>SICKBABYSICKBABYSICKBABYSICKBABYSICKBABY</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/uutiset.css" type="text/css">
</head>
<body>
    <header>
        <nav>
            <ul class="navbar">
               
                <li class="navbutton"><a href="/">Koti</a></li> <!-- Add a new button named "Koti" and link it to index.php -->
                <?php if(!isLoggedIn()): ?>
                    <li class="navbutton"><a href="/login">Kirjaudu</a></li> 
                    <li class="navbutton"><a href="/register">Rekisteröidy</a></li>
                <?php else: ?>
                    <li class="navbutton"><a href="/new_article">Uusi resepti</a></li>
                    <li class="navbutton"><a href="/logout">Kirjaudu ulos</a></li>
                <?php endif ?>
            </ul>
        </nav>
        <h1>Reseptipankki</h1>
    </header>
</body>
</html>