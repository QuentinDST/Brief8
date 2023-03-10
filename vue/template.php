<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->titre?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="contenu/style/style.css" type="text/css">
</head>
<body>

<!-- HEADER section starts  -->

<header class="header">
    <a href="index.php" class="logo">
        <img src="contenu/img/logo.png" alt="">
    </a>
    <nav class="navbar">
        <a href="index.php?action=authentifier">Admin</a>
        <a href="index.php?action=panier">Shop</a>
        <a href="#contact">contact</a>
    </nav>
    <div class="icons">
        <a href="index.php?action=authentifier" class="fa-solid fa-user"></a>
        <a href="index.php?action=panier" class="fas fa-shopping-cart" id="cart-btn"></a>
        <a class="fas fa-bars" id="menu-btn"></a>
    </div>
    <div class="search-form">
        <input type="search" id="search-box" placeholder="Que Cherchez vous ?">
        <label for="search-box" class="fas fa-search"></label>
    </div>
</header>


<!-- MAIN section starts  -->


<main class="main">
    
    <?= $contenu ?>
  
</main> 


<!-- FOOTER section starts  -->


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