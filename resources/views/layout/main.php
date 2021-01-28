<?php
use DebugBar\StandardDebugBar;

$debugbar = new StandardDebugBar();
$debugbarRenderer = $debugbar->getJavascriptRenderer();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Ecommerce site build with PHP7">
        <title>Storelle</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <!-- Custom Styles -->
        <link rel="stylesheet" href="/css/styles.min.css">
        <!-- Google Fonts -->
        <link rel="preload" href="https://fonts.googleapis.com/css2?family=Abel&family=Noto+Sans+SC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <?= $debugbarRenderer->renderHead() ?>
    </head>
    <body>
        <header>
            <?php
            require_once 'topbar.php';
            ?>
            <?php
            require_once 'navbar.php';
            ?>
        </header>
        <main class="container-fluid">
            {{ display }}
        </main>
        <?php
        require_once 'footer.php';
        ?>
        <?php echo $debugbarRenderer->render() ?>
    </body>
</html>