<?php
// Start the session
session_start();

// Destroy the session data
session_destroy();

// Redirect the user to the login or homepage
header("Location: index.php"); 
?>