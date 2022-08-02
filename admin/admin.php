<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN||ISSUED BOOKS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/table.css">
    <script src="js/my.js"></script>
</head>
<body>
<button class="openbtn" onclick="openNav()">☰</button>
    <h1>Book Issue</h1>
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
<div class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0" class="tab1">
      <thead>
    <tr>
    <th>
   BOOKID
    </th>
    <th>
    BOOKNAME
    </th>
   <th>
    USERID
    </th>
    <th>
   USERNAME
    </th>
    <th>
   USERNUMBER
    </th>
    <th>
    EMAIL
   </th>
   <th>
   ISSUEDATE
    </th>
    <th>
    DUEDATE
    </th>
   <th>
    FINE
    </th>
    <th>
    RETRUNDATE
   </th>
   <th colspan="2">
    RETRUNDATED
    </th>
    <th>
        action
</th>
<!-- <th>

</th> -->
    </tr>
</thead>
</table>
</div>
<?php
    session_start();
    include "database.php";
    if(!$_SESSION['t1'])
    {
        header("location:login.php");
    }
    $sql="update book_issue set  fine = '10' where duedate < SYSDATE()";
    $result=mysqli_query($link,$sql);
    $sql="SELECT * FROM `book_issue`";
    $result=mysqli_query($link,$sql);
    while($row=mysqli_fetch_array($result))
    {
    // if($row>0)
    // {
   
echo " <div class='tbl-content'>
<table cellpadding='0' cellspacing='0' border='0' class='tab2'>
  <tbody>";
  echo "<tr>";
    echo  " <td>";
    echo $row[0];
    echo" </td>";
    echo  " <td>";
    echo $row[1];
    echo" </td>";
    echo  " <td>";
    echo $row[2];
    echo" </td>";
    echo  " <td>";
    echo $row[3];
    echo" </td>";
    echo  " <td>";
    echo $row[4];
    echo" </td>";
    echo  " <td>";
    echo $row[5];
    echo" </td>";
    echo  " <td>";
    echo $row[6];
    echo" </td>";
    echo  " <td>";
    echo $row[7];
    echo" </td>";
    echo  " <td>";
    echo $row[8];
    echo" </td>";
    echo  " <td>";
    echo $row[9];
    echo" </td>";
    echo  " <td>";
    echo $row[10];
    echo" </td>";
    echo "<td>";
   $ro=base64_encode($row[11]);
    echo"<a href='http://localhost/librarymanagment/admin/edit.php?id=$ro' class='edit'>EDIT</a></td>";
         echo"</tr>";
echo "</tbody>";
echo"</table>";
echo "</div>";

     }
     $dele="DELETE FROM `book_issue` WHERE `returned`= 'yes'";
     mysqli_query($link,$dele);
     
    ?>
    </section> 
    
</form>
</body>
</html>
