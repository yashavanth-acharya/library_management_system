<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN||BOOK EDIT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/uedit.css">
    
    <script src="js/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function(){
$("#t1").keypress(function (e) {
  var values=$("#t1").val()

     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    
        $("#errmsg1").html("Digits Only").show().fadeOut("slow");
               return false;
    }
    if(values.length>=13)
   {
    $("#errmsg1").html(" 13 Digits Only").show().fadeOut("slow");
    return false;
   }
  
   });
   $('#t3').keypress(function (e) {
     var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
  
        if (!regex.test(str)) {
          $("#errmsg2").html(" Please Enter Alphabate Only").show().fadeOut("slow");
    return false;
        }
    });
    $("#t7").keypress(function (e) {
  var values=$("#t1").val()

     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    
        $("#errmsg3").html("Enter Price").show().fadeOut("slow");
               return false;
    }
  
   });
       });
    </script>
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

<div class="conte2">
   <form action="" method="POST" enctype="multipart/form-data">
   <fieldset>
  <?php
   session_start();
   if(!$_SESSION['t1'])
{
    header("location:http://localhost/Librarymanagment/admin/login.php");
}
        include "database.php";
        $id=$_GET['id'];$id=base64_decode($id);
        $sql="SELECT * FROM `book` WHERE `isbn`='$id'";
        $result=mysqli_query($link,$sql);
        $row=mysqli_fetch_row($result);
        $img=$row[8];
        // echo $img;
       

      ?>
   <label for="t1"><strong>ISBN</strong><br>
                <input type="text" id="t1" name="t1"  placeholder="ISBN" value="<?php echo $row[1];?>" required>
          <br>  <span id="errmsg1" style="color:red" hidden></span>
            </label></fieldset>
            <fieldset>
            <label for="t2"><strong>Book name</strong><br>
              <input type="text" id="t2" name="t2"  placeholder="Book name" value="<?php echo $row[2];?>" required>
              <!-- <br>  <span id="errmsg2" hidden></span> -->
            </label>
          </fieldset> 
          <fieldset>
          <label for="t3"><strong>BookAuthor</strong><br>
              <input type="text" id="t3" name="t3"  placeholder="BookAuthor" value="<?php echo $row[3];?>" required>
              <br>  <span id="errmsg2" style="color:red" hidden></span>
            </label> </fieldset>
          <fieldset>
          <label for="t4"><strong>Branch</strong><br>
              <select name="t4" id="t4">
              <option value="<?php echo $row[4];?>"><?php echo $row[4];?></option>
                  <option value="COMPUTER SCIENCE & ENGG">COMPUTER SCIENCE & ENGG</option>
                  <option value="ELECTRONICS & COMMUNICATION ENGG">ELECTRONICS & COMMUNICATION ENGG</option>
                  <option value="CIVIL ENGINEERING(GENERAL)">CIVIL ENGINEERING(GENERAL)</option>
                  <option value="MECHANICAL ENGG.(GENERAL)">MECHANICAL ENGG. (GENERAL)</option>
              </select>
          </label> </fieldset>
          <fieldset>
          <label for="t5"><strong>Availability</strong><br>
          <select name="t5" id="t5">
              <option value="<?php echo $row[5];?>"><?php echo $row[5];?></option>
                  <option value="YES">YES</option>
                  <option value="NO">NO</option>
            </select>
          </label>
          </fieldset>
          <fieldset>
          <label for="t6"><strong>Published date</strong><br>
              <input type="date" id="t6" name="t6"  placeholder="Published date" value="<?php echo $row[6];?>" required>
          </label> </fieldset>
          <fieldset>
           <label for="t7"><strong>Price</strong><br>
              <input type="text" id="t7" name="t7"  placeholder="Price" value="<?php echo $row[7];?>" required>
              <br>  <span id="errmsg3" style="color:red" hidden></span>
            </label>
          </fieldset>
          <fieldset>
          <label for="t8"><strong>BOOKIMAGE</strong><br>
          <img src=<?php echo "bookimage/".$row[8]?> width='100' height='100' /> <br>
         <input  accept="jpeg" type="file" value=""  id="t8" name="t8" >
          </label>
          </fieldset>
<?php
        if(isset($_POST['b1']))
        {
           $t1=$_POST['t1'];
           $t2=$_POST['t2'];
           $t3=$_POST['t3'];
           $t4=$_POST['t4'];
           $t5=$_POST['t5'];
           $t6=$_POST['t6'];
           $t7=$_POST['t7'];
           $t8=$_FILES['t8']['name']; 
           $upload="bookimage/";
                   $name=$upload.$_FILES['t8']['name'];
                   $tmp_name=$_FILES['t8']['tmp_name'];
                   move_uploaded_file("$tmp_name","$name");
                 
            if($t8=="")
            {
                $sql="UPDATE `book` SET `isbn`='$t1',`book_name`='$t2',`Author_name`='$t3',`branch`='$t4',`availability`='$t5',`published_date`='$t6',`price`='$t7' WHERE `isbn`='$id'";
                $result=mysqli_query($link,$sql);
                echo "<script>alert('Updated');</script>";
                echo "<script>location.href='http://localhost/librarymanagment/admin/book_edit.php'</script>";
            }
            else
            {
                $sql="UPDATE `book` SET `isbn`='$t1',`book_name`='$t2',`Author_name`='$t3',`branch`='$t4',`availability`='$t5',`published_date`='$t6',`price`='$t7',`book_imge`='$t8' WHERE `isbn`='$id'";
                $result=mysqli_query($link,$sql);
                echo "<script>alert('Updated');</script>";
                echo "<script>location.href='http://localhost/librarymanagment/admin/book_edit.php'</script>";


            }
                
                }

    ?><?php
     
         mysqli_close($link);?>
          <fieldset>
    <input type='Submit' id='b1' name='b1' value='Update'>
    <!-- <input type='Submit' id='b2' name='b2' value='Delete'> -->
    </fieldset>
    </div>
</body>
</html>