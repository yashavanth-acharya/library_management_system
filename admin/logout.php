<?php
session_start();
session_destroy();
header("location:http://localhost/librarymanagment/admin/login.php");
?>