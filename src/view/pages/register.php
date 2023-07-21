<?php $title = "Register"; ?>

<?php ob_start(); ?>


<form method="POST" class="form">
    <div class="form__errors"><?= isset($registerErrors) ? $registerErrors : null; ?></div>
    <div class="form__field">
        <label for="email">Email address :</label>
        <input type="email" name="email" value="<?= $email; ?>" />
    </div>
    <div class="form__field">
        <label for="password">Password :</label>
        <input type="password" name="password" value="<?= $password; ?>" />
    </div>
    <div class="form__field">
        <label for="passwordConfirm">Confirm password :</label>
        <input type="password" name="passwordConfirm" value="<?= $passwordConfirm; ?>" />
    </div>
    <button class="button" type="submit" name="submit">Register</button>
</form>

<?php $content = ob_get_clean(); 

require_once $viewDir . "layout.php";