<?php
require_once("include/dbcontroller.php");
$db_handle = new DBController();

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['newsletter'])) {
    $email = $db_handle->checkValue($_POST['email']);
    $pageName = $db_handle->checkValue($_POST['page']);

    $newsletter_insert = $db_handle->insertQuery("INSERT INTO `newsletter`( `email`) VALUES ('$email')");

    $subject = $db_handle->sender_name();

    $messege = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>MPLEXY Newsletter</title>
                </head>
                <body style="font-family: Arial, sans-serif; line-height: 1.6; background-color: #f4f4f4; margin: 0; padding: 0;">
                
                <div class="container" style="max-width: 600px; margin: 0 auto;background-color: #fff;">
                    <!-- Header -->
                    <div class="header" style="background-color: #000; color: #fff; text-align: center; padding: 10px;">
                        <h1 style="margin: 0;"><img src="https://mplexy.com/images/logo-inverse-238x56.png" alt="MPLEXY"/></h1>
                    </div>
                    <!-- Content -->
                    <div class="content" style="margin-bottom: 20px;padding: 20px;">
                        <p style="margin-bottom: 20px;">Dear User,</p>
                        <p style="margin-bottom: 20px;">I hope this email finds you well. I\'m excited to share with you the latest
                            edition of the MPLEXY newsletter, where we deliver valuable insights and updates in the world of digital
                            marketing.</p>
                        <p style="margin-bottom: 20px;">In this month\'s newsletter, we cover a variety of topics and services that may
                            interest you:</p>
                        <ul style="margin-bottom: 20px;">
                            <li>Search Engine Optimization (SEO)</li>
                            <li>Pay-Per-Click Advertising (PPC)</li>
                            <li>Social Media Marketing</li>
                            <li>Content Writing</li>
                            <li>Email Marketing</li>
                            <li>Analytics and Reporting</li>
                            <li>Website Design and Development</li>
                            <li>Graphic Design</li>
                            <li>Online Reputation Management</li>
                            <li>Advertising</li>
                            <li>Lead Generation</li>
                            <li>Web Research</li>
                        </ul>
                        <p style="margin-bottom: 20px;">Feel free to browse through our newsletter for valuable insights and updates in
                            the digital marketing landscape.</p>
                        <p style="margin-bottom: 20px;">For further information or inquiries about our services, please don\'t hesitate
                            to contact us: Phone: 1-646-631-1557 |
                    Email: <a href="mailto:contact@mplexy.com" style="color: #000;">contact@mplexy.com</a></p>
                    </div>
                    <!-- Footer -->
                    <div class="footer" style="background-color: #000; color: #fff; text-align: center; padding: 10px;">
                        <p style="margin: 0;">&copy; 2024 MPLEXY. All rights reserved.</p>
                    </div>
                </div>
                </body>
                </html>';

    $sender_name = $db_handle->sender_name();
    $sender_email = $db_handle->from_email();

    $username = $db_handle->from_email();
    $password = $db_handle->mail_pass();

    $receiver_email = $email;


    $mail = new PHPMailer(true);
    $mail->isSMTP();

    $mail->Host = $db_handle->mail_server();

    $mail->SMTPAuth = true;

    $mail->SMTPSecure = 'ssl';

    $mail->Port = 465;

    $mail->setFrom($sender_email, $sender_name);
    $mail->Username = $username;
    $mail->Password = $password;

    $mail->Subject = $subject;
    $mail->msgHTML($messege);
    $mail->addAddress($receiver_email);

    if ($mail->send()) {
        echo "MF000";
    } else {
        echo "Something Went Wrong";
    }
}else if (isset($_POST['contact'])) {
    $fname = $db_handle->checkValue($_POST['name']);
    $lname = $db_handle->checkValue($_POST['last-name']);
    $email = $db_handle->checkValue($_POST['email']);
    $phone = $db_handle->checkValue($_POST['phone']);
    $message = $db_handle->checkValue($_POST['message']);

    $contact_insert = $db_handle->insertQuery("INSERT INTO `contact`(`fname`, `lname`, `email`, `phone`, `message`) VALUES ('$fname','$lname','$email','$phone','$message')");

    $subject = $db_handle->sender_name();

    $messege = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>MPLEXY Contact</title>
                </head>
                <body style="font-family: Arial, sans-serif; line-height: 1.6; background-color: #f4f4f4; margin: 0; padding: 0;">
                
                <div class="container" style="max-width: 600px; margin: 0 auto;background-color: #fff;">
                    <!-- Header -->
                    <div class="header" style="background-color: #000; color: #fff; text-align: center; padding: 10px;">
                        <h1 style="margin: 0;"><img src="https://mplexy.com/images/logo-inverse-238x56.png" alt="MPLEXY"/></h1>
                    </div>
                    <!-- Content -->
                    <div class="content" style="margin-bottom: 20px;padding: 20px;">
                        <p style="margin-bottom: 20px;">Dear '.$fname.' '.$lname.',</p>
                        <p style="margin-bottom: 20px;">I hope this email finds you well. Thank you for reaching out to us! We\'ve
                            received your message and will get back to you as soon as possible. Your inquiry is important to us, and
                            we\'re committed to providing you with the assistance you need. If you have any urgent questions or concerns,
                            feel free to contact us directly at</p>
                        <p style="margin-bottom: 20px;">
                            <strong>Phone:</strong> 1-646-631-1557<br>
                            <strong>Email:</strong> <a href="mailto:contact@mplexy.com" style="color: #000;">contact@mplexy.com</a>
                        </p>
                        <p style="margin-bottom: 20px;">We cover a variety of topics and services that may
                            interest you:</p>
                        <ul style="margin-bottom: 20px;">
                            <li>Search Engine Optimization (SEO)</li>
                            <li>Pay-Per-Click Advertising (PPC)</li>
                            <li>Social Media Marketing</li>
                            <li>Content Writing</li>
                            <li>Email Marketing</li>
                            <li>Analytics and Reporting</li>
                            <li>Website Design and Development</li>
                            <li>Graphic Design</li>
                            <li>Online Reputation Management</li>
                            <li>Advertising</li>
                            <li>Lead Generation</li>
                            <li>Web Research</li>
                        </ul>
                        <p style="margin-bottom: 20px;">Feel free to browse through our websites for valuable insights and updates in
                            the digital marketing landscape. We appreciate your interest in our services and look forward to the opportunity to assist you.</p>
                    </div>
                    <!-- Footer -->
                    <div class="footer" style="background-color: #000; color: #fff; text-align: center; padding: 10px;">
                        <p style="margin: 0;">&copy; 2024 MPLEXY. All rights reserved.</p>
                    </div>
                </div>
                </body>
                </html>';

    $sender_name = $db_handle->sender_name();
    $sender_email = $db_handle->from_email();

    $username = $db_handle->from_email();
    $password = $db_handle->mail_pass();

    $receiver_email = $email;


    $mail = new PHPMailer(true);
    $mail->isSMTP();

    $mail->Host = $db_handle->mail_server();

    $mail->SMTPAuth = true;

    $mail->SMTPSecure = 'ssl';

    $mail->Port = 465;

    $mail->setFrom($sender_email, $sender_name);
    $mail->Username = $username;
    $mail->Password = $password;

    $mail->Subject = $subject;
    $mail->msgHTML($messege);
    $mail->addAddress($receiver_email);

    if ($mail->send()) {
        echo "MF000";
    } else {
        echo "Something Went Wrong";
    }
} else {
    echo "<script>
                window.location.href='404';
                </script>";
}