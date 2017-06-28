<?php
	$USER = $_GET["user"];
	$Context = $_GET["context"];
	$Time = $_GET["time"];
	$con = mysql_connect("localhost","root","hhf150076");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
 	}
	mysql_select_db("Instant_Chat", $con);
	$Head_Pic = mysql_query("select Head_Pic from USER where NickName='$USER' ");
	$Head_Pic = mysql_fetch_array($Head_Pic);
	$Head_Pic = $Head_Pic["Head_Pic"];
	$GP_Num = mysql_query("select GP_Num from USER where NickName='$USER' ");
	$GP_Num = mysql_fetch_array($GP_Num);
	$GP_Num = $GP_Num["GP_Num"];
	//echo $Head_Pic;
	$PSW = mysql_query("select PSW from USER where NickName='$USER' ");
	$PSW = mysql_fetch_array($PSW);
	$PSW = $PSW["PSW"];
	//echo $PSW;
	//user  exist
	mysql_query("insert into Message(USER,Context,Time,Head_Pic,GP_Num) values('$USER','$Context','$Time','$Head_Pic','$GP_Num')");
	mysql_query("insert into Message_Private(Send) values('USER')");
	header("Location: http://www.personalwebhhf.cn/index.php?user=$USER&psw=$PSW");	
?>
