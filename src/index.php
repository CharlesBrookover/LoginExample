<?php
/**
 * Index page to vanilla PHP login.db page
 *
 * Date: 10/15/2022
 *
 * @author  Charles Brookover
 * @license MIT
 * @version 0.0.1
 */

require_once 'bootstrap.php';

session_start();

/*
 * Check if logged in
 * - No, send to login.db pag
 * - Yes, show main page
 */

if (empty($_SESSION['loggedIn'])):
    require_once "./views/login.php";
else:
    require_once "./views/home.php";
endif;