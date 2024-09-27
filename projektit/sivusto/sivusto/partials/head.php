<!DOCTYPE html>
<html lang="fi">
<head>
    <title>VuokraKämpät</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/uutiset.css" type="text/css">
    <link rel="stylesheet" href="/css/head.css" type="text/css">
    <link rel="stylesheet" href="/css/apartmentview.css" type="text/css">
    <link rel="icon" href="/favicon.ico">
</head>
<body>
<script>
    function confirmDelete(id) {
        const answer = confirm("Haluatko varmasti poistaa asunnon tietokannasta?");
        if(!answer){
            document.getElementById('deleteNews' + id).href = '/';
        }
        return answer;
    }
</script>
    <header>
    <div class="header">
        <img src="\css\logo.png" alt="">
        <nav>
            <ul class="navbar">
                <li class="navbutton"><a href="/">ETUSIVU</a></li>
                <?php if(!isLoggedIn()): ?>
                
                   <li class="navbutton"><a href="/login">KIRJAUDU SISÄÄN</a></li> 
                   <li class="navbutton"><a href="/register">REKISTERÖIDY</a></li>
                <?php else: ?>
                   <li class="navbutton"><a href="/add_apartment">LISÄÄ ASUNTO</a></li>
                   <li class="navbutton"><a href="/logout">KIRJAUDU ULOS</a></li>
                <?php endif ?>
                
            </ul>
        </nav>
   </div>
 </header>
