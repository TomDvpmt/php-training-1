<?php $title = "PHP training"; ?>

<?php ob_start(); ?>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, ea? Maxime voluptatibus, voluptas in voluptatem deserunt corporis quas neque illo culpa nam asperiores, animi sunt assumenda distinctio alias autem consectetur at? Molestias recusandae itaque ipsam odio assumenda magnam eius facilis minus. Deserunt magnam dolor tempore accusamus quo? Obcaecati, odio at.</p>

<?php $content = ob_get_clean(); ?>

<?php require_once $view_dir . "layout.php";
