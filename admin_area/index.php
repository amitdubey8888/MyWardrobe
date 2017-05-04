<?php
  session_start();
  $user_email=$_SESSION['customer_email'];
  $get_date=$_SESSION['Last_login'];
  if(!isset($_SESSION['customer_email']))
   {
      header('Location: index.php?error=Login_First');
   }	
?>
<!DOCTYPE>
<html>
  <head>
      <title>Welcome To Your Wardrobe</title>
	  <link rel="stylesheet" href="styles/style.css" media="all">
  </head>
 <body>
 <div class="main_wrapper">
  <div id="header">
   <img src="images/download.png" width="100%" height="120"/>
 </div>
 <div id="right">
         <h2 style="text-align:center">Manage Your Wardrobe</h2>
		 <a href="index.php?my_account">My Account</a>
		 <a href="index.php?insert_product">Insert Item</a>
		 <a href="index.php?view_products">View Item</a>
		 <a href="index.php?insert_cat">Insert Category</a>
		 <a href="index.php?view_cats">View Category</a>
		 <a href="logout.php">Logout</a>
 </div>
 <div id="left">
 <?php
     if(isset($_GET['my_account']))
	 {
		 include("my_account.php");
	 }
     if(isset($_GET['insert_product']))
	 {
		 include("insert_product.php");
	 }
	  if(isset($_GET['view_products']))
	 {
		 include("view_products.php");
	 }
	  if(isset($_GET['edit_pro']))
	 {
		 include("edit_pro.php");
	 }
	  if(isset($_GET['insert_cat']))
	 {
		 include("insert_cat.php");
	 }
	 if(isset($_GET['view_cats']))
	 {
		 include("view_cats.php");
	 }
	  if(isset($_GET['edit_cat']))
	 {
		 include("edit_cat.php");
	 }	 
   ?>
 </div>
 </div>
 </body>
</html>