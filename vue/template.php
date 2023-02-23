<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BixMusic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="contenu/style/style.css" type="text/css">
</head>
<body>

<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo">
        <img src="contenu/img/logo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="#home">BixMusic</a>
        <a href="#shop">Shop</a>
        <a href="#contact">contact</a>

    </nav>

    <div class="icons">
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <div class="search-form">
        <input type="search" id="search-box" placeholder="Que Cherchez vous ?">
        <label for="search-box" class="fas fa-search"></label>
    </div>

</header>


<main class="main">

    <div class="title">
        <h1 class="heading--title"> Retrouvez tous nos Instruments</h1>
    </div>

    <section class="article">

        <?= $contenu ?>
    
    </section>

</main>       



<footer class="footer">

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
    </div>

    <div class="links">
        <a href="#">home</a>
        <a href="#">shop</a>
        <a href="#">contact</a>
    </div>

    <div class="credit">created by <span>Destrade quentin</span> | all rights reserved</div>

</footer>

</body>

<script src="contenu/js/script.js"></script>

</html>