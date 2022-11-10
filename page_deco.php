<link rel="stylesheet" href="style/style.css">
<?php

require __DIR__."/pdo.php";
include __DIR__.'/classes/sessionOk.php';

session_destroy();
unset($_SESSION);

header('Location: index.php');