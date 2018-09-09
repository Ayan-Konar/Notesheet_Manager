<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require "db_conn.php";
$id1=$_SESSION["id"];
$nid=$_SESSION["nsid"];

$sql="SELECT originator_emp_code from notesheet_master where recipient_emp_code='".$id1."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$oec=$row["originator_emp_code"];
echo $oec;

$r=$_SESSION["rn"];
echo $r;
echo $nid;

$r1=$_SESSION["nd"];
echo $r1;

$r4=$_SESSION["ns"];
echo $r4;

$r2=$_SESSION["nbb"];
echo $r2;

$r3=$_SESSION["afp"];
echo $c="c:/wamp/www/DPL/form-3/files/".$r3;

$sql1="SELECT stage from notesheet_master where recipient_emp_code='".$id1."'";
$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$s=$row1["stage"];
echo $s;

$s=$s+1;

$sql2="SELECT ns_date from notesheet_master where originator_emp_code='".$oec."'";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
$nd=$row2["ns_date"];

echo $nd;


$christmas1= $r1;
$parts1 = explode('/',$christmas1);
$yyyy_mm_dd1 = $parts1[2] . '-' . $parts1[0] . '-' . $parts1[1];



$sql3="INSERT into notesheet_master values('".$nid."','".$oec."','".$id1."','".$r."','".$r4."','".$r2."','".$nd."','".$c."','".$s."','".$yyyy_mm_dd1."') ";
if (mysqli_query($conn, $sql3)) {
    echo "New record created successfully";
    header('location:messages.php');
} else {
    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
}
?>

