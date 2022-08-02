<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN||Change password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/uedit.css">
    <style>
.pass{
    background:red;
    padding:10px;
}
        </style>
<script src="main.js"></script> 
</head>
<body>
<div class="conte">
   <?php
  
   session_start();
   include "database.php";
 $user=($_GET['id']);
 $user=base64_decode($user);
   if(isset($_POST['b2']))
   {
    $t1=$_POST['t1'];  
   $t3=$_POST['t3'];
   $t1=MD5($t1);
   $sql="SELECT * FROM login WHERE password='$t1' AND type='admin'";
   $resul=mysqli_query($link,$sql);
   $nos=mysqli_fetch_row($resul);
   if($nos[1]==$t1)
   {
    $t3=MD5($t3);
   $con="UPDATE `login` SET `password`='$t3' WHERE  `user_id`='$user'";
    $re=mysqli_query($link,$con);
   echo"<script>alert(' Password is changed')</script>";
    // echo "<script>location.href='http://localhost/librarymagment/adminhome.php'</script>";
    header("location:adminhome.php");
   }
   else
   {
       echo"<script>alert('Passsword could not match')</script>";
   }
}
   ?>
   <form action='' method='POST' enctype='multipart/form-data' name="f1" id="f1">
   
   <fieldset>
             <input type='password' name='t1' id='t1' placeholder='Enter  old Password' >
             </fieldset>
       <fieldset>
             <input type='password' name='t3' id='t3' placeholder='Enter Password'  required>
             </fieldset>
             <fieldset> 
                    <input type='password' name='t3' id='t3' placeholder='Confirm password'  required>
                    </fieldset>      
    <fieldset>
    <input type='Submit' id='b2' name='b2' value='save'>
    </fieldset>                
   </form>
   
   </div>
</body>
</html>
