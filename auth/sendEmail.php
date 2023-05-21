<?php

include('../lib/PHPMailer-master/src/PHPMailer.php');
include('../lib/PHPMailer-master/src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function send_email($email, $fullname, $url_verify)
{
  $mail = new PHPMailer();

  // Thiết lập thông tin SMTP
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = "leebui.98@gmail.com";                     //SMTP username
  $mail->Password   = 'ctuwwelyyhabfmhe';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  // Thiết lập thông tin người gửi và email nhận
  $mail->setFrom('leebui.98@gmail.com', 'Leebui.98');
  $mail->addAddress($email, $fullname);
  $mail->isHTML(true);
  $mail->CharSet = "UTF-8";

  // Thiết lập tiêu đề và nội dung email
  $mail->Subject = 'Xác thực tài khoản.';
  $mail->Body    = '<h1>Xác thực tài khoản</h1>
  <p>Xin chào. ' . $fullname . '</p>
  <p>Bạn nhận được email này vì đã đăng ký trên website apple của chúng tôi</p>
  <p style="color: red">Nếu những thông tin trên là chính xác. Vui lòng click vào link bên dưới để xác nhận và hoàn tất thủ tục xác thực tài khoản</>
  <div><a href=' . $url_verify . ' target="_blank"><strong>Link xác nhận</strong></a></div><br>
  <div><strong><i>Xin chân thành cảm ơn!</i></strong></div>';

  // Gửi email
  if (!$mail->send()) {
    return false;
  } else {
    return true;
  }
}
