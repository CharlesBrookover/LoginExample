<?php
/**
 * User preferences page
 *
 * @author Charles Brookover
 *
 * @property string|null $pageTitle Title of the page
 * @property stdClass $user User information
 */

$pageTitle ??= 'User Preferences';
$user = $_SESSION['userInfo'] ?? new stdClass();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'snippets/htmlHead.php'; ?>
    </head>
    <body>
        <?php include_once('snippets/header.php') ?>
        <main>
            <div class="container">
                <?php if (!empty($errorMessage)): ?>
                    <div class="errorMessage">
                        <i class="fa-solid fa-fw fa-lg fa-triangle-exclamation"></i>
                        <span><?= $errorMessage ?></span>
                    </div>
                <?php endif; ?>
                <form id="frmPreferences" action="process.php" method="post">
                    <div class="inputGroup">
                        <label for="email">Email</label>
                        <input type="email" value="<?= $user->email ?? '' ?>" name="email" id="email" readonly/>
                    </div>
                    <div class="inputGroup">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" value="<?= $user->firstName ?? '' ?>"/>
                    </div>
                    <div class="inputGroup">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" value="<?= $user->lastName ?? '' ?>"/>
                    </div>
                    <div class="inputGroup">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" value="<?= $user->city ?? '' ?>"/>
                    </div>
                    <div class="inputGroup">
                        <label for="age">age</label>
                        <input type="number" id="age" name="age" min="0" max="100" value="<?= $user->age ?? '' ?>"/>
                    </div>
                    <div class="buttonGroup">
                        <input type="submit" id="btnSave" name="savePrefs" value="Save"/>
                    </div>
                </form>
                <div>
                    <form id="frmChangePassword" action="process.php" method="post">
                        <div class="inputGroup">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password"/>
                        </div>
                        <div class="inputGroup">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" id="confirmPassword" placeholder="Confirm Password"/>
                        </div>
                        <div class="buttonGroup">
                            <input type="submit" id="btnChangePassword" name="changePassword" value="Change Password"/>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include_once('snippets/footer.php') ?>
        <script type="application/javascript">
          document.getElementById('frmPreferences').addEventListener('submit', validate)
          document.getElementById('frmChangePassword').addEventListener('submit', passwordValidate)
        </script>
    </body>
</html>
