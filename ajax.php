<?php
require 'db_conn.php';
if(isset($_GET["department_code"]))
{
$department_code=$_GET["department_code"];
}

if($department_code!=" ")
{
$resl=mysqli_query($conn,"select emp_name,emp_no from emp_master where department_code='".$department_code."'");
?>
<select name="rec_name">;
<?php
while($row2=mysqli_fetch_assoc($resl))
{
	?>

	<option value="<?php echo $row2["emp_no"];?>" name="rec_name"><?php $a=$row2["emp_name"]; echo $a;?></option>

<?php
}
?>
</select>;
<?php
}
?>
?>