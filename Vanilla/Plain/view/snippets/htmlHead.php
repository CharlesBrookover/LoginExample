<?php
/**
 * The common HTML head stuff
 *
 * @author Charles Brookover
 *
 * @property string|null $pageTitle The title of the page
 */

$pageTitle ??= 'A Page';
?>
<meta charset="UTF-8">
<script src="https://kit.fontawesome.com/fc5e55e120.js" crossorigin="anonymous"></script>
<link type="text/css" href="view/css/style.css" rel="stylesheet"/>
<title><?= $pageTitle ?></title>
