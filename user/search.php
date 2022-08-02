<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEARCH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/search.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script>
    $(document).ready(function(){
$(".serb,input").slideDown();

    });
    </script>
</head>
<body>
    <div class="serb" hidden>
        <form action="" method="GET" enctype="multipart/form-data" name="form1" class="form1">   
              <input type="text" id="ser" name="ser"  requerd />
              <input type="submit" value="&#128269;"  id="bt1" name="bt1" />
          </form>  </div>
      <div id="container">
          <form action="" method="GET" enctype="multipart/form-data" name="form2">
           <?php
            include "database.php";
            if(isset($_GET['bt1']))
            {
                $ser=$_GET['ser'];
                $rs=" ";
        // $result="0"book_name LIKE '%$ser%'OR Author_name LIKE'%$ser%' OR        
      $sql="SELECT * FROM `book` WHERE  branch LIKE '%$ser%' OR book_name LIKE '%$ser%'OR Author_name LIKE'%$ser%'  ";
      $result=mysqli_query($link,$sql);
        while($row1=mysqli_fetch_row($result))
         {
        if($row1!="")
            {
                $bou=base64_encode($row1[1]);
            echo"<div class='content'>".
            "<a href='http://localhost/Librarymanagment/user/display.php?id=$bou'>".
            "<div class='box'><img src='http://localhost/librarymanagment/admin/bookimage/".$row1[8]."' width='300' height='300' class='bookimg' />".
            "<ul><li><span>ISBN:</span>$row1[1]</li>
           <li><span>Bookname:</span>$row1[2]</li>
           <li><span>Author:</span>$row1[3]</li>
           <li><span>Branch:</span>$row1[4]</li>
           <li><span>Published date:</span>$row1[6]</li> 
           <li><span>Availability:</span>$row1[5]</li></ul>
           <li class='spl'><span >Price:</span>$row1[7]</li></ul>".
          "</div></div> </a><br>";
          
          
        }
        else
        {
          echo "<div class='result'>No Result<div>";   
        }
    }
   
//     $sql="SELECT * FROM `book` WHERE book_name LIKE '%$ser%'OR Author_name LIKE'%$ser%'";
//     $result=mysqli_query($link,$sql);
//   ;
//       while($row2=mysqli_fetch_row($result))
//        {
//       if($row2!="")
//           {
//               $bou=base64_encode($row2[1]);
//           echo"<div class='content'>".
//           "<a href='http://localhost/Librarymanagment/user/display.php?id=$bou'>".
//           "<div class='box'><img src='http://localhost/librarymanagment/admin/bookimage/".$row2[8]."' width='300' height='300' class='product' />".
//           "<ul><li><span>ISBN:</span>$row2[1]</li>
//          <li><span>Bookname:</span>$row2[2]</li>
//          <li><span>Author:</span>$row2[3]</li>
//          <li><span>Branch:</span>$row2[4]</li>
//          <li><span>Published date:</span>$row2[6]</li> 
//          <li><span>Availability:</span>$row2[5]</li></ul>
//          <li><span>Price:</span>$row2[7]</li></ul>".
//         "</div></div> </a><br>";
        
        
//       }
     
  
//   }
 
      
        

    //    header("location:search.php");
        
    
                
      
          }
      ?></form>
</body>
</html>
<?php
if(@$_GET['id']=='2')
{echo'
<div class="input-group"style="width:20%;" >
<a href="?id=search" > 
    <div class="input-group-append">
      <button class="btn btn-secondary" type="submit">
      <i class="fa fa-search" aria-hidden="true"></i>
      </button></a>
    </div>
  </div>';}
  if(@$_GET['id']=='search')
{echo'
<div class="input-group"style="width:20%;" >
<form method="GET">
<input type="text" class="form-control" placeholder="Search "style="width:150px;"name="Search">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="submit" name="searchbutton" id="searchbutton">
      <i class="fa fa-search" aria-hidden="true"></i>
      </button>
      </form>
    </div>
  </div>';}?>
  <?php
if(@$_GET['id']=='2')
{echo'
<div class="input-group"style="width:20%;" >
<a href="?id=search" style="width:80%;"> <input type="text" class="form-control" placeholder="Search ">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="submit">
      <i class="fa fa-search" aria-hidden="true"></i>
      </button></a>
    </div>
  </div>';}?>
  