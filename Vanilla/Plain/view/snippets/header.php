<?php

    /**
     *  Header for the login page
     *
     * @author Charles Brookover
     *
     * @property string $pageTitle   Title of the page
     * @property string $userName    The name of the user
     */

    $pageTitle ??= "Some Page Title";

?>
<header>
    <div class="pageTitle"><h2><?php echo $pageTitle; ?></h2></div>
    <div class="userStuff">
        <?php if (!empty($_SESSION['userName'])): ?>
            <div class="welcome">Welcome, <?php echo $_SESSION['userInfo'] ?? 'No User' ?></div>
            <div class="userInfo">
                <div id="iconUserMenu">
                    <i class="fa-regular fa-circle-user fa-fw fa-2xl"></i>
                    <div class="userMenu">
                        <ul>
                            <li><a href="pref.php">Preferences</a></li>
                            <li><a href="index.php?signout=1">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</header>