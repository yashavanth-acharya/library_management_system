<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GPT||Singup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/uedit.css" />
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
    $('#t6').keypress(function (e) {
    //  debuger;
     var t=$("#t6").val();
        if (t.length>=32 ) {
          $("#errmsg5").html(" The password maximum length is 32 Only").show().fadeOut("slow");
    return false;
        }
       
    });
    $("#t6").keyup(function(e){
        var t2=$("#t6").val();
    if (t2.length<=8) {
          $("#errmsg5").html(" The password minimum length is 8 Only").show().fadeOut("slow");
    return false;
        }
    });
    // $("#t1").keypress(function(e){
    //     e.preventDefault()
    // });
       });
    </script>
</head>
<body>
   <!-- <h1>SINGUP</h1> -->
<div class="cont1">
    <form action="" method="POST" enctype="multipart/form-data" name="f1">
    <?php
         include "database.php";
         if(isset($_POST['b1']))
         { $us="SELECT * FROM  no";
             $result=mysqli_query($link,$us); 
             $nos=mysqli_num_rows($result);
             if($nos>0)
             { 
                $row=mysqli_fetch_array($result);
                 $id=$row[0];
             }$name='GPT';
            
             $user=date("Y").$name.$id;
             $t=$_POST['t'];
             $t1=$_POST['t1'];
             $t2=$_POST['t2'];
             $t3=$_POST['t3'];
             $t4=$_POST['t4'];
             $t5=$_POST['t5'];
             $t6=$_POST['t6'];
             $tr=$_POST['tr'];
             $t7=$_FILES['t7']['name']; 
             $upload="dp/";
             $name=$upload.$_FILES['t7']['name'];
             $tmp_name=$_FILES['t7']['tmp_name'];
             move_uploaded_file("$tmp_name","$name");
                     $u="SELECT * FROM  u_detail";
                     $r1=mysqli_query($link,$u);
                     $row=mysqli_fetch_row($r1);
                     if($row[0]!=$t && $row[4]!=$t3){
                         $sql=" INSERT INTO  u_detail(`reg_no`, `userid`, `first_name`, `last_name`, `mobile`, `branch`, `Email`, `dp`,`gender`)VALUES( '$t','$user','$t1','$t2','$t3','$t4','$t5','$t7','$tr')";
                         $a=mysqli_query($link,$sql);
                     
                   $data="UPDATE `no` SET `id`=id+1";   
                       mysqli_query($link,$data); 
                       $log="INSERT INTO `login`(`user_id`, `password`, `mobile`, `type`) VALUES ('$user',MD5('$t6'),'$t3','member')";
                       mysqli_query($link,$log);
                       $u="SELECT * FROM  u_detail WHERE reg_no='$t'";
                       $r1=mysqli_query($link,$u);
                       $row=mysqli_fetch_row($r1);
                       if($row>0){
                       
                       echo "<script>alert('YOUR USERID ID $row[1]')</script>";
                    //    header("location:location:http://localhost/librarymanagment/user/login.php");
                       }}

                    else
                    {
                        echo "<script>alert('user alraedy Register please check your  register number and mobile number')</script>";
            
                    }
            
                
                // header("location:singup.php");
                    
                
     mysqli_close($link);

    }?>
    <fieldset> 
        <span id="errmsg0" style="position:fixed"></span><br>
    <label for="t">
            <input type="text" name="t" id="t" require placeholder="Register Number"  required><br><span id="errmsg1"></span>
        </label> </fieldset> <fieldset>
    <label for="t1">
            <input type="text" name="t1" id="t1" require placeholder="First name"  required><br><span id="errmsg2"></span>
        </label> </fieldset> <fieldset>
        <label for="t2">
            <input type="text" name="t2" id="t2" require placeholder="Last name" required><br><span id="errmsg3"></span>
        </label> </fieldset> 
        <fieldset>
        <label for="tr">GENDER<br>
            MALE<input type="radio" name="tr" id="tr" require  value="MALE">
            FEMAIL<input type="radio" name="tr" id="tr" require value="FEMAIL" ><br>
        </label> </fieldset>

        <fieldset>
        <label for="t3">
            <input type="phone" name="t3" id="t3" require placeholder="Mobile no"  required><br><span id="errmsg4"></span>
        </label> </fieldset> <fieldset>
        <label for="t4">
        <select name="t4" id="t4">
            <option value="COMPUTER SCIENCE & ENGG">COMPUTER SCIENCE & ENGG</option>
            <option value="ELECTRONICS & COMMUNICATION ENGG">ELECTRONICS & COMMUNICATION ENGG</option>
            <option value="CIVIL ENGINEERING(GENERAL)">CIVIL ENGINEERING(GENERAL)</option>
            <option value="MECHANICAL ENGG.(GENERAL)">MECHANICAL ENGG. (GENERAL)</option>
        </select>
    </label>
    </fieldset> <fieldset>
        <label for="t5">
            <input type="email" name="t5" id="t5" require placeholder="Email"  required>
        </label>
        </fieldset> <fieldset>
        <label for="t6">
            <input type="password" name="t6" id="t6" require placeholder="Password"  required><br><span id="errmsg5"></span>
        </label>
        </fieldset> <fieldset>
        <label for="t7">
        <input type="file" id="t7" name="t7" >
        </label>
        </fieldset>
        <fieldset>
        <label for="ur">
            <input type="submit" name="b1" id="b1" value="Singup">
        </label>
        </fieldset> 
    </form>
<div>
</body>
</html>