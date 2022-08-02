<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN||ADDBOOK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/uedit.css" /> -->
    <script src="js/my.js"></script> 
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
<div class="con1">
  <form action="" method="POST" enctype="multipart/form-data">
  <?php 
    
    include "database.php";
     
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
$sql="INSERT INTO book(isbn,book_name,Author_name,branch,availability,published_date,price,book_imge) VALUES ('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8')";
$e=mysqli_query($link,$sql);
if($e==1)
{
    echo "<script>alert('data saved')</script>";
    header("location:add_book.php");
}
else
{
 echo "<script>alert(' Notdata saved')</script>";
 header("location:add_book.php");
}
}
    ?>  
 <fieldset> 
      <label for="t1">
          <input type="text" id="t1" name="t1"  placeholder="ISBN" required><br>
          <span id="errmsg1" style="color:red"></span>
      </label>
</fieldset> 
      <fieldset> 
      <label for="t2">
        <input type="text" id="t2" name="t2"  placeholder="Book name" required>
    </label>
</fieldset> 
    <fieldset> 
    <label for="t3">
        <input type="text" id="t3" name="t3"  placeholder="BookAuthor" required><br>
        <span id="errmsg2" style="color:red"></span>
    </label>
</fieldset> 
<fieldset> 
    <label for="t4">
        <select name="t4" id="t4">
            <option value="COMPUTER SCIENCE & ENGG">COMPUTER SCIENCE & ENGG</option>
            <option value="ELECTRONICS & COMMUNICATION ENGG">ELECTRONICS & COMMUNICATION ENGG</option>
            <option value="CIVIL ENGINEERING(GENERAL)">CIVIL ENGINEERING(GENERAL)</option>
            <option value="MECHANICAL ENGG.(GENERAL)">MECHANICAL ENGG. (GENERAL)</option>
            <option value="SCIENCE">SCIENCE</option>
        </select>
    </label>
</fieldset> 
<fieldset> 
    <label for="t5">Availability
       <input type="radio" name="t5" id="t5"  value="YES" required>YES
       <input type="radio" name="t5" id="t5"  value="NO" required>NO
    </label>
</fieldset> <fieldset> 
    <label for="t6">
        <input type="date" id="t6" name="t6"  placeholder="Published date" required>
    </label></fieldset> <fieldset> 
    <label for="t7">
        <input type="text" id="t7" name="t7"  placeholder="Price" required><br>
        <span id="errmsg3" style="color:red"></span>
    </label></fieldset> <fieldset> 
    <label for="t8">
        <input type="file" id="t8" name="t8">
    </label></fieldset> <fieldset> 
    <label for="b1">
            <input type="submit" id="b1" name="b1" value="Submit">
        </label></fieldset>
  </form>  
  <div>
  <?php mysqli_close($link);?>
</body>
</html>
