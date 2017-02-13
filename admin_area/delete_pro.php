<?php
include("includes/database.php");
if(isset($_GET['delete_pro']))
{
$delete_id=$_GET['delete_pro'];
$delete_item="delete from wardrobe_item where item_number='$delete_id'";
$run_delete=mysql_query($delete_item);
if($run_delete)
{
	echo "<script>alert('An Item has been deleted!')</script>";
	echo "<script>window.open('index.php?view_products','_self')</script>";
}
}
?>