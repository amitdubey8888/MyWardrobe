<?php
$user_email=$_SESSION['customer_email'];
if(!isset($_SESSION['customer_email']))
   {
      header('Location: index.php?error=Login_First');
   }
?>
<!DOCTYPE html>
<?php
include("includes/database.php");
if(isset($_GET['edit_pro'])){
	    $item_id=$_GET['edit_pro'];
		$get_item="select * from wardrobe_item where item_number='$item_id'";
		$run_item=mysql_query($get_item);
		$row_item=mysql_fetch_array($run_item);
		
			$item_id=$row_item['item_number'];
			$item_category=$row_item['category'];
			$item_description=$row_item['brief_description'];
			$item_picture=$row_item['picture'];
			$item_date=$row_item['date_purchased'];
			$item_status=$row_item['status'];
}
?>
<html>
<head>
  <title>Update Item</title>
  <style>
  td{
  padding-top: 16px;
  }
  </style>
</head>
<body bgcolor="skyblue">
<form action="" method="post" enctype="multipart/form-data">
  <table align="center" width="795" height="306" border="2" bgcolor="orange">
   <tr align="center">   
     <td colspan="6"><h2>Edit & Update Item</h2></td>
   </tr>
   <tr>
     <td align="right"><b>Item Category:</b></td>
	 <td>
	     <select name="item_cat" required="required">
	         <option>Select a Category</option>
	         <?php
			 $get_category="SELECT * FROM categories where customer_email='$user_email'";
             $run_category=mysql_query($get_category);	
             while($row_category=mysql_fetch_array($run_category))
             {
	         $category_id=$row_category['category_id'];
	         $category_title=$row_category['category_title'];
	         echo "<option value='$category_title'>$category_title</option>";
             }
			 ?>			 
	     </select>
	 </td>
   </tr>
   <tr>
     <td align="right"><b>Item Discription:</b></td>
	 <td><textarea name="item_desc" required="required"><?php echo $item_description; ?></textarea></td>
   </tr>
   <tr>
     <td align="right"><b>Item Picture:</b></td>
	 <td><input type="file" name="item_pic" required="required"/><img src="item_images/<?php echo $item_picture; ?>" width="40px" height="40px"></td>
   </tr>
   <tr>
     <td align="right"><b>Item Status:</b></td>
	 <td><input type="text" name="item_st" value="<?php echo $item_status; ?>" required="required"/></td>
   </tr>
   <tr align="center">
	 <td colspan="3"><input type="submit" name="update_item" value="Update Now"/></td>
   </tr>
  </table>
</form>
</body>
</html>

<?php
if(isset($_POST['update_item']))
{
	        $item=$item_id;
			$category=$_POST['item_cat'];
			$description=$_POST['item_desc'];
			$picture=$_FILES['item_pic']['name'];
	        $picture_tmp=$_FILES['item_pic']['tmp_name'];
			$status=$_POST['item_st'];
	        
	move_uploaded_file($picture_tmp,"item_images/$picture");
	
    $update_item="update wardrobe_item set category='$category', brief_description='$description', picture='$picture', date_purchased=NOW(), status='$status' where item_number='$item'";
    
	$run_item=mysql_query($update_item);
	
	if($run_item)
	{
		echo "<script>alert('Item has been updated successfully!')</script>";
		echo "<script>window.open('index.php?view_products','_self')</script>";
	}	
}
?>
