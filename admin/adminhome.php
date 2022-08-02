<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN||HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" media="screen" href="css/usad.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
   <script>
       $(document).ready(function(){
         $("#slideshow > div:gt(0)").hide();
         
setInterval(function() { 
  $('#slideshow > div:first')
    .slideDown(100)
    .fadeOut(6000) 
    .next()
    
   //  .slideUp(1000)
    
    .end()
    .appendTo('#slideshow');
},  5000);


});  
    </script>
    <script src="js/my.js">
    </script>
</head>
<body>
    <button class="openbtn" onclick="openNav()">☰</button><h1>Librarymangment</h1>
    <form method="GET" action="">
<div id="container">
<nav >
<?php
session_start();  
     include "database.php";
     $user=$_SESSION['t1'];
    if(!$_SESSION['t1'])
    {
      header("location:http://localhost/Librarymanagment/admin/login.php");
    }
    $user=base64_encode($user);
    
     $sql="SELECT * FROM  u_detail WHERE userid='$user'";
     $id=mysqli_query($link,$sql);
   
         ?>
        <div class="msg"><a href='http://localhost/librarymanagment/admin/admin_inbox.php?id=<?php echo $user?>'><img src="icon/images.png" width='40' height='40' title="Inbox"/></a>
        <?php $sq2="SELECT COUNT(*) FROM `admin_msg` WHERE `msgstats`='0' ";
      $qery=mysqli_query($link,$sq2);
      while($row=mysqli_fetch_array($qery))
      { if($row[0]!=0)
        echo "<span class='count'>$row[0]</span>";
      }
      // while($row=mysqli_fetch_assoc($qery))
      // {
      //   // if($value!=0)
      //   $value=$row['sum'];
      //    echo "<span class='count'>$qery</span>";
      // }
      //     ?>
          
          
          </div>
            
</nav> 
    </form>
    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="http://localhost/librarymanagment/admin/adminhome.php" class="menu">Home</a>
        <a href="http://localhost/librarymanagment/admin/add_book.php">Add Books</a>
        <a href="http://localhost/librarymanagment/admin/book_edit.php">Edit Books </a>
        <a href="http://localhost/librarymanagment/admin/admin.php">Issue Detail</a>
        <a href="http://localhost/librarymanagment/admin/user_edit.php">Edit User</a>
        <a href="http://localhost/librarymanagment/admin/adminchangepass.php?id=<?php echo $user ?>">Change password</a>
        <a href="http://localhost/librarymanagment/admin/logout.php" class="menu">Logout</a>
      </div>
   <div class="outter">
    
    <div id="slideshow">
        <div>
           <h2>Bad libraries build collections, good libraries build services, great libraries build communities.</h2>
          <img src="bimage/l1.jpg" width="90%"  height="320px">
        </div>
        <div>
            <h2>An original idea. That can’t be too hard. The library must be full of them.</h2>
          <img src="bimage/l2.jpg"  width="90%"  height="350px">
        </div>
        <div>
            <h2>Good friend,good books and a sleeoy conscience:this is ideal life.</h2>
            <img src="bimage/l3.jpg"  width="90%"  height="350px" >
        </div>
        <div>
           <h2>“If one cannot enjoy reading a book over and over again, there is no use in reading it at all.” </h2>
            <img src="bimage/l4.jpg"  width="90%"   height="320px">
          </div>
          <div>
             <h2>The library is the temple of learning, and learning has liberated more people than all the wars in history.</h2>
            <img src="bimage/l5.jpg"  width="90%" height="320px" >
          </div>
          <div>
             <h2>Libraries were full of ideas – perhaps the most dangerous and powerful of all weapons.</h1>
              <img src="bimage/l6.jpg"  width="90%"  height="320px"  >
          </div>
          <div>
             <h2>Cutting libraries during a recession is like cutting hospitals during a plague</h2>
            <img src="bimage/l7.jpg"  width="90%"  height="350px"  >
              </div>
     </div> 
   </div>
   <div class="bg">
   <div class="details">

      <div class="para">
<p><b class="firstp">Library</b> is a storehouse of books. It also provides various other sources of information 
  for reading in its premises as well as borrowing for home. The collection of library can include books, 
  manuscripts, magazines, periodicals, videos, audios, DVDs and various other formats. 
  Wide range of books are stored in a library and well organized in book shelves.
 It is not possible for an individual to have such a wide collection of books at home. 
 One can get access to diverse genres of books and other resources in library. 
 It shuns the need to buy expensive books and resources. If there were no libraries many students who love to read would have been deprived of reading mostly due to financial difficulties.</p>
      </div>
      </div>
     </div>
     
</body>
</html>