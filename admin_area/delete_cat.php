<?php
include("includes/database.php");
if(isset($_GET['delete_cat']))
{
$delete_id=$_GET['delete_cat'];
$delete_category="delete from categories where category_id='$delete_id'";
$run_delete=mysql_query($delete_category);
if($run_delete)
{
	echo "<script>alert('A category has been deleted!')</script>";
	echo "<script>window.open('index.php?view_cats','_self')</script>";
}
}
?>