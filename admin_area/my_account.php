<?php
$user_email=$_SESSION['customer_email'];
$get_date=$_SESSION['Last_login'];
if(!isset($_SESSION['customer_email']))
   {
      header('Location: index.php?error=Login_First');
   }
?>
<!DOCTYPE html>
<html>
<head>
<title>My Acoount</title>
<script>
function myaccount(){
document.getElementById('id01').style.display = "none";
document.getElementById('id02').style.display = "block";
};
</script>
<style>
li{
	list-style:none;
	padding:10px;
	padding-left:200px;
}
div#id02{
	display:none;
    position: relative;
    z-index: 1;
    top: 0;
    width: 795px;
    height: 306px;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}
table{
	position: relative;
    left: 280px;
    top: 40px;
}
td{
  padding-top: 40px;
  }
</style>
</head>
<body>
<?php
include("includes/database.php");
$get_customer="select * from customer where customer_email='$user_email'";
$run_customer=mysql_query($get_customer);
if($row_customer=mysql_fetch_array($run_customer))
{
$name=$row_customer['customer_name'];
$email=$row_customer['customer_email'];
$dob=$row_customer['dob'];
?>
<div id="id01" class="model1">
<pre>
<ul>
<li><span><h3 style="color:green;">Name : <?php echo $name; ?></h3></span></li><br/>
<li><span><h3 style="color:green;">Email : <?php echo $email; ?></h3></span></li><br/>
<li><span><h3 style="color:green;">Date Of Birth : <?php echo $dob; ?></h3></span></li><br/>
<li><span><h3 style="color:green;">Last Login : <?php echo $get_date; ?></h3></span></li><br/>
<li><button onclick="myaccount();"><strong>Update</strong></button></li>
</ul>
</pre>
</div>
<?php } ?>

<div id="id02" class="model2">
 <form action="" method="POST">
  <table>
	<tr>
	<td><label><strong>Name : </strong></label></td>
	<td><input type="text" name="cname" required="required"/></td>
	</tr>

	<tr>
	<td><label><strong>DOB : </strong></label></td>
	<td><input type="date" name="cdob" required="required"/></td>
	</tr>

	<tr>
	<td colspan="6"><input type="submit" style="margin-left: 50px;" name="update" value="Update"/></td>
	</tr>
  </table>
 </form>
</div>
<?php 
if(isset($_POST['update']))
{ 
    include("includes/database.php");
	$cemail=$_SESSION['customer_email'];
	$cname=$_POST['cname'];
	$cdob=$_POST['cdob'];
	$update_customer="update customer set customer_name='$cname',dob='$cdob' where customer_email='$cemail'";
	$run_update=mysql_query($update_customer);
	if($run_customer){
		echo "<script>alert('Profile updated successfully!')</script>";
		echo "<script>window.open('index.php?my_account','_self')</script>";
	}
}
?>
</body>
</html>