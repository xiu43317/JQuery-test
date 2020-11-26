<?php
include("./PHPMailer/PHPMailerAutoload.php");

$subject = $_POST['userName']." 's requirement";
$body =
"Your Messages:<br>". 
$_POST['content'].
"<hr>"
."<p>Hello! ".$_POST['userName']."</p>"
."<p>We has receieved your requirement and will reply to your email</P>"
.$_POST['email'];



$mail = new PHPMailer();
//讓phpmailer 不要自動使用SSL連線(適用於PHP 5.6以上，非5.6可不用這段)
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->IsSMTP(); // set mailer to use SMTP
$mail->CharSet = "utf-8";
$mail->Encoding = "base64";
$mail->FromName =$_POST['userName'];
$mail->Host ="ssl://smtp.gmail.com";
$mail->Port = 465; //default is 25, gmail is 465 or 587
$mail->SMTPAuth = true;
$mail->Username = "";//your email
$mail->Password = "";//your email password
$mail->setFrom = $_POST['email'];
$mail->AddAddress("");//收件者
//Attachments
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->AddBCC($_POST['email']);//密件副本收件者
//$mail->AddBCC("xxxx@gmail.com");//密件副本收件者
$mail->WordWrap = 50; // 50 words per line
$mail->IsHTML(true);
$mail->Subject = $subject;
//$mail->Body = $body;//使用 body 也可以加入內文，但不支援 html
$mail->MsgHTML($body);
if(!$mail->Send())
{
echo "Email fails to be sent";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}else{
    echo "Your messages have already been sent";
}

?>