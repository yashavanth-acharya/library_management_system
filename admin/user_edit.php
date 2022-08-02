<?php 
if(isset($_GET['b2']))
     {
    //  $sq="SELECT * FROM `login` user_id= $row[0]";
    $id2=base64_decode($a);
          $sql1="DELETE FROM `login` WHERE user_id='$id2'";
          $result1=mysqli_query($link,$sql1);
         $sql="DELETE FROM `u_detail` WHERE  userid='$id2'";
         $result=mysqli_query($link,$sql);
         if($result>0)
         {
              echo"<script>alert('Deleted')</script>";
        echo "<script>location.href='user_edit.php'</script>";
        // header("location:user_edit.php");

         }
        //  $sq2="DELETE FROM `login` WHERE `user_id`='$row[1]';";
        //  $result2=mysqli_query($link,$sq2);
     }
    //  mysqli_close($link);
     ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN||EDIT USER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/table.css" />
    <script src="js/my.js"></script>
</head>
<body>
<button class="openbtn" onclick="openNav()">☰</button>
<div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="http://localhost/librarymanagment/admin/adminhome.php" class="menu">Home</a>
        <a href="http://localhost/librarymanagment/admin/add_book.php">Add Books</a>
        <a href="http://localhost/librarymanagment/admin/book_edit.php">Edit Books </a>
        <a href="http://localhost/librarymanagment/admin/admin.php">Issue Detail</a>
        <a href="http://localhost/librarymanagment/admin/user_edit.php">Edit User</a>
        <a href="http://localhost/librarymanagment/admin/logout.php" class="menu">Logout</a>
      </div>
<form>
<section>
   <form action="" method="POST" enctype="multipart/form-data">
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0" class="tab1">
      <thead>
    <tr>
    <th>
    Register Number
    </th>
    <th>
    First name
    </th>
    <th>
    Last name
    </th>
    <th>
    Mobile no
    </th>
    <th>
    Branch
   </th>
   <th>
   Email
    </th>
    <th>
Gender
    </th>
    <th>
Action
    </th>
    </tr>
    </thead>
</table>
</div>
   <?php
        include "database.php";
        if(isset($_GET['uid']))
     {
       $a=$_GET['uid'];
    //  $sq="SELECT * FROM `login` user_id= $row[0]";
    $id2=base64_decode($a);
          $sql1="DELETE FROM `login` WHERE user_id='$id2'";
          $result1=mysqli_query($link,$sql1);
         $sql="DELETE FROM `u_detail` WHERE  userid='$id2'";
         $result=mysqli_query($link,$sql);
         if($result>0)
         {
              echo"<script> confirm('Do you really want to delete ?')</script>";
        echo "<script>location.href='user_edit.php'</script>";
        // header("location:user_edit.php");

         }
        //  $sq2="DELETE FROM `login` WHERE `user_id`='$row[1]';";
        //  $result2=mysqli_query($link,$sq2);
     }
        $sql="SELECT * FROM `u_detail`";
        $result=mysqli_query($link,$sql);
        // $row=mysqli_fetch_row($result);
        while($row=mysqli_fetch_row($result))
        {
          echo " <div class='tbl-content'>
<table cellpadding='0' cellspacing='0' border='0' class='tab2'>
  <tbody>";
    echo "<tr>";
    echo "<td> "; 
   echo $row[0];
   echo" </td>";
    echo "<td> ";
   echo  $row[2];
     echo"</td>";
    echo "<td>";
    echo $row[3];
     echo "</td>";
    echo "<td>";
     echo $row[4];
    echo" </td>";
    echo "<td>";
    echo $row[5];
   echo"  </td>";
    echo "<td> ";
  echo  $row[6];
   echo" </td>";
   echo "<td> ";
   echo  $row[9];
    echo" </td>";
    echo "<td>";
    $a=base64_encode($row[1]);
  echo"  <a href='http://localhost/librarymanagment/admin/user.php?id=$a'class='edit'>EDIT</a>
  <a href='user_edit.php?uid=$a'  class='edit' name='b2'>DELETE</a>";
  // <button type='button'>Delete</button></a>";
   echo" </td>";
    echo "</tr>";
    echo "</tbody>";
echo"</table>";
echo "</div>";
        }
        mysqli_close($link);
        ?>
         </table>
         <?php 


    //  mysqli_close($link);
     ?>
    </form>
   
</body>
</html>