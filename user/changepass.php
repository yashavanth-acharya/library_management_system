<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/uedit.css">
    <script src="js/my.js"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function(){

    $('#t1').keypress(function (e) {
    //  debuger;
     var t=$("#t1").val();
        if (t.length>=32 ) {
          $("#errmsg1").html(" The password maximum length is 32 Only").show().fadeOut("slow");
    return false;
        }
       
    });
    $("#t1").keyup(function(e){
        var t2=$("#t1").val();
    if (t2.length<=8) {
          $("#errmsg1").html(" The password minimum length is 8 Only").show().fadeOut("slow");
    return false;
        }
    });
    $('#t3').keypress(function (e) {
    //  debuger;
     var t=$("#t3").val();
        if (t.length>=32 ) {
          $("#errmsg2").html(" The password maximum length is 32 Only").show().fadeOut("slow");
    return false;
        }
       
    });
    $("#t3").keyup(function(e){
        var t2=$("#t3").val();
    if (t2.length<=8) {
          $("#errmsg2").html(" The password minimum length is 8 Only").show().fadeOut("slow");
    return false;
        }
    });
    $("#t2").keyup(function(e){
        var t1=$("#t2").val();
        var t3=$("#t3").val();
    if (t1!=t3) {
          $("#errmsg3").html(" Password is not matching").show().fadeOut("slow");
    return false;
        }
        else{
          $("#errmsg3").html(" Password is  matching").show();
          $("#errmsg3").css({"color":"green"});

        }
    });
       });
       </script>
</head>
<body>
<button class="openbtn" onclick="openNav()">☰</button><h1>Change Password</h1>
<div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="http://localhost/librarymanagment/user/home.php" class="menu">Home</a>
        <a href="http://localhost/librarymanagment/user/book_details.php">Books</a>
        <!-- <a href="http://localhost/librarymagment/changepass.php?id=<?php echo $user?>">Change password</a> -->
        <a href="http://localhost/Librarymanagment/user/logout.php" class="menu">Logout</a>
      </div>
<div class="conte">
   <?php
  
   session_start();
   include "database.php";
 $user=$_GET['id'];
 $user=base64_decode($user);
 if(isset($_POST['b2']))
 {
  $t1=$_POST['t1'];  
 $t3=$_POST['t3'];
 $t1=MD5($t1);
 $sql="SELECT * FROM login WHERE password='$t1'";
 $resul=mysqli_query($link,$sql);
 $nos=mysqli_fetch_row($resul);
 if($nos[1]==$t1)
 {
   $t3=MD5($t3);
 $con="UPDATE `login` SET `password`='$t3' WHERE  `user_id`='$user'";
  $re=mysqli_query($link,$con);
 echo"<script>alert(' Password is changed')</script>";
  // echo "<script>location.href='http://localhost/librarymagment/home.php'</script>";
  header("location:home.php");
 }
 else
 {
     echo"<script>alert('Passsword could not match')</script>";
 }
}
 ?>
 <form action='' method='POST' enctype='multipart/form-data' name="f1" id="f1">
 
 <fieldset>
           <input type='password' name='t1' id='t1' placeholder='Enter  old Password'  required><br>
           <span id="errmsg1" style="color:red"></span>
           </fieldset>
     <fieldset>
           <input type='password' name='t3' id='t3' placeholder='Enter Password'  required><br>
           <span id="errmsg2" style="color:red"></span>
           </fieldset>
           <fieldset> 
                  <input type='password' name='t2' id='t2' placeholder='Confirm password'  required><br>
                  <span id="errmsg3" style="color:red"></span>
                  </fieldset>      
  <fieldset>
  <input type='Submit' id='b2' name='b2' value='save'>
  </fieldset>                
 </form>
 
   
   </div>
</body>
</html>
