<?php
/**
 * User Preferences page
 *
 * This page uses plain PHP and Vanilla JS/CSS to provide a series of forms to set preferences for the logged in user
 *
 * @author Charles Brookover
 */

session_start();

if (empty($_SESSION['userInfo'])):
    header('location: index.php');
    exit();
else:
    $userInfo = $_SESSION['userInfo'];

    include_once 'view/preferences.php';
endif;


