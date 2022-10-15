<?php
/**
 * New User page
 *
 * @author Charls Brookover
 *
 * @property string|null $errorMessage Any error message from the login.db
 * @property string|null $pageTitle    The title of the page
 */

$pageTitle ??= 'New User Page';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'snippets/htmlHead.php' ?>
    </head>
    <body class="container-fluid">
        <?php include_once('snippets/header.php') ?>
        <main>
            <div class="row mt-3 justify-content-center">
                <div class="col-6">
                    <div id="alertPlaceHolder">
                        <?php if (!empty($errorMessage)): ?>
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-fw fa-lg fa-triangle-exclamation"></i>
                                <div><?= $errorMessage ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col px-3">
                            Complete all the provided fields.
                        </div>
                    </div>
                    <form id="frmNewUser" method="post">
                        <?php require_once 'snippets/inputs.php' ?>
                        <?php require_once 'snippets/passwordInputs.php' ?>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include_once('snippets/footer.php') ?>
    </body>
</html>

