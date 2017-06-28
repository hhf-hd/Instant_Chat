<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://www.personalwebhhf.cn/css/index.css"/> 
 <!-- <script src="http://www.personalwebhhf.cn/js/index.js"></script> -->
<script type="text/javascript">

</script>
<title>index</title>
</head>
<body>
<div id="Container">
    <div id="Header">
    </div>
    <div id="Content">
        <div id="Content-Left">
	<?php
	
	$USER = $_GET["Send"];
	$Send = $_GET["Send"];
	$Receive = $_GET["Receive"];
	$PSW = $_GET["PSW"];
	$con = mysql_connect("localhost","root","hhf150076");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
 	}
	mysql_select_db("Instant_Chat", $con);
	$RES = mysql_query("select Gp_Num from USER where NickName='$USER' ");
	$res = mysql_fetch_array($RES);
	$Gp_Num = $res["Gp_Num"];
	mysql_query("update USER set State='1' where NickName='$USER'");
	$Online = mysql_query("select * from USER where Gp_Num='$Gp_Num' and State='1'");
	while($raw = mysql_fetch_array($Online))
	{
		$Head_Pic = $raw["Head_Pic"];
		$NickName=$raw["NickName"];
		echo "<div><a href='http://www.personalwebhhf.cn/Private_Chat.php?Receive=$NickName&Send=$USER&PSW=$PSW '>
		<img src='{$Head_Pic}' height='60' width='60' align='left'/></a></div>";
		echo "<div style=' color:red';> $NickName &nbsp;&nbsp在线</div>";
		echo "<hr style='height:1px;border:none;border-top:1px dashed #0066CC;' />";
		
		
	 	
	}
	$Offline = mysql_query("select * from USER where Gp_Num='$Gp_Num' and State='0'");
	while($raw = mysql_fetch_array($Offline))
	{
		$Head_Pic = $raw["Head_Pic"];
		$NickName=$raw["NickName"];
		echo "<div><a href='http://www.personalwebhhf.cn/Private_Chat.php?Receive=$NickName&Send=$USER&PSW=$PSW '>
		<img src='{$Head_Pic}' height='60' width='60' align='left'/></a></div>";
		echo "<div style='color:#9FB6CD ';> $NickName &nbsp;离线</div>";
		echo "<hr style=' height:2px;border:none;border-top:2px dotted #7A378B;' />"; 
		
		
	 	
	}
	?>
	
	</div>
        <div id="Content-Main">
		<div id="out">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="返回" onclick="Back_to_Room();"></input>
			<span class="welcome">&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 		
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php	$Receive = $_GET["Receive"]; echo "<span style=' color:red';> $Receive </span>"; ?></span>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="退出" onclick="logout();"></input>
		</div>
		<div id="room">
			<span id="txtHint"></span>
		</div>
		<div id="message">
		<form  id="usrform">
		<textarea  rows="4" cols="99" id="info" name="comment" form="usrform"></textarea>
		<input type="button" style='float:right;' value="发送" onclick="send();"></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</form>
		</div>

	</div>
	<script type="text/javascript">
	var xmlHttp
	function ShowHint()
	{
		xmlHttp=GetXmlHttpObject()
		if(xmlHttp==null)
  		{
  			alert ("Browser does not support HTTP Request")
  			return
  		} 
		var Send ="<?php echo $Send ?>" ;
		var Receive = "<?php echo $Receive ?>" ;
		//alert(Send);
		var url="http://www.personalwebhhf.cn/ShowHint_Private.php?Send="+Send+"&Receive="+Receive;
		//alert(url);
		xmlHttp.onreadystatechange=stateChanged 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
		document.getElementById('room').scrollTop=document.getElementById('room').scrollHeight;
	} 

	function stateChanged() 
	{ 
		if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
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
	setInterval(ShowHint,500);
	//js调用php变量
	function logout()
	{
	var para ="<?php echo $USER ?>" ; 
	var url= "http://www.personalwebhhf.cn/Logout.php?user="+para;
	window.location.href=url;
	}
	function Back_to_Room()
	{
	var USER ="<?php echo $USER ?>" ;
	var PSW = "<?php echo $PSW ?>" ;
	var url= "http://www.personalwebhhf.cn/index.php?user="+USER+"&psw="+PSW;
	window.location.href=url;
	}
	function getNowFormatDate() {
    		var date = new Date();
    		var seperator1 = "-";
    		var seperator2 = ":";
    		var month = date.getMonth() + 1;
    		var strDate = date.getDate();
   		if (month >= 1 && month <= 9) {
        		month = "0" + month;
   		 }
    		if (strDate >= 0 && strDate <= 9) {
      		 	strDate = "0" + strDate;
   		 }
    		var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate
          	  + " " + date.getHours() + seperator2 + date.getMinutes()
           	 + seperator2 + date.getSeconds();
  		 return currentdate;
	} 
	function send()
	{
		var x=document.getElementById("info").value;
		var Send ="<?php echo $Send ?>" ;
		var Receive = "<?php echo $Receive ?>" ;
		var date = getNowFormatDate();
		var url= "http://www.personalwebhhf.cn/Get_Message_Private.php?Send="+Send+"&Receive="+Receive+"&time="+date+"&context="+x;
		window.location.href=url;
	}
	</script>
    </div>
    <div class="Clear"></div>
</div>
</body>
</html>


