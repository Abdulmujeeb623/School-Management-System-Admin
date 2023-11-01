<?php
session_start();
session_destroy();
header('Location: C_teach_login.php');
exit();
?>
