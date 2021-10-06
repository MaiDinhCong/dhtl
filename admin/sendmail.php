<?php
$to_email = "congvip17a17@gmail.com";
$subject = "Chúc mừng bạn đã đăng ký thành công tài khoản tại website chúng tôi";
$body = "Chúc mừng bạn đã đăng ký thành công tài khoản tại website chúng tôi";
$body .="Vui lòng click vào link này để kích hoạt tài khoản";
$headers = "From: sender\'s email";

if (mail($to_email, $subject, $body, $headers)) {
echo "Email successfully sent to $to_email...";
} else {
echo "Email sending failed...";
}
?>