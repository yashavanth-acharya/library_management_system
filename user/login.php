<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" /> 
    <script src="jquery-3.3.1.js"></script>
 <!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->
 <script>
 $(document).ready(function(){
    var t=$('#t1');
    var t2=$('#t2');
    t.focus();
     t.keyup(function(){
$(this).removeClass("iconu");
if(t.val()==0)
{
t.addClass("iconu");   
}
if(t2.val()==0)
{
t2.addClass("iconp");
}
});


t2.keyup(function(){
 $(this).removeClass("iconp");
 if(t2.val()==0)
{
    t2.addClass("iconp");   
}
 });
 t2.click(function(){
if(t.val()==0)
t.addClass("iconu");
});

 
    $("#frgot").click(function(){
        $(".forgot").slideDown();
        $(".con,.singup").slideUp();
    });
    $("#bf2").click(function(){
        $(".forgot").slideUp();
        $(".con,.singup").slideDown();
    });

 
 });
//  $("input").hide(1000);
//  $(document).load(function(){
    
// $("input").fadeIn(1000)
//  });
//  });
 
 </script>
</head>
<body>

<div class="con">
    <h1>Librarymangment</h1>
    <img src="icon\lm.jpg" width='60' height='60'/>
   <form  method="POST" action="">
   <fieldset>
   <label for="t1">
   <input type="text" name="t1" id="t1" class="iconu" placeholder="Userid" require ><br><span class="errmsg0" style="color:red"></span>
   <?php  session_start();
      include "database.php";
      
      if(isset($_POST['b1']))
      {
          $t1=$_POST['t1'];
          $t2=$_POST['t2'];
          $sql="SELECT * FROM `login` WHERE  user_id='$t1' AND password=MD5('$t2') AND type='member'";
          $s=mysqli_query($link,$sql);
          $nos=mysqli_num_rows($s);
       
          if($nos>0)
          {       
    
              header("location:http://localhost/librarymanagment/user/home.php");
              $_SESSION['t1']=$t1;
            //   setcookie("$t1",time()+3600);
          }
          else
           {
            echo"<br><div class='ms' style='color:red'>invalid userid or password</div>";
          }
      
       }?>
   </label></fieldset>
   <fieldset>
   <label for="t2">
   <input type="password" name="t2" id="t2" class="iconp" placeholder="Password" require  ><br><span class="errmsg0" style="color:red"></span>
   </label></fieldset>
   <fieldset>
   <label for=t3>
   <input type="submit" name="b1" id="b1" value="LOGIN" >
   </label>
   <a  class="frgot" id="frgot">Forgotpassword?</a>
    </fieldset>
    
   </form>
   <div class="singup" ><span class="span">Don't have an accont?</span><a href="http://localhost/librarymanagment/user/singup.php">Singup.</a> </div>
   </div>
   <div  class="forgot" hidden> <form action="" method="POST" enctype="multipart/form-data" id="f2">
   <fieldset> 
             <input type='text' name="t1" id="t1" placeholder='Enter your userid'  required >
             </fieldset>
             <fieldset> 
                    <input type='text' name="t2" id="t2" placeholder='Enter mobile number'  required>
                    <br><span style="color:red" id="errmsg4"></span>
                    </fieldset>      
    <fieldset>
    <input type='Submit' id='bf1' name='bf1' value='Check'><input type='button' id='bf2' name='bf1' value='Close'>
    </fieldset>                
   </form>
    <?php
         include "database.php";
         if(isset($_POST['bf1']))
         {
             $t1=$_POST['t1'];
             $t2=$_POST['t2'];
            //  $t3=$_POST['t3'];
             $sql="SELECT * FROM `login` WHERE  user_id='$t1' AND mobile='$t2' AND type='member'";
             $s=mysqli_query($link,$sql);
             $nos=mysqli_num_rows($s);
             if($nos>0)
             {       
             $_SESSION['fuser']=$t1;
               header("location:forgot.php");
               
             }
             else
              {
                 echo "<script>alert('invalid user id or number');</script>";
             }
            }
            ?>

         
   
   </div>
</body>
</html>