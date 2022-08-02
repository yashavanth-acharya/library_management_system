<!DOCTYPE html>
<html>
<?php
include "database.php";
$id1=$_GET['id'];
$id=base64_decode($id1);
$sql="SELECT * FROM  u_detail WHERE userid='$id'";
$is=mysqli_query($link,$sql);
$row=mysqli_fetch_row($is);?>  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>&#8466;||<?php echo "\t $row[2]" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" type="text/css" media="screen" href="css/dp.css">
    <script src="js/my.js"></script>
</head>
<body>
<?php include "footer.php";?>
<button class="openbtn" onclick="openNav()">☰</button>
<div id="mySidepanel" class="sidepanel">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="http://localhost/librarymanagment/user/home.php" class="menu">Home</a>
        <a href="http://localhost/librarymanagment/user/book_details.php">Books</a>
        <!-- <a href="http://localhost/librarymanagment/user/changepass.php?id=<?php echo $user ?>">Change password</a> -->
        <a href="http://localhost/librarymanagment/user/logout.php" class="menu">Logout</a>
      </div>
    <form method="POST">
    <div class="co">
    <div class='conten'>
<?php

// echo $id;
//  echo $_COOKIE;
$sql="SELECT * FROM  u_detail WHERE userid='$id'";
$is=mysqli_query($link,$sql);
$row=mysqli_fetch_row($is);
if($row>0)
{
    $n=$row[2] ." ". $row[3];
    $r=$row[0];
    $s=$row[4];
    $ta=$row[5];
   $g1=$row[6];
   $g=$row[9];
}
$dpid=base64_encode($id);
    echo "<span class='name'>$n </span><br>";
    echo "<a href='uedit.php?id=$dpid' class='edit'>Edit</a>";
    echo "<img src='dp/".$row[8]."' width='200' height='200'  /><div class='id'><hr> ";
    // echo"";
echo"<span>UserId:$id</span> <br>";
    echo  "Register number:$r <br>";
    echo "Mobile number:$s <br>";
    echo "Gender:$g <br>";
    echo "Branch:$ta<br>";
    echo "Email:$g1";
    echo "</div>";

?>
</div>
</div>
</form>
</body>
</html>

<!-- <link href="dp.css"> -->
