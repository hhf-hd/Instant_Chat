<?php
	$Master = $_GET["user"];
	$con = mysql_connect("localhost","root","hhf150076");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
 	}
	mysql_select_db("Instant_Chat", $con);
	//$GP_Num = mysql_query("select * from USER  ");
	$Res = mysql_query("select * from USER  where NickName='$Master'");
	$raw = mysql_fetch_array($Res);
	$Gp_Num=$raw["Gp_Num"];
	$RES = mysql_query("select * from Message where Gp_Num='$Gp_Num' order by Message_ID ");
	while($raw = mysql_fetch_array($RES))
	{
		$USER = $raw["USER"];
		$Context = $raw["Context"];
		$Time = $raw["Time"];
		$Head_Pic = $raw["Head_Pic"];
		if($USER == $Master)
		{
		//echo $Time;
		echo "
		<div>
		<span style='float:right; '><img src='{$Head_Pic}' height='40' width='40' align='left'/></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span style=' float:right; color:red';>$USER </span>
		
		<br>
		<span style='float:right; color:#9FB6CD ';> $Context &nbsp;&nbsp;&nbsp;</span>
		<br>
		<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />
		</div>";
		}
		else
		{

			echo "<span><img src='{$Head_Pic}' height='40' width='40' align='left'/>
			&nbsp;<span style=' color:red';>$USER </span>";
			echo "<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9FB6CD ';> $Context </span>";
			echo "<br>";
			echo "<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />";
		}
		
		
	}	

	
?>
