<?php ob_start(); ?>

    <div class="section">

        <div class="row">

            <div class="col s12 center">
                <h3><i class="mdi-content-send brown-text"></i></h3>
                <h4><?= htmlspecialchars($post['title']) ?> </h4>
                <p class="left-align light"><?= htmlspecialchars($post['content']) ?></p>
                <h5><?= htmlspecialchars($post['writer']) ?></h5>
                <h6>le <?= htmlspecialchars(date("d/m/Y à H:i",strtotime($post['date'])))?></h6>
            </div>

        </div>

    </div>
    <form action="../web/index.php?action=ajoutComment&amp;id=<?= $_GET['id'] ?>" method="POST">
        <div class="row">
            <div class="input-field col s6">
                <input id="nom" type="text" class="validate">
                <label for="nom">Nom</label>
            </div>
            <div class="input-field col s6">
                <input id="email" type="text" class="validate">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="comment" class="materialize-textarea"></textarea>
                <label for="comment">Votre commentaire</label>
            </div>
        </div>
        <a>
            <button class="btn waves-effect waves-ripple" type="submit" name="action">
                <i class="material-icons right">Envoyer</i>
            </button>
        </a>
    </form>
    <div class="section">

        <div class="row">
            <?php
            while ($comment = $comments->fetch()) {
                ?>
                <div class="col s12 m4">
                    <div class="icon-block">

                        <h5 class="center"><?= htmlspecialchars($comment['nom']) . 'le ' . htmlspecialchars($comment['date_fr']) ?></h5>
                        <p class="left-align light"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
                    </div>
                </div>
                <?php
            }
            $comments->closeCursor();
            ?>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>