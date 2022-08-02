<!DOCTYPE html>
<html>
<?php
session_start();
include "database.php";
// $user=$_SESSION['t1'];
$uid=$_GET['id'];
$uid=base64_decode($uid);
$sql="SELECT * FROM  u_detail WHERE userid='$uid'";
$is=mysqli_query($link,$sql);
$row=mysqli_fetch_row($is);?>    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo "$row[2] \t" ?>||INBOX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/inbox.css">
    <script src="js/my.js"></script>
</head>
<body>
<button class="openbtn" onclick="openNav()">☰</button><h1>Inbox</h1>
<div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="http://localhost/librarymanagment/user/home.php" class="menu">Home</a>
        <a href="http://localhost/librarymanagment/user/book_details.php">Books</a>
        <a href="http://localhost/Librarymanagment/user/logout.php" class="menu">Logout</a>
      </div>
<?php
    
    $Date=date('Y-m-d');
    $qu="SELECT * FROM `msg` WHERE userid='$uid' and  msgtype='due'ORDER BY id DESC";
   $r=mysqli_query($link,$qu);
    while($row=mysqli_fetch_row($r))
    {
   
    echo "<div class='tooltip'><span class='tooltiptext'>$row[1]<br> FROM:$row[2]<br>$row[5]</span></div>
    <br><br><br><br><br><br><br><br><br><br><br><br>";
    }
    $qu1="SELECT * FROM `msg` WHERE userid='$uid' AND msgtype='buy' ORDER BY id DESC";
    $r1=mysqli_query($link,$qu1);
     while($row=mysqli_fetch_row($r1))
     {
    
     echo "<div class='tooltip'><p><span class='tooltiptext'>$row[1]<br>FROM:$row[2]<br>$row[5]</span></p></div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br> ";
     }
     $qu2="SELECT * FROM `msg` WHERE userid='$uid' AND msgtype='retured' ORDER BY id DESC";
    $r2=mysqli_query($link,$qu2);
     while($row=mysqli_fetch_row($r2))
     {
    
     echo "<div class='tooltip'><p><span class='tooltiptext'>$row[1]<br>FROM:$row[2]<br>$row[5]</span></p></div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br> ";
     }

    $sq="UPDATE `msg` SET `msgstatus`='1' WHERE  userid='$uid'";
    mysqli_query($link,$sq);
    
?> 


</body>
</html>