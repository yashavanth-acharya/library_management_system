<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin||EDIT USER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/uedit.css">
    <script src="js/my.js"></script> 
    <script src="js/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function(){
$("#t3").keypress(function (e) {
  var values=$("#t3").val()

     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    
        $("#errmsg4").html("Digits Only").show().fadeOut("slow");
               return false;
    }
    if(values.length>=10)
   {
    $("#errmsg4").html(" 10 Digits Only").show().fadeOut("slow");
    return false;
   }
  
   });
   $('#t1').keypress(function (e) {
     var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
  
        if (!regex.test(str)) {
          $("#errmsg2").html(" Please Enter Alphabate Only").show().fadeOut("slow");
    return false;
        }
    });
    $('#t2').keypress(function (e) {
     var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
  
        if (!regex.test(str)) {
          $("#errmsg3").html(" Please Enter Alphabate Only").show().fadeOut("slow");
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
<div class="conte1">
   <form action="" method="POST" enctype="multipart/form-data">
  <?php
   session_start();
        include "database.php";
        $id=$_GET['id'];
        $id=base64_decode($id);
        $sql="SELECT * FROM `u_detail` WHERE userid='$id'";
        $result=mysqli_query($link,$sql);
        $row=mysqli_fetch_row($result); ?>
    <fieldset>
        <input type='text' name="t" id="t" placeholder='Register Number' value='<?php echo $row[0] ?>'><br>
        <!-- <span id="#errmsg0"></span> -->
        </fieldset> 
         <fieldset> 
             <input type='text' name="t1" id="t1" placeholder='First name'value='<?php echo $row[2] ?>'>
             <br><span id="errmsg2" style="color:red"></span>
             </fieldset>
             <fieldset>
        <input type='text' name="t2" id="t2"placeholder='Last name' value='<?php echo $row[3] ?>'>
        <br><span id="errmsg3"  style="color:red"></span>          
        </fieldset>
        <fieldset>
         <input type='phone' name="t3" id="t3" placeholder='Mobile no' value='<?php echo $row[4] ?>'>
         <br><span id="errmsg4" style="color:red"></span>
         </fieldset>
         <fieldset>
        <select name="t4" id="t4">
        <option value='<?php echo $row[5] ?>'><?php echo $row[5] ?></option>
            <option value='COMPUTER SCIENCE & ENGG'>COMPUTER SCIENCE & ENGG</option>
            <option value='ELECTRONICS & COMMUNICATION ENGG'>ELECTRONICS & COMMUNICATION ENGG</option>
            <option value='CIVIL ENGINEERING(GENERAL)'>CIVIL ENGINEERING(GENERAL)</option>
            <option value='MECHANICAL ENGG.(GENERAL)'>MECHANICAL ENGG. (GENERAL)</option>
        </select>
        </fieldset>  
        <fieldset>
        <select name="g" id="g">
        <option value='<?php echo $row[9] ?>'><?php echo $row[9] ?></option>
            <option value='MALE'>MALE</option>
            <option value='FEMALE'>FEMALE</option>
           
        </select>
        </fieldset>  
        <fieldset>
     <input type='email' name="t5" id="t5" require placeholder='Email'  value='<?php echo $row[6] ?>'>
     </fieldset>
    <?php
     include "database.php";
     if(isset($_POST['b1']))
     {
     $t=$_POST['t'];
     $t1=$_POST['t1'];
     $t2=$_POST['t2'];
     $t3=$_POST['t3'];
     $t4=$_POST['t4'];
     $t5=$_POST['t5'];
     $g=$_POST['g'];
         $sql="UPDATE `u_detail` SET `reg_no`='$t',`first_name`='$t1',`last_name`='$t2',`mobile`='$t3',`branch`='$t4',`Email`='$t5',`gender`='$g' WHERE reg_no='$id'";
         $result=mysqli_query($link,$sql);
         if($result>0)
         {
              echo"<script>alert('Updated')</script>";
        // echo "<script>location.href='user_edit.php'</script>";
                     header("location:user_edit.php");

         }
         $sq1="UPDATE `login` SET `mobile`='$t3' WHERE `user_id`='$row[1]'";
         $result1=mysqli_query($link,$sq1);
     }?>
     <?php
     include "database.php";
     if(!$_SESSION['t1'])
     {
         header("location:login.php");
     }?>
       <fieldset>
    <input type='Submit' id='b1' name='b1' value='Update'>
    <!-- <input type='Submit' id='b2' name='b2' value='Delete'> -->
    </fieldset>                
   </form>
    </div>
</body>
</html>