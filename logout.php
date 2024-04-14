<?php 

session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('rahasia', '', time() - 3600);
setcookie('apahayo', '', time() - 3600);

header("Location: login.php");
exit;


?>