<?php

// require('./phpmailer/PHPMailerAutoload.php');
require('../../../../script/vendor/phpmailer/PHPMailerAutoload.php');
// require('../../../../config/path_server.php');
require('../../../../config/connectdb.php');


if (isset($_POST['key']) && $_POST['key'] == 'resetPass') {

    // $host = "http://" . _HOST . "/" . _FOLDER;

    $e_mail_roasters = $_POST['e_mail_roasters'];
    $num_trade_reg = $_POST['num_trade_reg'];

    header('Content-Type: text/html; charset=utf-8');

    $mail = new PHPMailer;
    $mail->CharSet = "utf-8";
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;


    $gmail_username = "sompholwila2543@gmail.com"; // gmail ที่ใช้ส่ง
    $gmail_password = "!Somphol2543"; // รหัสผ่าน gmail
    // ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1


    $sender = "Customer Service Support"; // ชื่อผู้ส่ง
    $email_sender = "sompholwila2543@gmail.com"; // เมล์ผู้ส่ง 
    $email_receiver = "$e_mail_roasters"; // เมล์ผู้รับ ***

    $subject = "ลืมรหัสผ่าน"; // หัวข้อเมล์

    $sql_roasters = "SELECT * FROM `roasters` WHERE `e_mail_roasters` ='$e_mail_roasters' AND `num_trade_reg` ='$num_trade_reg'";

    $row = null;
    try {
        if ($result = Database::query($sql_roasters, PDO::FETCH_ASSOC)) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $count = $result->rowCount();
            if($count > 0 || $count != null) {
                $mail->Username = $gmail_username;
                $mail->Password = $gmail_password;
                $mail->setFrom($email_sender, $sender);
                $mail->addAddress($email_receiver);
                $mail->Subject = $subject;
    
                $email_content = "
    
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset=utf-8'/>
                        <title>ลืมรหัสผ่านเข้าสู่ระบบ</title>
                    </head>
                    <body>
                        <div style='padding:20px;'>
                            <div>				
                                <h2>รหัสผ่าน สำหรับ คุณ : <strong style='color:#0000ff;'>{$row['name_roasters']}</strong> คือ </h2>
                                <h1><strong style='color:#3c83f9;'> >> {$row['pass_roasters']} << </strong></h1>
                            </div>
                            <div style='margin-top:30px;'>
                                <hr>
                                <address>
                                    <h4>ติดต่อสอบถาม</h4>
                                    <p>SOMPHOL WILA</p>
                                    <p>www.facebook.com/somphol.wila</p>
                                </address>
                            </div>
                        </div>
                        <div style='background: #3b434c;color: #a2abb7;padding:30px;'>
                            <div style='text-align:center'> 
                                2021 © SOMPHOL WILA
                            </div>
                        </div>
                    </body>
                </html>
            ";
                //  ถ้ามี email ผู้รับ
                if ($email_receiver) {
                    $mail->msgHTML($email_content);
    
    
                    if (!$mail->send()) {  // สั่งให้ส่ง email
                        // กรณีส่ง email ไม่สำเร็จ
                        echo "ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง";
                        echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
                    } else {
                        // กรณีส่ง email สำเร็จ
                        echo "success";
                    }
                }
            }else{
                echo "กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง";
            }

            
        }
    } catch (Exception $e) {
        echo "Exception Error: " . $e->getMessage() . "\n";
    }
}
