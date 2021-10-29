<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<?php
//预防sql注入的一个php文件
//调用时用require_once('function.php');
	function checkIllegalWord ()
	{
		$words=array();
	    $words[]="add ";
		$words[]="count ";
		$words[]="create ";
		$words[]="delete ";
		$words[]="drop ";
		$words[]="from ";
		$words[]="grant ";
		$words[]="insert ";
		$words[]="select ";
		$words[]="truncate ";
		$words[]="update ";
		$words[]="use ";
		$words[]="-- ";
	}
	foreach($_REQUEST as $strGot)
	{
		$strGot=strtolower($strGot);
		foreach($words as $word)
		{
			if(strstr($strGot,$word)){
				echo "您输入的内容有非法字符！";
				exit;
			}
		}
	}
	checkIllegalWord();
?>
<body>
</body>
</html>