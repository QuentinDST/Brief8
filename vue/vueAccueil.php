<?php $this->titre = 'BixMusic'; ?> <!-- Affichage du titre principal -->

<section class="article">

    <div>
        <h1 class="heading">Nos Instruments</h1>
    </div>

    <aside class="home">

        <div class="content">
            <h3>Place à la musique</h3>
            <p>Le magasin online du plus grand revendeur d'instruments de musique d'Europe.</p>
            <a href="#card" class="btn">-> Découvrez dès maintenant nos Instruments</a>
        </div>

    </aside>

    <div class="">
    <?php foreach ($articles as $article): ?>
        <div class="card box--container" id="card">
            <img class="card-img-article" src="<?= $article['img'] ?>" style="width: 15rem;" alt="Card image cap">
            <div class="card-body">
              <h3 class="card-title"><?= $article['nom'] ?></h3>
                <div class="price"><?= $article['prix'] ?>€</div>
                    <div class="card--icons">
                        <a href="<?= "index.php?action=article&id=" . $article['code_article'] ?>" class="btn--card fas fa-eye"></a>
                        <a href="<?= "index.php?action=panier&id=" . $article['code_article'] ?>" class="btn--card fas fa-shopping-cart"></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    </div>
</section>


