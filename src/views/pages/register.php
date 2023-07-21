<?php 

$title = "Register";

ob_start(); ?>


<form method="POST" class="form">
    <div class="form__errors"><?= !empty($registerErrors) ? $registerErrors : null; ?></div>
    <div class="form__field">
        <label for="email">Email address :</label>
        <input type="text" name="email" value="<?= $registerInfo["email"]; ?>" />
    </div>
    <div class="form__field">
        <label for="password">Password :</label>
        <input type="password" name="password" value="<?= $registerInfo["password"]; ?>" />
    </div>
    <div class="form__field">
        <label for="passwordConfirm">Confirm password :</label>
        <input type="password" name="passwordConfirm" value="<?= $registerInfo["passwordConfirm"]; ?>" />
    </div>
    <button class="button" type="submit" name="submit">Register</button>
</form>

<?php $content = ob_get_clean(); 

require_once $viewsDir . "layout.php";