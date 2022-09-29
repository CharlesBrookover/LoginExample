<?php
    /**
     * New User page
     * @author Charls Brookover
     *
     * @property string|null $errorMessage Any error message from the login
     * @property string|null $pageTitle The title of the page
     */

    $pageTitle ??= 'New User Page';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link type="text/css" href="view/css/style.css" rel="stylesheet" />
        <title><?= $pageTitle  ?></title>
    </head>
    <body>
        <?php include_once('snippets/header.php') ?>
        <main>
            <?php
                if (!empty($errorMessage)): ?>
                    <div class="errorMessage"><?= $errorMessage ?></div>
                <?php endif;
            ?>
            <p>Provide your email address and password</p>
            <form action="login.php" id="login" method="post">
                <div class="inputGroup">
                    <label for="email">Email address</label>
                    <input type="email" id="email" placeholder="Email"/>
                </div>
                <div class="inputGroup">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Password"/>
                </div>
                <input type="submit" id="newUser" value="1">Create</input>
            </form>

        </main>
        <?php include_once('snippets/footer.php') ?>
    </body>
</html>

