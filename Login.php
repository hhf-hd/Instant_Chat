<?php
	$USER = $_POST["user"];
	$PSW = $_POST["psw"];
	$con = mysql_connect("localhost","root","hhf150076");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
 	}
	else
	{
		echo "succsee  ";
	}
	mysql_select_db("Instant_Chat", $con);
	$RES = mysql_query("select * from USER where NickName=$USER and PSW=$PSW");
	echo $RES;
	echo "exist";
		 

?>
