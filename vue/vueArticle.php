<?php $this->titre = "BixMusic - " . $article['nom'];?> <!-- Affichage du titre principal + titre article -->

<section>
    <div class="article--container">
      <div class="article--image">
        <img src="<?= $article['img'] ?>" alt="article">
      </div>
      <div class="article--info">
        <h1 class="article--title"><?= $article['nom'] ?></h1>
        <p class="article--desc"><?= $article['description'] ?></p>
        <p class="article--price"><?= $article['prix']?>€</p>
        <button type="submit"><a href="<?= "index.php?action=panier&id=" . $article['code_article'] ?>">Ajouter au panier</a></button>
      </div>
    </div>
</section>
