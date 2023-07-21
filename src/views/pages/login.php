<?php $title = "Login"; ?>

<?php ob_start(); ?>

<form method="POST" class="form">
    <div class="form__errors"><?= isset($loginErrors) ? $loginErrors : null; ?></div>
    <div class="form__field">
        <label for="email">Email address :</label>
        <input type="text" name="email" value="<?= $email; ?>" />
    </div>
    <div class="form__field">
        <label for="password">Password :</label>
        <input type="password" name="password" value="<?= $password; ?>" />
    </div>
    <button class="button" type="submit" name="submit">Log in</button>
</form>

<?php $content = ob_get_clean(); 

require_once $viewsDir . "layout.php";



