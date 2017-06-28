<?php
	$USER = $_GET["user"];
	echo $USER;
	$con = mysql_connect("localhost","root","hhf150076");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
 	}
	mysql_select_db("Instant_Chat", $con);
	mysql_query("update USER set State='0' where NickName='$USER'");
	header("Location: http://www.personalwebhhf.cn/Login.html");
?>
