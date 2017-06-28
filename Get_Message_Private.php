<?php
	$Send = $_GET["Send"];
	$Receive = $_GET["Receive"];
	$Time = $_GET["time"];
	$Context = $_GET["context"];

	$con = mysql_connect("localhost","root","hhf150076");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
 	}
	mysql_select_db("Instant_Chat", $con);
	$Head_Pic_Send = mysql_query("select Head_Pic from USER where NickName='$Send' ");
	$Head_Pic_Send= mysql_fetch_array($Head_Pic_Send);
	$Head_Pic_Send = $Head_Pic_Send["Head_Pic"];
	$Head_Pic_Receive = mysql_query("select Head_Pic from USER where NickName='$Receive' ");
	$Head_Pic_Receive = mysql_fetch_array($Head_Pic_Receive);
	$Head_Pic_Receive = $Head_Pic_Receive["Head_Pic"];
	
	$PSW = mysql_query("select PSW from USER where NickName='$Send' ");
	$PSW = mysql_fetch_array($PSW);
	$PSW = $PSW["PSW"];
/*
	echo $Send;
	echo $Receive;
	echo $Time;
	echo $Context;
	echo $Head_Pic_Send;
	echo $Head_Pic_Receive;
	echo $PSW;
*/
	//echo $PSW;
	//user  exist
	mysql_query("insert into Message_Private(Send,Receive,Time,Head_Pic_Send,Head_Pic_Receive,Context) 
	values('$Send','$Receive','$Time','$Head_Pic_Send','$Head_Pic_Receive','$Context')");
	header("Location: http://www.personalwebhhf.cn/Private_Chat.php?Receive=$Receive&Send=$Send&PSW=$PSW");	

?>
