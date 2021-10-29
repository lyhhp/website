<?php
	$username=trim($_POST['username']);
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$email=trim($_POST['email']);
	if(empty($username)||empty($email)||empty($password)||$cpassword!=$password){
		echo '数据输入不完整';
			exit;
	}
	else{
		if(strlen($password)<6||strlen($password)>30){
			echo '密码必须在6到30个字符之间';
				exit;
		}
		$pattern="/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
		if(!preg_match($pattern,$email)){
			echo 'Email格式不合法！';
			exit;
		}
		$db=mysqli_connect('localhost','root','wo211930','www_211930_com');
		if(!$db){
			die("Connection failed:".mysqli_connect_error());
		}
		echo "连接成功!";
		$sql="SELECT * FROM user WHERE username='".$username."'";
		$result=mysqli_query($db,$sql);
		// && mysqli_num_rows($result)>0
		if($result&& mysqli_num_rows($result)>0){
			echo "<font color='red' size='5'>该用户名已被注册，请换一个重试！</font><br>\n";
			//echo $username."<br>\n";
			//echo $password."<br>\n";
			//echo $cpassword."<br>\n";
			//echo $email."<br>\n";
		}
		else{
			$s=date("Y-m-d");
			$sql="INSERT INTO user (username,pwd,email,regtime) VALUES ('$username','$password','$email','$s')";
			$result=mysqli_query($db,$sql);
			if(mysqli_query($db,$sql)){
				echo "新纪录插入成功!";
			}
			if($redult){
				//mysqli_free_result($result);
				echo '数据记录插入失败！';
				echo "Error:".$sql."<br>".mysqli_error($db);
				mysqli_close($db);
				exit;
			}
			echo "<font color='red' size='5'>恭喜您注册成功!</font><br>\n";
		}
		mysqli_close($db);
	}
?>