<?php
	$USER = $_POST["compId"];
	$con = mysql_connect("localhost","root","hhf150076");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
 	}
	mysql_select_db("Instant_Chat", $con);
	$RES = mysql_query("select PSW from USER where NickName='$USER' ");
	$PSW = mysql_fetch_array($RES);
	$PSW = $PSW["PSW"];
	//echo $USER;
	//echo $PSW;
	
	if ($_FILES["file"]["error"] > 0)
	{
		
		echo "文件上传发生错误，请重新上传或联系管理员";
	}
	else
	{
			
			if(move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"])==0)
			{
				echo "文件移动发生错误";
				
				exit();
			}
			else
			{	
			$Str = 	"Location: http://www.personalwebhhf.cn/Upload_File.php?user=".$USER."&psw=".$PSW;
			header($Str);
				exit();
			}
		
	}

?>
