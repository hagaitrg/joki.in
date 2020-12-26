<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('isLogin', '', time() - 1000);

header("Location:index.php");
exit;
