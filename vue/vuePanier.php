<?php if(empty($panier)): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>
    
    <table>
        <thead>
            <tr>
                <th>Article</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Prix total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php $getArticle = array(); ?>
        <?php foreach ($getArticle as $article): ?>
                <tr>
                    <td><?php echo $article['img']; ?></td>
                    <td><?php echo $article['nom']; ?></td>
                    <td><?php echo $article['prix']; ?> €</td>
                    <td><?php echo $article['prix'] * $article['quantite']; ?> €</td>
                    <td>
                        <form method="post" action="index.php?action=retirer&idArticle=<?php echo $article['id']; ?>">
                            <input type="hidden" name="idArticle" value="<?php echo $article['id']; ?>" />
                            <input type="submit" name="retirer" value="Retirer" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>