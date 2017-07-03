<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://www.personalwebhhf.cn/css/index.css"/> 
 <!-- <script src="http://www.personalwebhhf.cn/js/index.js"></script> -->
<script type="text/javascript">
 
</script>
<title>Uplaod File</title>
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
	echo "<div><a href='http://www.personalwebhhf.cn/Search_History.php?user=$USER&psw=$PSW '>
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
		<div id="Upload_File" style="float:left;margin-left:20px;" >
		<form action="http://www.personalwebhhf.cn/Upload.php" method="post" enctype="multipart/form-data">
		<span style="float:left;margin-left:50px;margin-top:18px">
		<label for="file">文件名:</label>
		<input type="file" name="file" id="file" /></span>
		<span style="float:left;margin-left:200px;margin-top:20px"><input type="submit" name="submit" value="上	传" /></span>
		<input type="hidden" name="compId" value="<?php $USER = $_GET["user"]; echo $USER?>" />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</form>
		</div>
		<div id="Show_File" 
		style="overflow:auto;float:left;margin-top:20px;margin-left:27px;width:660px; height:550px;
		background-color:#fff;">
		<?php
		/*
		$fileList2=glob('upload/*');
		for ($i=0; $i<count($fileList2); $i++) {
			echo $fileList2[$i].'<br />';
		}
		*/
	
		$dir = "upload/"; 
		$Str = "http://www.personalwebhhf.cn/upload/";
		$handle=opendir($dir.".");
		while (false !== ($file = readdir($handle)))
		{
			if ($file != "." && $file != "..") 
			{
				preg_match("((.*)\.(.*))",$file,$Res);
				
				if($Res[2]=="jpg"||$Res[2]=="jpeg"||$Res[2]=="png"||$Res[2]=="gif")
				{

					echo "<br>";
					$Url = "http://www.personalwebhhf.cn/upload/".$file;			
					echo "<span style=' float:left;margin-left:60px;color:red;'>上传的图片</span>";
					echo "<br>";
					echo "<br>";
					echo "<div><img src='$Url' style=' float:left;margin-left:60px;' 
					title='image' height='140' width='140' align='left'/></a></div>";
					echo "<br>";echo "<br>";echo "<br>";
					echo "<br>";echo "<br>";echo "<br>";echo "<br>";
				}
				if($Res[2]=="txt"||$Res[2]=="rtf"||$Res[2]=="doc"||$Res[2]=="html"||$Res[2]=="css"||
				$Res[2]=="xls"||$Res[2]=="pdf"||$Res[2]=="ppt"||$Res[2]=="php"||$Res[2]=="js")
				{
					echo "<br>";
				echo "<span style=' float:left;margin-left:60px;color:red;'>上传的文本文件</span>";
					$Url_rename = $Res[1].".php";
					$Url = "http://www.personalwebhhf.cn/".$Url_rename;
					echo "<br>";
					echo "<br>";
					echo "<span style=' float:left;margin-left:60px;color:red;'>
					文件名称：<a href='$Url'>$file</a></span>";
					echo "<br>";
				}
				
				//var_dump($Res);

			}
		}
		
		closedir($handle);
	
		?>
		</div>
	</div>
	
	
    </div>
    <div class="Clear"></div>
</div>
</body>
</html>
