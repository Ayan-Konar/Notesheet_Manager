<!DOCTYPE HTML>
<html lang="en">
 <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login Form Template</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://resources/demos/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

          
    </head>
    <body>
<?php
require "db_conn.php";
session_start();
?>
<input type="button" onclick="location='dashboard.php'" name="submit6" value="Create new notesheet" />
<h3><center>You have the following messages</center></h3>

 <?php
    $_SESSION["id1"]='';

    $iid=$_SESSION["id"];
    $sql="SELECT emp_name,department_code from emp_master where emp_no='".$iid."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name=$row["emp_name"];
    $dcode=$row["department_code"];

    $sql1="SELECT department_name from department_master where department_code='".$dcode."'";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($result1);
    $d_name=$row1["department_name"];
    $_SESSION["dname"]=$d_name;

    $sql2="SELECT department_name from department_master";
    $result2=mysqli_query($conn,$sql2);
    //$row2=mysqli_fetch_assoc($result2);
    //$ename=$row2["emp_name"];
    ?>

<h3><center>Welcome,<br><strong>Employee No:</strong><?php echo $iid; ?><br><strong>Employee name:</strong><?php echo $name; ?><br><strong>Employee code:</strong><?php echo $dcode; ?><br><strong>Department name:</strong><?php echo $d_name;?></strong></center></h3>

<?php
$sql3="SELECT * FROM notesheet_master where recipient_emp_code='".$iid."'";
$result3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_assoc($result3);
$sql4="SELECT emp_name from emp_master where emp_no='".$row3["sender_emp_code"]."'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$sname=$row4["emp_name"];


$sql5="SELECT emp_name from emp_master where emp_no='".$row3["originator_emp_code"]."'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);
$oname=$row5["emp_name"];
?>
<?php
 {  
?>

<center><h3><strong>The notesheet id is:</strong></h3><?php echo $row3['ns_id'];?><br><h3><strong>The originator_emp_code and name is:</strong></h3><?php echo $row3['originator_emp_code']; echo $oname;?><br><h3><strong>The sender_emp_code and sender name is:</strong></h3><?php echo $row3['sender_emp_code'];echo $sname;?><br><h3><strong>The notesheet subject is</strong></h3><?php echo $row3["ns_subject"];?><br><h3><strong>The notesheet body is</strong></h3><?php echo $row3["ns_body"];?><br><h3><strong>The notesheet date is:</strong></h3><?php echo $row3["ns_date"];?><br><h3><strong>The attachment file path is:</strong></h3><?php echo $f=$row3["attachment_file_path"];?><a href="download_file.php?file=<?php echo $f ?>">Download</a></strong></h3><br><h3><strong>The stage is:</strong></h3><?php echo $row3["stage"];?><br><h3><strong>The last modified date is:</strong></h3><?php echo $row3["last_modified_date"];?></center>
<hr>
<?php
}
?>

<?php 
echo $_SESSION["nsid"]=$row3["ns_id"];
?>

<form name="form2" action="message_action.php" method="post" enctype="multipart/form-data">
<h3>Recipient dept:</h3>
<select id="dep" onChange="func1()" name="rec_dep">
<?php
$res=mysqli_query($conn,"SELECT * from department_master");
while($row5=mysqli_fetch_assoc($res))
{
?>
<option value="<?php echo $row5["department_code"];?>" name="rec_dep"><?php $a=$row5["department_name"]; echo $a;?></option>
<?php
}
?>
</select>

<h3>Recipient name:</h3>
<div id="rec_name">
<select name="rec_name">
<option>Select:</option>
</select>
</div>

<input type="text" value="<?php if(isset($_POST['ns_sub'])) echo $_POST['ns_sub'];?>" name="ns_sub" placeholder="notesheet_subject" required="required">
<br><br>
<input type="text" id="datepicker" placeholder="notesheet_date" required="required" name="dt">
<br>
<br>
<textarea rows="20" cols="50" name="ns_body" placeholder="notesheet_body" required="required">
</textarea>
<br><br>
<h3>Attach Document</h3>
Select File:  
    <center><input type="file" name="fileToUpload"/></center>
    <br>  
    <input type="submit" value="Proceed" name="submit5"/>  
</form>



    <form action="logout.php" method="post">
    <input type="submit" name="submit1" value="Logout" class="btn btn-send">
    </form>


<script type="text/javascript">
function func1()
{
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.open("GET","ajax.php?department_code="+document.getElementById("dep").value,false);
    xmlhttp.send(null);
    alert(xmlhttp.responseText);
    document.getElementById("rec_name").innerHTML=xmlhttp.responseText;

}
</script>
   <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  </body>



</html>

