<?php
$user_email=$_SESSION['customer_email'];
if(!isset($_SESSION['customer_email']))
   {
      header('Location: index.php?error=Login_First');
   }
 ?>
<table width="795px" align="center" bgcolor="pink">
   <tr align="center">
     <td colspan="8"><h2>View All Item Here</h2></td>
   </tr>
   <tr align="center" bgcolor="skyblue">
     <th>S.No.</th>
	 <th>Category</th>
	 <th>Discription</th>
	 <th>Picture</th>
	 <th>Date of Purchase</th>
	 <th>Status</th>
	 <th>Edit</th>
	 <th>Delete</th>
   </tr>
   <?php
        include("includes/database.php");
		$get_item="select * from wardrobe_item where customer_email='$user_email'";
		$run_item=mysql_query($get_item);
		$i=0;
		while($row_item=mysql_fetch_array($run_item))
		{
			$item_id=$row_item['item_number'];
			$item_category=$row_item['category'];
			$item_description=$row_item['brief_description'];
			$item_picture=$row_item['picture'];
			$item_date=$row_item['date_purchased'];
			$item_status=$row_item['status'];
			$i++;
   ?>
   <tr align="center">
     <td><?php echo $i."."; ?></td>
	 <td><?php echo $item_category; ?></td>
	 <td><?php echo $item_description; ?></td>
	 <td><img src="item_images/<?php echo $item_picture; ?>" width="50" height="50"></td>
	 <td><?php echo $item_date; ?></td>
	 <td><?php echo $item_status; ?></td>
	 <td><a href="index.php?edit_pro=<?php echo $item_id; ?>">Edit</a></td>
	 <td><a href="delete_pro.php?delete_pro=<?php echo $item_id; ?>">Delete</a></td>
   </tr>
 <?php } ?>
</table>