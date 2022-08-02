<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN||INBOX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/inbox.css">
    <script src="js/my.js"></script>
</head>
<body>
<button class="openbtn" onclick="openNav()">☰</button><h1><h1>Inbox</h1>
<div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="http://localhost/librarymanagment/admin/adminhome.php" class="menu">Home</a>
        <a href="http://localhost/librarymanagment/admin/add_book.php">Add Books</a>
        <a href="http://localhost/librarymanagment/admin/book_edit.php">Edit Books </a>
        <a href="http://localhost/librarymanagment/admin/admin.php">Issue Detail</a>
        <a href="http://localhost/librarymanagment/admin/user_edit.php">Edit User</a>
        <a href="http://localhost/librarymanagment/admin/logout.php" class="menu">Logout</a>
      </div>
<?php

    session_start();
    include "database.php";
    // $user=$_SESSION['t1'];
    $uid=base64_decode($_GET['id']);

    $qu="SELECT * FROM `admin_msg` WHERE `msgtype`='buy'ORDER BY id DESC";
   $r=mysqli_query($link,$qu);
    while($row=mysqli_fetch_row($r))
    {
   
    echo "<div class='tooltip'><span class='tooltiptext'>Date:$row[2]<br>$row[3]</span></div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
    }
    $qu1="SELECT * FROM `admin_msg` WHERE `msgtype`='retur' ORDER BY id DESC";
    $r1=mysqli_query($link,$qu1);
     while($row1=mysqli_fetch_row($r1))
     {
    
     echo "<div class='tooltip'><span class='tooltiptext'>Date:$row1[2]<br>$row1[3]</span></div>
     <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
     }
     $qu2="SELECT * FROM `admin_msg` WHERE `msgtype`='due'ORDER BY id DESC";
     $r2=mysqli_query($link,$qu2);
      while($row2=mysqli_fetch_row($r2))
      {
     
      echo "<div class='tooltip'><span class='tooltiptext'>Date:$row2[2]<br>$row2[3]</span></div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
      }
    $sq="UPDATE `admin_msg` SET `msgstats`='1'WHERE `user`='admin'";
    mysqli_query($link,$sq);
    
?> 


</body>
</html>