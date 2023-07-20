<?php $title = "Register"; ?>

<?php ob_start(); ?>


<form method="POST" class="form">
    <?php echo isset($register_error) ? "<p class='error'>" . $register_error . "</p>" : null; ?>
    <div class="form__field">
        <label for="email">Email address :</label>
        <input type="email" name="email" value="<?= $email; ?>" />
    </div>
    <div class="form__field">
        <label for="password">Password :</label>
        <input type="password" name="password" value="<?= $password; ?>" />
    </div>
    <div class="form__field">
        <label for="password_confirm">Confirm password :</label>
        <input type="password" name="password_confirm" value="<?= $password_confirm; ?>" />
    </div>
    <button class="button" type="submit" name="submit">Register</button>
</form>

<?php $content = ob_get_clean(); 

require_once $view_dir . "layout.php";