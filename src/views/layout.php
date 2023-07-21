<head>
    <meta charset="UTF-8">
    <meta name="viewsport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title><?= $title . " | PHP Training" ?></title>
    
</head>
<body>
    <?php require_once $viewsDir . "/partials/header.php"; ?>
    <?php require_once $viewsDir . "/partials/nav.php"; ?>
<main class="main">
    <h1><?= $title; ?></h1>
    <?= $content; ?>  
</main>