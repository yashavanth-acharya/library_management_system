<!DOCTYPE html>
<html>
<?php
session_start();  
include "database.php";
$user=$_SESSION['t1'];
// $id=base64_decode($id1);

// echo $id;
//  echo $_COOKIE;
$sql="SELECT * FROM  u_detail WHERE userid='$user'";
$is=mysqli_query($link,$sql);
$row=mysqli_fetch_row($is);?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo "$row[2] \t"?>GPT||BOOK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <script src="js/my.js"></script>
      <script src="js/jquery-3.3.1.js"></script>
  

</head>
<body>   
<button class="openbtn" onclick="openNav()">☰</button><h1>Books</h1><span class="search"><a href="http://localhost/librarymanagment/user/search.php">&#128269;</a></span>
<div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="http://localhost/librarymanagment/user/home.php" class="menu">Home</a>
        <a href="http://localhost/librarymanagment/user/book_details.php">Books</a>
        <a href="http://localhost/Librarymanagment/user/logout.php" class="menu">Logout</a>
      </div>
      <?php
     if(!$_SESSION['t1'])
     {
         header("location:http://localhost/librarymanagment/user/login.php");
     }
    ?>
    <form action="" method="POST" enctype="multipart/form-data" name="form1">
     
<div class="container">
    <div class="cotent">
    <?php
include "database.php";
$sql="SELECT * FROM book";
$result=mysqli_query($link,$sql);
while($rows=mysqli_fetch_row($result)){
echo "<div id='hid' class='content'>";
$rowsb=base64_encode($rows[1]);
echo "<a href='http://localhost/Librarymanagment/user/display.php?id=$rowsb'>";

echo "<div class='box'><img src='http://localhost/Librarymanagment/admin/bookimage/".$rows[7]."' width='300' height='300'  class='bookimg'/> " ;
 echo "<ul><li><span>ISBN:</span>$rows[0]</li>
 <li><span>Bookname:</span>$rows[1]</li>
 <li><span>Author:</span>$rows[2]</li>
 <li><span>Branch:</span>$rows[3]</li>
 <li><span>Published date:</span>$rows[4]</li> 
 <li><span>Price:</span>$rows[6]</li> 
 <li><span>Availability:</span>$rows[5]</li></ul>
 </a></div></div> <br>";

}
include "database.php";
// $user=$_SESSION['t1'];
$qu="SELECT * FROM `book_issue` WHERE `duedate`<= sysdate() AND msgstates='0'";
$r=mysqli_query($link,$qu);
$row=mysqli_fetch_row($r);
if($row){
   $user_name="$row[3]";
   $uid="$row[2]";
   echo $uid;
$msg="Dear $row[3] please retrun  your book $row[1] (ISBN :$row[0])your due date $row[7] is corresed And $row[8].Rs fine will be added";
$msgs="INSERT INTO `msg`(`sender`,userid,`receiver`, `detail`, `msgstatus`,'type')VALUES('Admin','$uid',' $user_name','$msg','0','due')";
echo mysqli_query($link,$msgs);
$sq1="UPDATE `book_issue` SET msgstates='1' WHERE  userid='$uid'";
mysqli_query($link,$sq1);
mysqli_close($link); }     

// session_destroy();
mysqli_close($link);

        ?>
        
    </div>
    </div>
    <input type="hidden" id="user" name="user">

</form>
</body>
</html>