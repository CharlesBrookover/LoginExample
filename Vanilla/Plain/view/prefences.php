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
$user = new stdClass();
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
            <form id="frmPreferences" action="pref.php" method="post">
                <div class="formGroup">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" value="<?= $user->firstName ?? ''?>" />
                </div>
                <div class="formGroup">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" value="<?= $user->lastName ?? '' ?>" />
                </div>
                <div class="formGroup">
                    <label for="city">City</label>
                    <input type="text" id="city" value="<?= $user->city ?? '' ?>" />
                </div>
                <div class="formGroup">
                    <label for="age">age</label>
                    <input type="text" id="age" value="<?= $user->age ?? '' ?>" />
                </div>
                <button type="submit" id="btnSave">Save</button>
            </form>
        </main>
        <?php include_once('snippets/footer.php') ?>
    </body>
</html>
