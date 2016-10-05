<?php session_start(); ?>
    <h3>CONTACTEZ-MOI</h3>

      <div class="container">
        <div>
            <?php if(array_key_exists('errors', $_SESSION)): ?>
                <div>
                  <?= implode('<br>', $_SESSION['errors']); ?>
                </div>
            <?php endif; ?>
            <?php if(array_key_exists('success', $_SESSION)): ?>
                <div>
                    Votre email a bien été envoyé
                </div>
            <?php endif; ?>

            <form action="post_contact.php" method="POST" target="_parent">

                <div>
                    <div>
                        <label for="inputname">NOM</label>
                        <input required type="text" name="name" class="form-control" id="inputname" value="<?= isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
                    </div>
                </div>


                <div>
                    <div>
                        <label for="inputprenom">PRENOM</label>
                        <input type="text" name="prenom" class="form-control" id="inputprenom" value="<?= isset($_SESSION['inputs']['prenom']) ? $_SESSION['inputs']['prenom'] : ''; ?>">
                    </div>
                </div>


                <div>
                    <div>
                        <label for="inputemail">EMAIL</label>
                        <input required type="email" name="email" class="form-control" id="inputemail" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>">
                    </div>
                </div>

                <div>
                    <div>
                        <label for="inputobjet">OBJET</label>
                        <input required type="objet" name="objet" class="form-control" id="inputobjet" value="<?= isset($_SESSION['inputs']['objet']) ? $_SESSION['inputs']['objet'] : ''; ?>">
                    </div>
                </div>

                <div>
                    <div>
                        <label for="inputemessage">MESSAGE</label>
                        <textarea required id="inputemessage" name="message" class="form-control" rows="12"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>
                    </div>
                    <button type="submit">Envoyer</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);
?>
