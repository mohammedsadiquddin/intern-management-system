<?php
session_start();
// destroying the admin information and navigating him to the login page 
session_unset();
session_destroy();
header("location: admin.php");
?>