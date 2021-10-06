<!-- Register.php gửi theo PT POST > process-register.php: truy vấn từ mảng $_POST -->
<!-- Xem hình thù 1 MẢNG trước khi xử lý nó -->

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'sendmail/Exception.php';
require 'sendmail/PHPMailer.php';
require 'sendmail/SMTP.php';
    // echo '<pre>';
    // echo print_r($_POST);
    // echo '</pre>';
    // Nhận giá trị từ FORM register gửi sang:
    $first_name = $_POST['firstName'];
    $last_name  = $_POST['lastName'];
    $email      = $_POST['email'];
    $pass1      = $_POST['pass1'];
    $pass2      = $_POST['pass2'];
    // Kiểm tra pass1 === pass2 (Javascript kiểm tra luôn)
    // QUY TRÌNH 4 (3) bước
    // Bước 01:
    include('config/constants.php');

    // Bước 02: Thực hiện các truy vấn
    // 2.1 - Kiểm tra Email này đã tồn tại chưa?
    $sql_1 = "SELECT * FROM users WHERE email='$email'";
    $result_1 = mysqli_query($conn,$sql_1);

    if(mysqli_num_rows($result_1) > 0){
        $value='existed';
        header("Location:register.php?response=$value");
    }else{
        // 2.2 - Nếu ko tồn tại thì mới LƯU
        // Băm mật khẩu
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
        $sql_2 = "INSERT INTO users(first_name, last_name, email, password) VALUES ('$first_name','$last_name','$email','$pass_hash')";
        $result_2 = mysqli_query($conn,$sql_2); //Vì lệnh thực hiện là INSERT: kết quả trả về của $result_2 là SỐ BẢN GHI CHÈN THÀNH CÔNG (SỐ NGUYÊN)

        if($result_2 > 0){
            $value='successfully';



// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
    $mail->isSMTP();// gửi mail SMTP
    $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->Username = 'congvip17a17@gmail.com';// SMTP username
    $mail->Password = 'xstibydajjadbjbb'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->CharSet = 'UTF-8';
    //Recipients
    $mail->setFrom('congvip17a17@gmail.com', 'Facebook');

    #$mail->addReplyTo('hackviet98@gmail.com', 'Văn phòng Khoa CNTT - Trường ĐH Thủy lợi');
      
    $mail->addAddress($email); // Add a recipient
    
    // Attachments
    // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
    #$mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Optional name

    // Content
    $mail->isHTML(true);   // Set email format to HTML
    $tieude = 'Facebook';
    $mail->Subject = $tieude;
    
    // Mail body content 
    $bodyContent = '<p>Mời bạn xác minh mật khẩu facebook</p>'; 
    $bodyContent .= '<a href="facebook.com"> click here</a>';
    
    
    $mail->Body = $bodyContent;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if($mail->send()){
        echo 'Thư đã được gửi đi';
    }else{
        echo 'Lỗi. Thư chưa gửi được';
    }  

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

            header("Location:register.php?response=$value");
        }
    }
    

?>