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
        <?php include_once 'snippets/htmlHead.php' ?>
    </head>
    <body>
        <?php include_once('snippets/header.php') ?>
        <main>
            <div class="container">
                <?php
                if (!empty($errorMessage)): ?>
                    <div class="errorMessage"><?= $errorMessage ?></div>
                <?php endif;
                ?>
                <p>Complete all the fields provided</p>
                <form action="process.php" id="frmCreateUser" method="post">
                    <div class="inputGroup">
                        <label for="email">Email address</label>
                        <input type="email" id="email" placeholder="Email" required/>
                    </div>
                    <div class="inputGroup">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" minlength="6" required/>
                    </div>
                    <div class="inputGroup">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" placeholder="Confirm Password" required/>
                    </div>
                    <div class="inputGroup">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" value="<?= $user->firstName ?? '' ?>" required/>
                    </div>
                    <div class="inputGroup">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" value="<?= $user->lastName ?? '' ?>" required/>
                    </div>
                    <div class="inputGroup">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?= $user->city ?? '' ?>" required/>
                    </div>
                    <div class="inputGroup">
                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" min="0" max="100" value="<?= $user->age ?? '' ?>" required/>
                    </div>
                    <div class="buttonGroup">
                        <input type="submit" id="btnCreateUser" name="createUser" value="Create User"/>
                    </div>
                </form>
            </div>
        </main>
        <?php include_once('snippets/footer.php') ?>
        <script type="application/javascript">
          document.getElementById('frmCreateUser').addEventListener('submit', validate)
        </script>
    </body>
</html>

