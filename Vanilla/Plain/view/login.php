<?php
    /**
     * Login page
     *
     * @author Charls Brookover
     *
     * @property string|null $errorMessage Any error message from the login
     * @property string|null $pageTitle    The title of the page
     */

    $pageTitle ??= 'Login Page';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/fc5e55e120.js" crossorigin="anonymous"></script>
        <link type="text/css" href="view/css/style.css" rel="stylesheet"/>
        <title><?= $pageTitle ?></title>
    </head>
    <body>
        <?php include_once('snippets/header.php') ?>
        <main>
            <div class="container" ?>
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
                <form action="login.php" method="post" onSubmit="return validate();">
                    <div class="inputGroup">
                        <label for="email">Email address</label>
                        <input type="email" id="email" placeholder="Email"/>
                    </div>
                    <div class="inputGroup">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Password"/>
                    </div>
                    <div class="buttonGroup">
                        <input type="submit" id="btnLogin" value="Log In"/>
                    </div>
                </form>
                <div>
                    <a href="new.php">Register a new user</a>
                </div>
            </div>
        </main>
        <?php include_once('snippets/footer.php') ?>

        <script>
            function validate() {

                var form = document.getElementById('login');

                return true;
            }
        </script>
    </body>
</html>

