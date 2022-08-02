<!DOCTYPE html>
<html>
<?php
session_start();
include "database.php";
$id=$_GET['id'];
$user=$_SESSION['t1'];
$id=base64_decode($id);
$sql="SELECT * FROM  u_detail WHERE userid='$user'";
$is=mysqli_query($link,$sql);
$row=mysqli_fetch_row($is);?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GPT||<?php echo "$row[2]"?>|| BOOK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="js/my.js"></script>
</head>
<body>
<button class="openbtn" onclick="openNav()">☰</button>
<div id="mySidepanel" class="sidepanel">
<!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a> -->
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="http://localhost/librarymanagment/user/home.php" class="menu">Home</a>
        <a href="http://localhost/librarymanagment/user/book_details.php">Books</a>
        <a href="http://localhost/librarymanagment/user/logout.php" class="menu">Logout</a>
      </div>
    <form action="" method="POST" enctype="multipart/form-data">
<?php


$sql="SELECT * FROM `book` WHERE isbn='$id'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_row($result);
if($row>0)
{
    echo "<div class='content'>";
    echo "<a>";
    echo "<div class='box1'><img src='http://localhost/Librarymanagment/admin/bookimage/".$row[8]."' width='300' height='300' class='bookimg' /> " ;
     echo "<ul><li><span>ISBN:</span>$row[1]</li>
     <li><span>Bookname:</span>$row[2]</li>
     <li><span>Author:</span>$row[3]</li>
     <li><span>Branch:</span>$row[4]</li>
     <li><span>Published date:</span>$row[6]</li> 
     <li><span>Price:</span>$row[7]</li> 
     <li><span>Availability:</span>$row[5]</li></ul>
     </a></div></div> <br>";
    $bookid=$row[1];
    $bookname=$row[2];
   
}

?> </form>
  <form action="" method="POST" enctype="multipart/form-data">
<?php
  
    include "database.php";  
   
if(isset($_POST['b1']))
 {
   
        //  session_start();
    $user=$_SESSION['t1'];
    $sql="SELECT * FROM  u_detail WHERE userid='$user'";
     $id=mysqli_query($link,$sql);
     $s=mysqli_fetch_row($id);
   if($s>0){
$user_id=$s[1];
$user_name=$s[2];
$mobile=$s[4];
$Email=$s[6];
   }
$Date=date('Y-m-d');
$duedate=date('Y-m-d', strtotime($Date. '15 days'));
 $sql="INSERT INTO book_issue(Bookid,book_name,userid,user_name,user_number,user_email,duedate,returned,`msgstates`) VALUES ($bookid,'$bookname','$user_id','$user_name','$mobile','$Email','$duedate','NO','0')";
$r=mysqli_query($link,$sql);
if($r>0)
{
    echo "<script>alert('BOOK IS REQUESTED')</script>";
    $sql="SELECT * FROM `book`";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_row($result);
$detail="Hi $user_name..!Thank you for requseting a book:$bookname(ISBN:$bookid) book price is $row[7] and your return date is $duedate ";
$sqlm="INSERT INTO `msg`(`sender`, `userid`, `receiver`, `detail`, `msgstatus`, `msgtype`) VALUES ('admin','$user_id','$user_name','$detail','0','buy')";
$result=mysqli_query($link,$sqlm);
$admsg="$user_name.....is requseted a book:$bookname(ISBN:$bookid) price of that book is $row[7] return date is $duedate";
$sqw="INSERT INTO `admin_msg`(user,`detail`, `msgstats`, `msgtype`) VALUES ('admin','$admsg','0','buy')";
mysqli_query($link,$sqw);
    echo "<script>location.href='http://localhost/librarymanagment/user/book_details.php'</script>";
   }
 }
?>
<input type="submit" id="b1" name="b1"  class="Buy" value="REQUEST">
</form>
</body>
</html>