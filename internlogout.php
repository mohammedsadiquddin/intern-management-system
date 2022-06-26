<?php
session_start();
// destroying the intern information when the intern clicked the logout button 
session_unset();
session_unset();
// navigating him to the login page 
header("location: intern.php")
?>