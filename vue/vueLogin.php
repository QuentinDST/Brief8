

<div class="form--container">
    <div class="form--erreur">
        <?php if(!empty($erreur)): ?>
            <p class="error-message"><?= $erreur ?></p>
        <?php endif; ?>
    </div>        
    
    <div class="form--image">
        <img src="contenu/img/user.png" alt="">
    </div>
    <div class="form">
        <form method="post" action="">
            <div class="form--user">
                <label class="form--label" for="login">LOGIN :<label>
                <input type="text" name="login" id="login" required>
            </div>
            <div class="form--pwd">
                <label class="form--label" for="mdp">PASSWORD :</label>
                <input type="" name="mdp" id="mdp" required>
            </div>
        <input class="form--send" type="submit" value="Se connecter">

    </form>
    </div>
    
</div>
    