<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/PHPMailerAutoload.php';

// 创建一个新的PHPMailer实例
$mail = new PHPMailer();

// 邮件服务器设置
$mail->isSMTP();                                      // 设置邮件使用SMTP协议
$mail->Host = 'smtp.gmail.com';                       // 使用Google的SMTP服务器
$mail->SMTPAuth = true;                               // 启用SMTP认证
$mail->Username = 'your_gmail@gmail.com';            // 您的Gmail地址
$mail->Password = 'your_gmail_password';              // 您的Gmail密码
$mail->SMTPSecure = 'tls';                            // 启用TLS加密
$mail->Port = 587;                                    // SMTP服务器的端口号

// 邮件设置
$name = $_POST['name'];
$email = $_POST['email'];

$mail->setFrom($email, $name);  // 使用表单中提供的发件人地址和姓名
$mail->addAddress('yuchiao0129@gmail.com', 'Recipient Name');   // 设置收件人地址和名称
$mail->isHTML(true);                                  // 启用HTML格式

// 邮件主题和内容
$mail->Subject = '您收到一条新消息';
$mail->Body    = '姓名：' . $name . '<br>邮箱：' . $email . '<br>消息：' . $_POST['message'];

// 发送邮件
if ($mail->send()) {
    echo '邮件已成功发送';
} else {
    echo '邮件发送失败：' . $mail->ErrorInfo;
}
?>
