<?php $this->titre = "BixMusic - " . $article['nom'];?> <!-- Affichage du titre principal + titre article -->

<section>
    <div class="article-container">
      <div class="article-image">
        <img src="<?= $article['img'] ?>" alt="article">
      </div>
      <div class="article-info">
        <h1><?= $article['nom'] ?></h1>
        <p><?= $article['description'] ?></p>
        <p><?= $article['prix'] ?></p>
      </div>
    </div>
</section>
