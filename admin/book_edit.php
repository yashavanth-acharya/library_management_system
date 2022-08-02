<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN||BOOK EDIT</title>
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
      <section>
   <form action="" method="POST" enctype="multipart/form-data">
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0" class="tab1">
      <thead>
    <tr>
    <th>
    ISBN
    </th>
    <th>
    BOOKNAME
    </th>
    <th>
    BOOK AUTHOR
    </th>
    <th>
   BRANCH
    </th>
    <th>
    AVAILABILITY
   </th>
   <th>
   PUBLISHED DATE
    </th>
    <th>
  PRICE
    </th>
    <th>
  PHOTO
  </th>
  <th>
  ACTION
  </th>
    </tr>
    </thead>
</table>
</div>
        <?php
        session_start();

        if(!$_SESSION['t1'])
        {
            header("location:http://localhost/Librarymanagment/admin/login.php");
        }
        include "database.php";
        $_SESSION['t1'];
        if(isset($_GET['uid']))
        {
          $ua=$_GET['uid'];
          $ua=base64_decode($ua);
             $sql1="DELETE FROM `book` WHERE `isbn`='$ua';";
             $result1=mysqli_query($link,$sql1);
            if($result1>0)
            {
                 echo"<script>confirm('Do you really want to delete ?')</script>";
          //  echo "<script>location.href='http://localhost/librarymanagment/admin/book_edit.php'</script>";
   
            }}

        $sql="SELECT * FROM  book";
        $result=mysqli_query($link,$sql);
        while($row=mysqli_fetch_row($result))
        {
          echo " <div class='tbl-content'>
          <table cellpadding='0' cellspacing='0' border='0' class='tab2'>
            <tbody>";
    echo "<tr>";
    echo "<td> "; 
   echo $row[1];
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
  echo  $row[7];
   echo" </td>";
   echo "<td> ";
  echo  $row[8];
   echo" </td>";
    echo "<td>";
    $bo=base64_encode($row[1]);
  echo"  <a href='http://localhost/librarymanagment/admin/booke.php?id=$bo' class='edit'>EDIT</a>
  <a href='book_edit.php?uid=$bo'  class='edit' name='b2'>DELETE</a>";
   echo" </td>";
    echo "</tr>";
    echo "</tbody>";
echo"</table>";
echo "</div>";
        }
        mysqli_close($link);
        ?>
         </table>
        
    </form>
        


    </form>
</body>
</html>