<?php 
if(@$_POST['userName']!='' && @$_COOKIE['mail']!='sent'){
$nickname=$_POST['userName'];
$sub=$_POST['userName']." 's requirement";	
$email=$_POST['email'];
mb_internal_encoding("utf-8");
$to="your email";
$subject=mb_encode_mimeheader($sub,"utf-8");
$message=$_POST['content'];
$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=utf-8\r\n";
$headers.="From:".mb_encode_mimeheader("$nickname","utf-8")."<$email>\r\n";
$success = mail($to,$subject,$message,$headers);
if($success == true){
	echo "Your messages have been sent!";
}else{
	echo "Please try again!";
}
//set cookie
setcookie("mail","sent",time()+60*3);
}else if(@$_POST['userName']!='' && @$_COOKIE['mail']=='sent'){
 echo "Only can send email every 3 mins";
}
?>