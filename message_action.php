<!DOCTYPE html>
<html lang="en">
<?php
require "db_conn.php";
session_start();
?>

<form name="form3" action="dashboard_confirm_action.php" method="POST" enctype="multipart/form-data">
<h3>Recipient department:</h3>
<?php
$rdep=$_POST["rec_dep"];
$sql="SELECT department_name from department_master where department_code='".$rdep."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$dep_name=$row["department_name"];
 echo $dep_name;
?>

<h3>Recipient name:</h3>
<?php 
 $rname=$_POST["rec_name"];
 $sql1="SELECT emp_name from emp_master where emp_no='".$rname."'";
 $result1=mysqli_query($conn,$sql1);
 $row1=mysqli_fetch_assoc($result1);
 $rep_name=$row1["emp_name"];
 $_SESSION["rn"]=$rname;
 echo $rep_name;
 echo$_SESSION["rn"];
 ?>

 <h3>Notesheet subject:</h3>
<?php
echo $a=$_POST["ns_sub"];
$_SESSION["ns"]=$a;
?>

<h3>Notesheet date:</h3>
<?php
echo $b=$_POST["dt"];
$_SESSION["nd"]=$b;
?>
<h3>Notesheet body:</h3>
<?php 
echo $c=$_POST["ns_body"];
$_SESSION["nbb"]=$c;
?>
<br>
<?php  
    $target_path = "c:/wamp/www/DPL/form-3/files/"; 
    if(isset($_FILES['fileToUpload']['name']))
    { 
    $target_path = $target_path.basename( $_FILES['fileToUpload']['name']);
    }  
    $_SESSION["afp"]= $_FILES['fileToUpload']['name'];
    echo $_SESSION["afp"];
      
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
        echo "File uploaded successfully!";
    } else{  
        echo "Sorry, file not uploaded, please try again!";  
    }
    ?> 
  </form>   

  <br>
<br>
 <form action="messages.php" method="post">
    <input type="submit" name="submit3" value="EDIT" class="btn btn-send">
 </form>
 <form action="message_confirm_action.php" method="post" enctype="multipart/form-data" >
<input type="submit" name="submit4" value="PROCEED" class="btn btn-send">
</form> 