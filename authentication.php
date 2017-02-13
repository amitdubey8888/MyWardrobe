<?php
  session_start();
  
  include("includes/database.php");

  if(isset($_POST['signin']))
  {
	  $c_email=$_POST['email'];

	  $c_pass=$_POST['psw'];

	  $sel_customer="select * from customer where customer_pass='$c_pass' AND customer_email='$c_email'";

	  $run_customer=mysql_query($sel_customer);

	  $check_customer=mysql_num_rows($run_customer);

	  if($check_customer==0)
	  {  
		echo "<script>alert('Password or Email is incorrect, Please try again!')</script>";
			
		echo "<script>window.open('index.php','_self')</script>";
		
		exit();
	  }
	  
	  $update_query="update customer set last_login=NOW() where customer_pass='$c_pass' AND customer_email='$c_email'";
	  
	  $run_query=mysql_query($update_query);
	  
	  if($run_query)
	  {
    	$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('You have logged in successfully!')</script>";
		
		echo "<script>window.open('admin_area/index.php','_self')</script>";
	  }
	}
	else if(isset($_POST['signup']))
 {
		$c_email=mysql_real_escape_string($_POST['email']);

		$c_pass=mysql_real_escape_string($_POST['psw']);

		$new_psw=mysql_real_escape_string($_POST['psw-repeat']);

	if(!filter_var($c_email, FILTER_VALIDATE_EMAIL)) 
	{ 
	    echo "<script>alert('Invalid email format!')</script>";
        
		echo "<script>window.open('index.php','_self')</script>";
		
		exit();
    }
		
	if(strcmp($c_pass,$new_psw))
	{
		echo "<script>alert('Password does not match, Try again!')</script>";
        
		echo "<script>window.open('index.php','_self')</script>";
		
		exit();
    }
	
	if(strlen($c_pass)<8)
	{
	  echo "<script>alert('Password should be minimum 8 character long!')</script>";
	  echo "<script>window.open('index.php','_self')</script>";
	  exit();
    }
	
	$sel_customer="select * from customer where customer_email='$c_email'";

	$run_customer=mysql_query($sel_customer);

	$check_customer=mysql_num_rows($run_customer);

	if($check_customer==1)
	{
		echo "<script>alert('Email id already registered, Try with another!')</script>";
        
		echo "<script>window.open('index.php','_self')</script>";
		
		exit();
	}
	
	$c_query= "insert into customer (customer_email, customer_pass) values ('$c_email', '$c_pass')";
	    
    $run_query=mysql_query($c_query) or die('Unable to process your query');
	
	if($run_query)
	{   
        $_SESSION['customer_email']=$c_email;
        
		echo "<script>alert('Thanks for sign up!')</script>";
		
		echo "<script>window.open('admin_area/index.php','_self')</script>";
	}
	else
	{
		echo "<script>alert('Registration Failed, Try again!')</script>";
		
		echo "<script>window.open('index.php','_self')</script>";
	}
  }
	
?>