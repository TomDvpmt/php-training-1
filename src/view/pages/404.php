<?php 

$title = "Oh no, a dead end!";
    
ob_start(); ?>

<div class="error404__content">
    <p>The page you requested doesn't exist.</p>
    <a href="/">Find your way home</a>
</div>

<?php $content = ob_get_clean();

require_once $viewDir . "layout.php";