<?php
	
	$USER = $_POST["user"];
	$PSW = $_POST["psw"];
	$Gp_Num = $_POST["gp_num"];
	$con = mysql_connect("localhost","root","hhf150076");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
 	}
	mysql_select_db("Instant_Chat", $con);
	$RES = mysql_query("select Gp_Num from USER where NickName='$USER' and PSW='$PSW' ");
	//user  exist
	if (mysql_num_rows($RES) > 1){
		echo "exist";
		//header("Location: http://www.personalwebhhf.cn/Register.html");
	}
	mysql_query("insert into USER values('$USER','$PSW','$Gp_Num','http://www.personalwebhhf.cn/pic/Head.jpg',1)");
	header("Location: http://www.personalwebhhf.cn/index.php?user=$USER&psw=$PSW");	
		

?>
