<?php
require "db_conn.php";
session_start();
$sql="SELECT COUNT(DISTINCT ns_id) as nsid from notesheet_master";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$cnt=$row["nsid"];
$cnt+=1;
echo $cnt.'<br>';
$id2=$_SESSION["id"];
$r=$_SESSION["rn"];
$n=$_SESSION["ns"];
$n1=$_SESSION["nd"];
$n2=$_SESSION["nbb"];
$ap=$_SESSION["afp"];
$dn=$_SESSION["dname"];
$originator_code=$id2;
$sender_code=$id2;

$christmas = $n1;
$parts = explode('/',$christmas);
$yyyy_mm_dd = $parts[2] . '-' . $parts[0] . '-' . $parts[1];

echo $yyyy_mm_dd;
echo $sender_code.'<br>';
echo $originator_code.'<br>';
echo $r.'<br>';
echo $n.'<br>';
echo $n1.'<br>';
echo $n2.'<br>';
echo $c="c:/wamp/www/DPL/form-3/files/".$ap;
$stage=1;
$lmd=$n1; 
$dn=$_SESSION["dname"];
echo $dn.'<br>';
$nsid="DPL/".$dn."/".$cnt;
echo $nsid;

$sql2="INSERT INTO notesheet_master values('".$nsid."','".$originator_code."','".$sender_code."','".$r."','".$n."','".$n2."','".$yyyy_mm_dd."','".$c."','".$stage."','".$yyyy_mm_dd."')";

if (mysqli_query($conn, $sql2)) {
    echo "New record created successfully";
    header('location:messages.php');
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}

?>