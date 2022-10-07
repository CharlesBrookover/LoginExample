<?php
/**
 * User preferences page
 *
 * @author Charles Brookover
 *
 * @property string|null $pageTitle Title of the page
 * @property stdClass    $user      User information
 */

$pageTitle ??= 'User Preferences';
$user      = $_SESSION['userInfo'] ?? new stdClass();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'snippets/htmlHead.php'; ?>
    </head>
    <body class="container-fluid">
        <?php include_once('snippets/header.php') ?>
        <main>
            <div class="row mt-3 justify-content-center">
                <div class="col-6">
                    <h2>Change Preferences</h2>
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
                    <form id="frmPreferences" method="post">
                        <?php require_once 'snippets/inputs.php' ?>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    <hr />
                    <h2>Change Password</h2>
                    <div id="alertPasswordHolder">
                        <?php if (!empty($errorMessage)): ?>
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-fw fa-lg fa-triangle-exclamation"></i>
                                <div><?= $errorMessage ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <form id="frmChangePassword" method="post">
                        <?php require_once 'snippets/passwordInputs.php' ?>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include_once('snippets/footer.php') ?>
    </body>
</html>
