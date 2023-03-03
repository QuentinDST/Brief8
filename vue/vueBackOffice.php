<div class="admin--deconnexion">
    <button><a href="index.php?action=deconnexion">deconnexion</a></button>
</div>

<h1>Bienvenue sur votre espace de gestion</h1>

<table class="table--backoffice">
    <thead>
        <tr>
            <th>Code article</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $article['code_article'] ?></td>
                <td><?= $article['nom'] ?></td>
                <td><?= $article['prix'] ?> €</td>
                <td><?= $article['stock'] ?></td>
                <td>
                    <a href="#">Ajouter</a>
                    <a href="#">Modifier</a>
                    <a href="#">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>