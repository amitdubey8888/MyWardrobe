<?php
$user_email=$_SESSION['customer_email'];
if(!isset($_SESSION['customer_email']))
   {
      header('Location: index.php?error=Login_First');
   }
 ?>
<table width="795px" align="center" bgcolor="pink">
   <tr align="center">
     <td colspan="6"><h2>View All Category Here</h2></td>
   </tr>
   <tr align="center" bgcolor="skyblue">
     <th>Serial No.</th>
	 <th>Category Title</th>
	 <th>Edit</th>
	 <th>Delete</th>
   </tr>
   <?php
        include("includes/database.php");
		$get_category="select * from categories where customer_email='$user_email'";
		$run_category=mysql_query($get_category);
		$i=0;
		while($row_category=mysql_fetch_array($run_category))
		{
			$category_id=$row_category['category_id'];
			$category_title=$row_category['category_title'];
			$i++;
   ?>
   <tr align="center">
     <td><?php echo $i."."; ?></td>
	 <td><?php echo $category_title; ?></td>	 
	 <td><a href="index.php?edit_cat=<?php echo $category_id; ?>">Edit</a></td>
	 <td><a href="delete_cat.php?delete_cat=<?php echo $category_id; ?>">Delete</a></td>
   </tr>
 <?php } ?>
</table>