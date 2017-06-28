//js调用php变量
	function f()
	{
	var para ="<?php echo $USER ?>" ; 
	var url= "http://www.personalwebhhf.cn/Logout.php?user="+para;
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
		var user = "<?php echo $USER ?>" ;
		var date = getNowFormatDate();
		var url= "http://www.personalwebhhf.cn/Get_Message.php?user="+user+"&time="+date+"&context="+x;
		window.location.href=url;
	}
