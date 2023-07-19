<?php $title = "Login"; ?>

<?php ob_start(); ?>


<form action="" method="POST" class="form">
    <?php echo isset($login_error) ? "<p class='error'>" . $login_error . "</p>" : null; ?>
    <div class="form__field">
        <label for="email">E-mail address :</label>
        <input type="email" name="email" value="<?= $email; ?>" />
    </div>
    <div class="form__field">
        <label for="password">Password :</label>
        <input type="password" name="password" value="<?= $password; ?>" />
    </div>
    <button class="button" type="submit" name="submit">Log in</button>
</form>

<?php $content = ob_get_clean(); 

require_once $_SERVER["DOCUMENT_ROOT"] . "/src/view/layout.php"; ?>



