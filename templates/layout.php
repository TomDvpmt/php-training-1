<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    
    <title><?= $title . " | PHP Training" ?></title>
    
</head>
<body>
    <?php require_once __dir__ . "/header.php"; ?>
    <?php require_once __dir__ . "/nav.php"; ?>
<main>
    <h1><?= $title; ?></h1>
    <?= $content; ?>  
</main>
</body>
</html>