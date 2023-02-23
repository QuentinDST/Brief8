<?php ob_start() ?>


<?php foreach ($articles as $article): ?>
    <div class="card box--container">
        <img class="card-img-article" src="<?= $article['img'] ?>" style="width: 15rem;" alt="Card image cap">
        <div class="card-body">
          <h3 class="card-title"><?= $article['nom'] ?></h3>
            <div class="price"><?= $article['prix'] ?>€</div>
                <div class="card--icons">
                    <a href="<?= "index.php?action=article&id=" . $article['code_article'] ?>" class="btn--card fas fa-eye"></a>
                    <a href="#" class="btn--card fas fa-shopping-cart"></a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php $contenu = ob_get_clean(); ?>

<?php require 'template.php' ?>

