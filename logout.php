<?php
session_start();
session_destroy();
setcookie('name', '', time() - 86400);
header("Location: /12thAssignment/index.php");
?>