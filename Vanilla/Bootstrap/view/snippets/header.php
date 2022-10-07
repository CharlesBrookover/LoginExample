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
$userInfo  = $_SESSION['userInfo'] ?? new stdClass();
?>
<header>
    <nav class="navbar navbar-dark bg-success" style="--bs-bg-opacity: .5">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><?php echo $pageTitle; ?></a>
            <?php if (!empty($_SESSION['logTime'])): ?>
                <div class="d-flex justify-content-end">
                    <div class="navbar-text">Welcome, <?php echo $userInfo->firstName ?? 'No User' ?></div>
                    <div class="dropdown">
                        <button type="button" class="btn btn-text dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa-regular fa-circle-user fa-fw fa-2xl"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="pref.php">Preferences</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="index.php?signout=1">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</header>