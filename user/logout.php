<?php
session_start();
session_destroy();
header("location:http://localhost/librarymanagment/user/login.php");
?>