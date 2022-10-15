<?php
/**
 * Successful login.db
 *
 * @author Charles Brookover
 *
 * @property stdClass|null $user      User info
 * @property string|null   $pageTitle Title of the page
 */

$pageTitle ??= 'Welcome Page';
$userInfo  = $_SESSION['userInfo'] ?? new stdClass();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'snippets/htmlHead.php'; ?>
    </head>
    <body class="container-fluid">
        <?php include_once('snippets/header.php') ?>
        <main>
            <div class="row mt-3 justify-content-center">
                <div class="col-10 p-3">
                    <h1>Successful Sign In!!</h1>
                    <div>
                        Welcome, <?= $userInfo->firstName ?? 'Nobody' ?> <?= $userInfo->lastName ?? 'Nobody' ?>
                    </div>
                </div>
            </div>
        </main>
        <?php include_once('snippets/footer.php') ?>
    </body>
</html>