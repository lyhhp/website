<?php
//require_once('function.php');
	$username=trim($_POST['username']);
	$password=trim($_POST['pwd']);
	$errmsg='';
		if(empty($username)){
			$errmsg='数据输入不完整';
		}
		if(!empty($username)){
		if(empty($errmsg)){
			$db=mysqli_connect('localhost','root','wo211930','www_211930_com');
			if(!$db){
				die("Connection failed:".mysqli_connect_error());
			}
			echo "连接成功!";
				$sql="SELECT*FROM user WHERE username='$username' AND pwd='$password'";
				$result=mysqli_query($db,$sql);
				if($result&& mysqli_num_rows($result)>0){
					$errmsg="登陆成功！";
					session_start();
					$_SESSION['login']='ture';
					$_SESSION['suer']=$username;
					echo "<a href='http://www.211930.com/index.html'>进入在线笔记</a>";
				}
				else{
					$errmsg="用户名或密码不正确！";
				}
					mysqli_free_result($result);
					mysqli_close($db);
				}
			}
	echo "<font cloor='red' size='5'>用户：".$username."".$errmsg."</font><br>\n";
	//http://www.211930.com/login.php?username=1&pwd=1
?>