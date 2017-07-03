<?php
	$Master = $_GET["user"];
	$Text = $_GET["Text"];
	$con = mysql_connect("localhost","root","hhf150076");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
 	}
	mysql_select_db("Instant_Chat", $con);
	//$GP_Num = mysql_query("select * from USER  ");
	$RES = mysql_query("select * from Message  where USER like '%$Text%' or Context like '%$Text%' ");
	//$raw = mysql_fetch_array($Res);
	if(mysql_num_rows($RES)<1)
	{
		echo "<span style=' float:left;margin-left:40px; color:red';>没有聊天记录</span>";
	}
	while($raw = mysql_fetch_array($RES))
	{
		$USER = $raw["USER"];
		$Context = $raw["Context"];
		$Time = $raw["Time"];
		$Head_Pic = $raw["Head_Pic"];
		//echo $Time;
/*
		echo "
		<div>
		<span style='float:right; '><img src='{$Head_Pic}' height='40' width='40' align='left'/></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span style=' float:right; color:red';>$USER </span>
		
		<br>
		<span style='float:right; color:#9FB6CD ';> $Context &nbsp;&nbsp;&nbsp;</span>
		<br>
		<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />
		</div>";
		
*/
			echo "<span><img src='{$Head_Pic}' height='40' width='40' align='left'/>
			&nbsp;<span style=' color:red';>$USER </span>";
			echo "<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9FB6CD ';> $Context </span>";
			echo "<br>";
			echo "<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />";
		
	}
/*
	echo "以上为群聊内容";	
	echo "<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />";
	$RES = mysql_query("select * from Message_Private  where Send like '%$Text%'  ");
	//$raw = mysql_fetch_array($Res);
	
	while($raw = mysql_fetch_array($RES))
	{
		$USER = $raw["Send"];
		$Context = $raw["Context"];
		$Time = $raw["Time"];
		$Head_Pic = $raw["Head_Pic_Send"];
		//echo $Time;

			echo "<span><img src='{$Head_Pic}' height='40' width='40' align='left'/>
			&nbsp;<span style=' color:red';>$USER </span>";
			echo "<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9FB6CD ';> $Context </span>";
			echo "<br>";
			echo "<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />";
		
	}	
	$RES = mysql_query("select * from Message_Private  where Receive like '%$Text%'  ");
	while($raw = mysql_fetch_array($RES))
	{
		$USER = $raw["Send"];
		$Context = $raw["Context"];
		$Time = $raw["Time"];
		$Head_Pic = $raw["Head_Pic_Send"];
		//echo $Time;

			echo "<span><img src='{$Head_Pic}' height='40' width='40' align='left'/>
			&nbsp;<span style=' color:red';>$USER </span>";
			echo "<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9FB6CD ';> $Context </span>";
			echo "<br>";
			echo "<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />";
		
	}	
	$RES = mysql_query("select * from Message_Private  where Context like '%$Text%'  ");
	while($raw = mysql_fetch_array($RES))
	{
		$USER1 = $raw["Send"];
		$USER2 = $raw["Receive"];
		$Context = $raw["Context"];
		$Time = $raw["Time"];
		$Head_Pic = $raw["Head_Pic_Send"];
		//echo $Time;

			echo "<span><img src='{$Head_Pic}' height='40' width='40' align='left'/>
			&nbsp;<span style=' color:red';>$USER1 to $USER2</span>";
			echo "<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:#9FB6CD ';> $Context </span>";
			echo "<br>";
			echo "<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />";
		
	}

*/	

?>
