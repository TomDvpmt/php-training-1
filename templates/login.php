<?php $title = "Login"; ?>

<?php ob_start(); ?>

<?php echo $login_error ? "<p>" . $login_error . "</p>" : null; ?>
<form action="" method="POST" class="form">
    <div class="form__field">
        <label for="email">E-mail address :</label>
        <input type="email" name="email" />
    </div>
    <div class="form__field">
        <label for="password">Password :</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Log in</button>
</form>

<?php $content = ob_get_clean(); 

require "./templates/layout.php"; ?>



