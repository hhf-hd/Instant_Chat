<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://www.personalwebhhf.cn/css/index.css"/> 
 <!-- <script src="http://www.personalwebhhf.cn/js/index.js"></script> -->
<script type="text/javascript">
 
</script>
<title>Search History</title>
</head>
<body >
<div id="Container">
    <div id="Header">
    </div>
    <div id="Content">
        <div id="Content-Left">
	<?php
	$USER = $_GET["user"];
	$PSW = $_GET["psw"];
	if(empty($USER)||empty($PSW))
	{	
		header("Location: http://www.personalwebhhf.cn/Login.html"); 
	}

	$con = mysql_connect("localhost","root","hhf150076");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
 	}
	mysql_select_db("Instant_Chat", $con);
	$RES = mysql_query("select * from USER where NickName='$USER' and PSW='$PSW' ");

	//user not exist
	if (mysql_num_rows($RES) < 1){
		header("Location: http://www.personalwebhhf.cn/Login.html");
	}
	echo "<div><a href='http://www.personalwebhhf.cn/Search_Hsitory.php?user=$USER&psw=$PSW '>
		<img src='http://www.personalwebhhf.cn/pic/Search.jpg' title='Search history' height='27' width='27' align='left'/></a></div>";
	
	echo "<div><a href='http://www.personalwebhhf.cn/Upload_File.php?user=$USER&psw=$PSW '>
		<img src='http://www.personalwebhhf.cn/pic/upload.jpg' title='Search history' height='27' width='27' align='left'/></a></div>";
	echo "<br>";
	$res = mysql_fetch_array($RES);
	$Gp_Num = $res["Gp_Num"];
	$Head_Pic = $res["Head_Pic"];
	$NickName=$res["NickName"];
	echo "<div><img src='{$Head_Pic}' title='personal center' height='60' width='60' align='left'/></a></div>";
	echo "<div style=' color:red';> &nbsp;&nbsp$NickName </div>";
		echo "<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />";

	
?>
	
	</div>
        <div id="Content-Main">
		<div id="out">
			<input type="button" style='float:left;margin-left:20px;' value="退出" onclick="Logout();"></input>
			<span class="welcome">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 		
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;History</span>
			<input type="button" style='float:right;margin-right:20px;' value="返回" onclick="Return();">
			
		</div>
		<div id="room">
			<span id="txtHint"></span>
		</div>
		<div id="message">
		<form  id="usrform">
		<textarea  rows="4" cols="99" id="info" name="comment" form="usrform"></textarea>
		<input type="button" style='float:right;margin-right:10px;' value="查询" onclick="Search();"></input>
		</form>
		 
		</div>
	</div>
	<script type="text/javascript">
	var xmlHttp
	function Search()
	{
		var USER ="<?php echo $USER ?>" ;
		var Text=document.getElementById("info").value;
		var url = "http://www.personalwebhhf.cn/Search.php?user="+USER+"&Text="+Text;
		//alert(url);
		//window.location.href=url;
		xmlHttp=GetXmlHttpObject()
		if (xmlHttp==null)
  		{
  			alert ("Browser does not support HTTP Request")
  			return
  		}
		xmlHttp.onreadystatechange=stateChanged 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
		//document.getElementById('room').scrollTop=document.getElementById('room').scrollHeight;
	} 
	function stateChanged() 
	{ 
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 		{ 
 		document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
 		} 
	}

	function GetXmlHttpObject()
	{
		var xmlHttp=null;
		try
 		{
 		// Firefox, Opera 8.0+, Safari
 			xmlHttp=new XMLHttpRequest();
 		}
		catch (e)
 		{
 		// Internet Explorer
 		try
  		{
  		xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  		}
 		catch (e)
  		{
  		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
 	}
		return xmlHttp;
	}
	function Logout()
	{
		var para ="<?php echo $USER ?>" ; 
		var url= "http://www.personalwebhhf.cn/Logout.php?user="+para;
		window.location.href=url;
	}
	function Return()
	{
		var para1 ="<?php echo $USER ?>" ; 
		var para2 ="<?php echo $PSW ?>" ; 
		var url= "http://www.personalwebhhf.cn/index.php?user="+para1+"&psw="+para2;
		window.location.href=url;
	}	
	</script>
	
    </div>
    <div class="Clear"></div>
</div>
</body>
</html>
