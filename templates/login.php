<?php $title = "Login"; ?>

<?php ob_start(); ?>

<?php echo isset($login_error) ? "<p>" . $login_error . "</p>" : null; ?>
<form action="" method="POST" class="form">
    <div class="form__field">
        <label for="email">E-mail address :</label>
        <input type="email" name="email" value="<?= $email; ?>" />
    </div>
    <div class="form__field">
        <label for="password">Password :</label>
        <input type="password" name="password" value="<?= $password; ?>" />
    </div>
    <button type="submit">Log in</button>
</form>

<?php $content = ob_get_clean(); 

require $_SERVER["DOCUMENT_ROOT"] . "/templates/layout.php"; ?>



