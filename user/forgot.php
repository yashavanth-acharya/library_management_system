<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GPT||Forgotpassword</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/uedit.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function(){

    $('#t3').keypress(function (e) {
    //  debuger;
     var t=$("#t3").val();
        if (t.length>=32 ) {
          $("#errmsg5").html(" The password maximum length is 32 Only").show().fadeOut("slow");
    return false;
        }
       
    });
    $("#t3").keyup(function(e){
        var t2=$("#t3").val();
    if (t2.length<=8) {
          $("#errmsg5").html(" The password minimum length is 8 Only").show().fadeOut("slow");
    return false;
        }
    });
    $("#t1").keyup(function(e){
        var t1=$("#t1").val();
        var t3=$("#t3").val();
    if (t1!=t3) {
          $("#errmsg1").html(" Password is not matching").show().fadeOut("slow");
    return false;
        }
        else{
          $("#errmsg1").html(" Password is  matching").show();
          $("#errmsg1").css({"color":"green"});

        }
    });
       });
    </script>
</head>
<body>
<div class="conte">
   <?php
   session_start();
   include "database.php";
   $user=$_SESSION['fuser'];  
   if(isset($_POST['b2']))
   {
   
   $t3=$_POST['t3'];
   $con="UPDATE `login` SET `password`=MD5('$t3') WHERE  `user_id`='$user'";
    $re=mysqli_query($link,$con);
   echo"<script>alert(' Password is changed')</script>";
    header("location:login.php");
   }
   ?>
   <form action='' method='POST' enctype='multipart/form-data' name="f1" id="f1">
       <fieldset>
             <input type='password' name='t3' id='t3' placeholder='Enter new Password'  required><br>
             <span style="color:red" id="errmsg5"></span>
             </fieldset>
             <fieldset> 
                    <input type='password' name='t1' id='t1' placeholder='Confirm password'  required>
             <span style="color:red" id="errmsg1"></span>
                    </fieldset>   <br>   
    <fieldset>
    <input type='Submit' id='b2' name='b2' value='save'>
    </fieldset>                
   </form>
   
   </div>
</body>
</html>
