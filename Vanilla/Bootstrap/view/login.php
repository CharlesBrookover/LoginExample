<?php
/**
 * Login page
 *
 * @author Charls Brookover
 *
 * @property string|null $errorMessage Any error message from the login.db
 * @property string|null $pageTitle    The title of the page
 */

$pageTitle    ??= 'Login Page';
$errorMessage = $_SESSION['errorMessage'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once 'snippets/htmlHead.php'; ?>
    </head>
    <body class="container-fluid">
        <?php include_once('snippets/header.php') ?>
        <main>
            <div class="row justify-content-center mt-3">
                <div class="col-6 ">
                    <div class="shadow p-3 rounded bg-success" style="--bs-bg-opacity: .1">
                        <div id="alertPlaceHolder">
                            <?php if (!empty($errorMessage)): ?>
                                <div class="alert alert-danger">
                                    <i class="fa-solid fa-fw fa-lg fa-triangle-exclamation"></i>
                                    <div><?= $errorMessage ?></div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="my-3">
                            Provide email address and password to sign in.
                        </div>
                        <form method="post" id="frmLogin">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" id="email" name="email" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" />
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <button type="submit" class="btn btn-primary">Log In</button>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col">
                                <a href="new.php" class="link-primary">Register a new user</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include_once('snippets/footer.php') ?>
    </body>
</html>

