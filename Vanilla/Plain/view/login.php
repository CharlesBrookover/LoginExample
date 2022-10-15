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
    <body>
        <?php include_once('snippets/header.php') ?>
        <main>
            <div class="container">
                <?php
                if (!empty($errorMessage)): ?>
                    <div class="errorMessage">
                        <i class="fa-solid fa-fw fa-lg fa-triangle-exclamation"></i>
                        <span><?= $errorMessage ?></span>
                    </div>
                <?php endif;
                ?>
                <div>
                    Provide your email address and password
                </div>
                <form action="process.php" method="post">
                    <div class="inputGroup">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" placeholder="Email" />
                    </div>
                    <div class="inputGroup">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" />
                    </div>
                    <div class="buttonGroup">
                        <input type="submit" id="btnLogin" name="login" value="Log In" />
                    </div>
                </form>
                <div>
                    <a href="new.php">Register a new user</a>
                </div>
            </div>
        </main>
        <?php include_once('snippets/footer.php') ?>
    </body>
</html>

