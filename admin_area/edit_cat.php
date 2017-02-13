<?php
$user_email=$_SESSION['customer_email'];
if(!isset($_SESSION['customer_email']))
   {
      header('Location: index.php?error=Login_First');
   }
?>
<?php
include("includes/database.php");
if(isset($_GET['edit_cat']))
{
	$category_id=$_GET['edit_cat'];
	$get_category="select * from categories where category_id='$category_id' AND customer_email='$user_email'";
	$run_category=mysql_query($get_category);
	$row_category=mysql_fetch_array($run_category);
	$category_id=$row_category['category_id'];
	$category_title=$row_category['category_title'];
}
?>
<form action="" method="post" style="padding:80px">
<b>Update Category: </b>
<input type="text" name="new_category" value="<?php echo $category_title; ?>"/>
<input type="submit" name="update_category" value="Update Category"/>
</form>
<?php
if(isset($_POST['update_category']))
{
$update_id=$category_id;
$new_category=$_POST['new_category'];
$update_category="update categories set category_title='$new_category' where category_id='$update_id'";
$run_category=mysql_query($update_category);
if($run_category)
{
	echo "<script>alert('Category has been updated!')</script>";
	echo "<script>window.open('index.php?view_cats','_self')</script>";
}
}
?>
