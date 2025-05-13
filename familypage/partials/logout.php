<?php
session_start();
session_unset();  
session_destroy(); 

setcookie('user_email', '', time() - 3600, "/");
setcookie('user_type', '', time() - 3600, "/");
header("Location: ../../homepage/login.php"); 
exit();
