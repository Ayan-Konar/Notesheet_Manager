<!DOCTYPE html>
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
    $_SESSION["id1"]='';

    require 'db_conn.php'; 

      session_start();

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

<form name="form1" action="dashboard_confirm.php" method="post" enctype="multipart/form-data">
<h3>Recipient dept:</h3>
<select id="dep" onChange="func1()" name="rec_dep">
<?php
$res=mysqli_query($conn,"SELECT * from department_master");
while($row3=mysqli_fetch_assoc($res))
{
?>
<option value="<?php echo $row3["department_code"];?>" name="rec_dep"><?php $a=$row3["department_name"]; echo $a;?></option>
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
<br>
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
    <center><input type="file" name="fileToUpload"/>  </center><br>
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

                                    




        <!-- Javascript -->
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

        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>