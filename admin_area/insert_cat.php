<?php
   $user_email=$_SESSION['customer_email'];
   if(!isset($_SESSION['customer_email']))
   {
      header('Location: index.php?error=Login_First');
   }	
?>
<form action="" method="post" style="padding:80px">
<b>Insert New Category: </b>
<input type="text" name="new_category" required/>
<input type="submit" name="add_category" value="Add Category"/>
</form>
<?php
include("includes/database.php");
if(isset($_POST['add_category']))
{
$new_category=$_POST['new_category'];

$insert_category="insert into categories (category_title,customer_email) values ('$new_category','$user_email')";
$run_category=mysql_query($insert_category);
if($run_category)
{
	echo "<script>alert('New category has been added!')</script>";
	echo "<script>window.open('index.php?view_cats','_self')</script>";
}
}
?>