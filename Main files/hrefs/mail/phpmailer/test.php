<?php
/**
* by www.phpddt.com
*/
header("content-type:text/html;charset=utf-8");
ini_set("magic_quotes_runtime",0);
require 'class.phpmailer.php';
try {
	$mail = new PHPMailer(true); 
	$mail->IsSMTP();
	$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
	$mail->SMTPAuth   = true;                  //开启认证
	$mail->Port       = 25;                    
	$mail->Host       = "smtp.163.com"; 
	$mail->Username   = "tjlifang_orz@163.com";    
	$mail->Password   = "gfenkgtfehyefmrb";            
	//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could  not execute: /var/qmail/bin/sendmail ”的错误提示
	$mail->AddReplyTo("tjlifang_orz@163.com","同济立方服务器");//回复地址
	$mail->From       = "tjlifang_orz@163.com";
	$mail->FromName   = "立方官网yeah~";
	$to = "2690445885@qq.com";
	$mail->AddAddress($to);
	$mail->Subject  = "立方报名_".$_POST["fName"]."_".$_POST["fTel"];
	$mail->Body = "<p>课程名称:".$_POST["fCourse"]."</p>".
				  "<p>姓名:".$_POST["fName"]."</p>".
				  "<p>本科学校:".$_POST["fSchool"]."</p>".
				  "<p>专业:".$_POST["fMajor"]."</p>".
				  "<p>TEL:".$_POST["fTel"]."</p>".
				  "<p>Email:".$_POST["fEmail"]."</p>".
				  "<p>QQ:".$_POST["fQQ"]."</p>".
				  "<p>性别:".$_POST["fSex"]."</p>".
				   "<p>提交时间:".date("Y-m-d")." ".date("h:i:sa")."</p>".
				   "<p>PS:请勿回复本邮件</P>";
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
	$mail->WordWrap   = 80; // 设置每行字符串的长度
	//$mail->AddAttachment("f:/test.png");  //可以添加附件
	$mail->IsHTML(true); 
	$mail->Send();
	echo '<h1>提交成功</h1>';
} catch (phpmailerException $e) {
	echo "<h1>提交失败：".$e->errorMessage();
	echo "请联系:18221218719</h1>";
}
?>