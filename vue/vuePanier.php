<?php if(empty($panier)): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>  
    
    <h1 class="panier--title">Voici votre panier</h1>

    <div class="panier--container--btn">
        <div class="panier--heading--btn">
            <a href="index.php" class="panier--retour">Retour à l'accueil</a>
        </div>

        <div class="panier--heading--btn">
            <form method="post" action="index.php?action=viderPanier">
                <input type="submit" name="vider" value="Vider le panier" class="panier--vider" />
            </form>
        </div>
    </div>
    
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Article</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach ($getArticle as $article): ?>
            <tr>
                <td><img src="<?= $article['img'] ?>" alt="article" style="width: 120px; height: 90px;"></td>
                <td><?= $article['nom']; ?></td>
                <td><?= $article['prix']; ?> €</td>
                <td><?= $panier[$article['id']]; ?></td> <!-- Afficher la quantité pour l'article en cours -->
                <td><?= $article['prix'] * $article['quantite']; ?> €</td> <!-- calcule le prix total de chaque article en multipliant le prix par la quantité correspondante. -->
                <td> 
                <div class="panier--btn">
                    <a href="<?= "index.php?action=panier&id=" . $article['id'] ?>">+</a>
                    <a href="<?= "index.php?action=reduireArticle&id=" . $article['id'] ?>">-</a>
                </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>