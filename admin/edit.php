<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN||ISSUE DETAIL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/uedit.css">
    <script class="my.js"></script>
    <!-- <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
   rel = "stylesheet"> -->
<script src = "js/jquery-3.3.1.js"></script>
<script src = "js/my.js"></script>
<!-- <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
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
  
    $("#t1,#tt3,#t4,#tt2,#tt5,#t6,#t7,#t8").keypress(function(e){
        e.preventDefault()
    });
       });
       </script>
</head>
<body>
<?php
    session_start();
    if(!$_SESSION['t1'])
    {
        header("location:login.php");
    }?>
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
<div class="con2">
    <form method="POST">
    <?php
    include "database.php";
   $id=$_GET['id'];$id=base64_decode($id);
    $sql="SELECT * FROM book_issue WHERE `tranid`='$id' ";
    $result=mysqli_query($link,$sql);
    $row=mysqli_fetch_row($result);
       ?>
    <fieldset> 
      <label for="t1"><b>ISBN</b><br>
          <input type="text" id="t1" name="t1"  placeholder="ISBN" value='<?php echo $row[0]?>' >
      </label>
</fieldset> 
      <fieldset> 
      <label for="tt2"><b>BOOKNAME</b><br>
        <input type="text" id="tt2" name="tt2"  placeholder="Book name" value='<?php echo $row[1]?>' >
    </label>
</fieldset> 
<fieldset> 
    <label for="t4"><b>USERID</b><br>
<input type="text" id="t4" name="t4"  placeholder=" USERID"  value='<?php echo $row[2]?>'>
  </label>
</fieldset> 
<fieldset> 
    <label for="t5"><b>USERNAME</b><br>
<input type="text" id="tt5" name="tt5"  placeholder="USERNAME" value='<?php echo $row[3]?>' >
  </label>
</fieldset> 
<fieldset> 
<label for="t6"><b>USERNUMBER</b><br>
<input type="text" id="t6" name="t6"  placeholder="USERNUMBER" value='<?php echo $row[4]?>' ><span class="err"></span>
  </label>
</fieldset> 
<fieldset> 
<label for="t6"><b>EMAIL</b><br>
<input type="text" id="t6" name="t6"  placeholder=" EMAIL" value='<?php echo $row[5]?>' >
  </label>
</fieldset> 
<fieldset> 
<label for="t7"><b>ISSUEDATE</b><br>
<input type="text" id="t7" name="t7"  placeholder=" ISSUEDATE" value='<?php echo $row[6]?>'>
  </label>
</fieldset> 
<fieldset> 
<label for="t8"><b>DUEDATE</b><br>
<input type="text" id="t8" name="t8"  placeholder="DUEDATE" value='<?php echo $row[7]?>'>
  </label>
</fieldset> 
<!-- <fieldset> 
<label for="t8"><b>FINE</b><br>
<input type="text" id="t8" name="t8"  placeholder="FINE" value='<?php echo $row[8]?>'required >
  </label>
</fieldset>  -->
 <fieldset> 
    <label for="t2"><b>RETURNDATE</b><br>
    <input type='date' name='t2' id='t2' placeholder='Returndate'  value=' <?php echo $row[9]?>'required>
    </label></fieldset> <fieldset> 
     <label for="t3"><b>RETURNDATED</b><br>
    <select name='t3' id='t3'required>
        <option value='<?php echo $row[10]?>'><?php echo $row[10]?></option>
            <option value='YES'>YES</option>
            <option value='NO'>NO</option>
        </select>
    </label></fieldset> <fieldset> 
    <label for="b1">
    <input type="Submit" id="bu1" name="bu1" value=" Update">
        </label></fieldset>
    <?php 
    include "database.php";
    if(isset($_POST['bu1']))
    {
        $t2=$_POST['t2'];
        $t3=$_POST['t3'];
    $sqli="UPDATE `book_issue` SET `retured_date`='$t2',`returned`='$t3' WHERE`tranid`='$id'";
    $re=mysqli_query($link,$sqli);
    if($re>0 && $t3=="YES")
    {
        echo "<script>alert('Updated')</script>";
        
    $detail="Dear....$row[3] you retured the  book $row[1](ISBN $row[0])retured date is $t2 Thank you for requseting......";
    $sqlmgs="INSERT INTO `msg`(`sender`, `userid`, `receiver`, `detail`, `msgstatus`, `msgtype`) VALUES ('admin','$row[2]','$row[3]','$detail','0','retured')";
mysqli_query($link,$sqlmgs);

$detailadmin="$row[3] is reture is  book $row[1](ISBN $row[0]) on $t2";
    $sqladmin=" INSERT INTO `admin_msg`(`user`, `detail`, `msgstats`, `msgtype`) VALUES ('admin','$detailadmin','0','retured')";
   $e=mysqli_query($link,$sqladmin);
    if($e){ 
    
      echo "<script>location.href='http://localhost/librarymanagment/admin/admin.php'</script>";  
      

    }
    }
  
  }
//     $user=$_SESSION['t1'];
//     $qu="SELECT * FROM `book_issue` WHERE `duedate`<= sysdate() AND msgstates='0' AND userid='$user'";
//    $r=mysqli_query($link,$qu);
//    $row=mysqli_fetch_row($r);
// if($row){
//        $user_name="$row[3]";
//        $uid="$row[2]";
//    $msg="Dear $row[3] please retrun  your book $row[1] and ISBN id $row[0] due date $row[7] is corresed And $row[8].Rs fine is added";
//    $msgs="INSERT INTO `msg`(`sender`,userid,`receiver`, `detail`, `msgstatus`) VALUES ('Admin','$uid',' $user_name','$msg','0')";
// mysqli_query($link,$msgs);
// $sq="UPDATE `msg` SET `msgstatus`='1' WHERE  userid='$uid'";
//     $sq1="UPDATE `book_issue` SET msgstates='1' WHERE  userid='$uid'";
//     mysqli_query($link,$sq1);
//     mysqli_query($link,$sq);
// } ?>
   
    
   
</form>
</body>
</html>