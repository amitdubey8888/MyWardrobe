<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
<style>
body{
	background-color:skyblue;
}
input[type=mail]{
    width: 20%;
    padding: 10px 10px;
    margin: 0px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}
li{
	list-style:none;
}
</style>
</head>
<body>
<div class="container">
<form action="" method="post">
         <ul>
         <li><label><h3><b>Please enter your registered email</b></h3></label></li>
         <li><input type="mail" placeholder="Enter your email" name="email" required/></li>        
         <li style="margin-top: 15px;"><button type="submit" name="forgot" style="padding:15px;"><strong>Forgot Password</strong></button></li>
		 </ul>
</form>
</div>
</body>
</html>
<?php
include("includes/database.php");
if(isset($_POST['forgot'])){
	$c_email=$_POST['email'];
	
	if(!filter_var($c_email, FILTER_VALIDATE_EMAIL)) 
	{ 
	    echo "<script>alert('Invalid email format,Please Try with a valid mail!')</script>";    
		echo "<script>window.open('forgot_password.php','_self')</script>";
    }
	
	$get_customer="select * from customer where customer_email='$c_email'";
    $run_customer=mysql_query($get_customer);
	$check_customer=mysql_num_rows($run_customer);
	$get_row=mysql_fetch_array($run_customer);
	$get_pass=$get_row['customer_pass'];
	$get_name=$get_row['customer_name'];
	if($check_customer==0)
	{
		echo "<script>alert('Sorry your email is not registered!')</script>";
		echo "<script>window.open('forgot_password.php','_self')</script>";
		exit();
	}
		$subject="Forgot Password";
		$message="Dear $get_name your password is $get_pass";
		$from="Amit_Dubey";
		
		if(mail($c_email, $subject, $message, "From: " . $from))
		{
			echo "<script>alert('Your password has been sent to your email, Thank you!')</script>";
			echo "<script>window.open('forgot_password.php','_self')</script>";
		}
		else
		{
		    echo "<script>alert('Something went wrong, Please try again!')</script>";	
			echo "<script>window.open('forgot_password.php','_self')</script>";
		}
}
?>