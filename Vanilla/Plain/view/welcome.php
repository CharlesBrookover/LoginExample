<?php
    /**
     * Successful login
     *
     * @author Charles Brookover
     *
     * @property stdClass|null $user      User info
     * @property string|null   $pageTitle Title of the page
     */

    $pageTitle ??= 'Welcome Page';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'snippets/htmlHead.php'; ?>
    </head>
    <body>
        <?php include_once('snippets/header.php') ?>
        <main>
            <div class="container">
                <h1>Successful Sign In!!</h1>
                <p>
                    Welcome, <?= $user->firstName ?? 'Nobody' ?> <?= $user->lastName ?? 'Nobody' ?> to the page.
                </p>
            </div>
        </main>
        <?php include_once('snippets/footer.php') ?>
    </body>
</html>