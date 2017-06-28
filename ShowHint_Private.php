<?php
	$Master = $_GET["Send"];
	$Receive = $_GET["Receive"];
	$con = mysql_connect("localhost","root","hhf150076");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
 	}
	mysql_select_db("Instant_Chat", $con);
	$RES = mysql_query("select * from Message_Private where ( Send='$Master' and Receive='$Receive' ) 
	or ( Receive='$Master' and Send='$Receive')  order by Message_ID");
	while($raw = mysql_fetch_array($RES))
	{
		$Send = $raw["Send"];
		$Receive = $raw["Receive"];
		$Context = $raw["Context"];
		$Time = $raw["Time"];
		$Head_Pic_Send = $raw["Head_Pic_Send"];
		if($Master ==$Send)
		{
		echo "
		<div>
		<span style='float:right; '><img src='{$Head_Pic_Send}' height='40' width='40' align='left'/>
		</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span style=' float:right; color:red';>$Send </span>
		
		<br>
		<span style='float:right; color:#9FB6CD ';> $Context &nbsp;&nbsp;&nbsp;</span>
		<br>
		<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />
		</div>";
		}
		else
		{
		echo "<span><img src='{$Head_Pic_Send}' height='40' width='40' align='left'/>
		&nbsp;<span style=' color:red';>$Send </span>";
		echo "<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9FB6CD ';> $Context </span>";
		echo "<br>";
		echo "<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />";
		}
		
	}

		
?>
