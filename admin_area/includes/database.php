<?php

mysql_connect("localhost","root","");

mysql_select_db("mywardrobe");

if(mysqli_connect_errno())
{
	echo "Failed to connect to MySql:".mysqli_connect_error();
}

?>