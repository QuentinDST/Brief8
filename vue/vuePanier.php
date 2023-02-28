<?php if(empty($panier)): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>    
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
                <td><img src="<?= $article['img'] ?>" alt="article" style="width: 150px; height: 100px;"></td>
                <td><?php echo $article['nom']; ?></td>
                <td><?php echo $article['prix']; ?> €</td>
                <td><?php echo $panier[$article['id']]; ?></td> <!-- Afficher la quantité pour l'article en cours -->
                <td><?php echo $article['prix'] * $article['quantite']; ?> €</td> <!-- calcule le prix total de chaque article en multipliant le prix par la quantité correspondante. -->
                <td>
                <form method="post" action="index.php?action=retirer&idArticle=<?php echo $article['id']; ?>">
                    <input type="hidden" name="idArticle" value="<?php echo $article['id']; ?>" />
                    <input type="submit" name="retirer" value="retirer" />
                </form>
                <?php echo $article['quantite']; ?>
                <form method="post" action="index.php?action=ajouter&idArticle=<?php echo $article['id']; ?>">
                    <input type="hidden" name="idArticle" value="<?php echo $article['id']; ?>" />
                    <input type="submit" name="ajouter" value="ajouter" />
                </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>