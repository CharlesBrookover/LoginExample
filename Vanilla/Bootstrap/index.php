<?php
/**
 * A simple login page
 *
 * This page uses basic PHP and Vanilla JS to perform a login and a user preferences page.
 *
 * @author Charles Brookover
 */

session_start();

if (isset($_GET['signout'])) {
    session_unset();
}

if (empty($_SESSION['userInfo'])):
    require_once './view/login.php';
else:
    require_once './view/welcome.php';
endif;


var_dump($_SESSION);
