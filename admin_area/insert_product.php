<?php
   include("includes/database.php");
   $user_email=$_SESSION['customer_email'];
   if(!isset($_SESSION['customer_email']))
   {
      header('Location: index.php?error=Login_First');
   }	
?>
<!DOCTYPE html>
<html>
<head>
  <title>Inserting Item</title>
</head>
<body bgcolor="skyblue">
<form action="" method="post" enctype="multipart/form-data">
  <table align="center" width="795" border="2" bgcolor="orange">
   <tr align="center">   
     <td colspan="6"><h2>Insert New Item Here</h2></td>
   </tr>
   <tr>
     <td align="right"><b>Item Category:</b></td>
	 <td>
	     <select name="item_category" required>
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
	 <td><textarea name="item_description"></textarea></td>
   </tr>
   <tr>
     <td align="right"><b>Item Picture:</b></td>
	 <td><input type="file" name="item_picture" required/></td>
   </tr>
   <tr>
     <td align="right"><b>Item Status:</b></td>
	 <td><input type="text" name="item_status" required/></td>
   </tr>
   <tr align="center">
	 <td colspan="6"><input type="submit" name="insert_post" value="Insert Now"/></td>
   </tr>
  </table>
</form>
</body>
</html>

<?php
if(isset($_POST['insert_post']))
{
	$user_email=$_SESSION['customer_email'];
	$item_category=$_POST['item_category'];
	$item_description=$_POST['item_description'];
	$item_picture=$_FILES['item_picture']['name'];
	$item_picture_tmp=$_FILES['item_picture']['tmp_name'];
	$item_status=$_POST['item_status'];
	
	move_uploaded_file($item_picture_tmp,"item_images/$item_picture");
	
    $insert_item="insert into wardrobe_item (customer_email,category,brief_description,picture,status) values ('$user_email','$item_category','$item_description','$item_picture','$item_status')";

	$run_query=mysql_query($insert_item);
	
	if($run_query)
	{
		echo "<script>alert('Item has been added!')</script>";
		echo "<script>window.open('index.php?view_products','_self')</script>";
	}
}
?>