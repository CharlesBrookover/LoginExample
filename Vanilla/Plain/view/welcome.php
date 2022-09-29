<?php
    /**
     * Successful login
     *
     * @author Charles Brookover
     *
     * @property stdClass|null $user User info
     * @property string|null $pageTitle Title of the page
     */

    $pageTitle ??= 'Welcome Page';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="view/css/style.css" rel="stylesheet" />
        <title><?= $pageTitle ?></title>
    </head>
    <body>
        <?php include_once('snippets/header.php') ?>
        <main>
            <h1>Successful Sign In!!</h1>
            <p>
                Welcome, <?= $user->firstName ?? 'Nobody' ?> <?= $user->lastName ?? 'Nobody'?> to the page.
            </p>
        </main>
        <?php include_once('snippets/footer.php') ?>
    </body>
</html>