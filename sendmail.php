<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if (isset($_POST['submit'])) {

        $email = $_POST['email']; //Mendapatkan inputan email dari form
        $name = $_POST['name']; //Mendapatkan inputan nama dari form
        $message = $_POST['message']; //Mendapatkan inputan nama dari form

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'Emailanda@gmail.com';
            $mail->Password   = 'PassAnda';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('Emailanda@gmail.com', 'Pesan dari Form');
            $mail->addAddress("$email");
            $mail->addReplyTo('no-reply@gmail.com', 'NO Reply');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Input dari Form';
            $mail->Body    = "<h1>Kamu telah mengisi formulir</h1> Nama kamu adalah $nama";
            $mail->AltBody = 'Data formulir';

            $mail->send();
            echo "Data dari Formulir HTML";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    else {
        echo "Silakan submit terlebih dahulu";
    }
?>
