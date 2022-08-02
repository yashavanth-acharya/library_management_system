<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GPT||Edit User </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/uedit.css">
<script src="js/my.js"></script> 
<script src="js/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function(){
$("b1").click(function(){
    $(".detail").fadeIn(2000);
    $(".d").toggle(2000);
});
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
   
   $('#t2').keypress(function (e) {
     var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
  
        if (!regex.test(str)) {
          $("#errmsg1").html(" Please Enter Alphabate Only").show().fadeOut("slow");
    return false;
        }
    });
    $('#t1').keypress(function (e) {
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
        <a href="http://localhost/librarymanagment/user/home.php" class="menu">Home</a>
        <a href="http://localhost/librarymanagment/user/book_details.php">Books</a>
        <!-- <a href="http://localhost/librarymanagment/user/changepass.php?id=<?php echo $user?>">Change password</a> -->
        <a href="http://localhost/Librarymanagment/user/logout.php" class="menu">Logout</a>
      </div>
<div class="conte">
   <form action="" method="POST" enctype="multipart/form-data">
  <?php
   session_start();
        include "database.php";
        $id=$_GET['id'];
        $id1=base64_decode($id);
        
        $sql="SELECT * FROM `u_detail` WHERE userid='$id1'";
        $result=mysqli_query($link,$sql);
        $row=mysqli_fetch_row($result); ?>
        <fieldset> 
             <img src=<?php echo "dp/".$row[8]?> width=150 height="150" class="udpe">
             <input type='file' name="i1" id="i1"><br>        
             </fieldset>
         <fieldset class="fff"> 
             <input type='text' name="t1" id="t1" placeholder='First name'value='<?php echo $row[2] ?>'><br>
             <span style="color:red" id="errmsg3"></span>
             </fieldset>
             <fieldset class="fff">
        <input type='text' name="t2" id="t2"placeholder='Last name' value='<?php echo $row[3] ?>'><br>
        <span style="color:red" id="errmsg1"></span>
        </fieldset>
        <fieldset class="fff">
         <input type='phone' name="t3" id="t3" placeholder='Mobile no' value='<?php echo $row[4] ?>'><br>
         <span id="errmsg4" style="color:red"></span>
         </fieldset>
         <fieldset class="fff">
        <select name="t4" id="t4">
        <option value='<?php echo $row[5] ?>'><?php echo $row[5] ?></option>
            <option value='COMPUTER SCIENCE & ENGG'>COMPUTER SCIENCE & ENGG</option>
            <option value='ELECTRONICS & COMMUNICATION ENGG'>ELECTRONICS & COMMUNICATION ENGG</option>
            <option value='CIVIL ENGINEERING(GENERAL)'>CIVIL ENGINEERING(GENERAL)</option>
            <option value='MECHANICAL ENGG.(GENERAL)'>MECHANICAL ENGG. (GENERAL)</option>
        </select>
        </fieldset >  
        <fieldset class="fff">
        <select name="g" id="g">
        <option value='<?php echo $row[9] ?>'><?php echo $row[9] ?></option>
            <option value='MALE'>MALE</option>
            <option value='FEMALE'>FEMALE</option>
        </select>
        </fieldset >  
        <fieldset class="fff">
     <input type='email' name="t5" id="t5" require placeholder='Email'  value='<?php echo $row[6] ?>'>
     </fieldset>
     
    <?php
     include "database.php";
     if(isset($_POST['b1']))
     {
     $t1=$_POST['t1'];
     $t2=$_POST['t2'];
     $t3=$_POST['t3'];
     $t4=$_POST['t4'];
     $t5=$_POST['t5'];
     $g=$_POST['g'];
     $t7=$_FILES['i1']['name']; 
             $upload="dp/";
             $name=$upload.$_FILES['i1']['name'];
             $tmp_name=$_FILES['i1']['tmp_name'];
             move_uploaded_file("$tmp_name","$name");
         if($t7=="")
         {
            $sql="UPDATE `u_detail` SET `first_name`='$t1',`last_name`='$t2',`mobile`='$t3',`branch`='$t4',`Email`='$t5',`gender`='$g'WHERE userid='$id1'";
            $result=mysqli_query($link,$sql);
            if($result>0)
            {
                 echo"<script>alert('Updated')</script>";
           echo "<script>location.href='http://localhost/Librarymanagment/user/uedit.php?id=$id'</script>";
        //    $id=base64_encode($id);
        //    header("location:uedit.php");
   
            }
            $sq1="UPDATE `login` SET `mobile`='$t3' WHERE `user_id`='$row[1]'";
            $result1=mysqli_query($link,$sq1);    
         }
         else{
            $sql="UPDATE `u_detail` SET `first_name`='$t1',`last_name`='$t2',`mobile`='$t3',`branch`='$t4',`Email`='$t5',`dp`='$t7',`gender`='$g' WHERE userid='$id1'";
            $result=mysqli_query($link,$sql);
            if($result>0)
            {
                 echo"<script>alert('Updated')</script>";
        echo "<script>location.href='http://localhost/Librarymanagment/user/uedit.php?id=$id</script>";
        //    $id=base64_encode($id);
            //  header("location:uedit.php");
   
            }
            $sq1="UPDATE `login` SET `mobile`='$t3' WHERE `user_id`='$row[1]'";
            $result1=mysqli_query($link,$sq1);

         }
     }?>
    <fieldset class="fff">
    <input type='Submit' id='b1' name='b1' value='Update'>
    </fieldset>                
   </form>
   </div>
</body>
</html>