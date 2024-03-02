<?php
include_once "../dbConfig/dbconnect.php";
include_once "../authentication/auth.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../php-mailer/src/Exception.php';
require '../php-mailer/src/PHPMailer.php';
require '../php-mailer/src/SMTP.php';

if(isset($_POST['submit'])) {
    $equipment_name = $_POST['equipment_name'];
    $date_of_appointment = $_POST['date_of_appointment'];
    $details_of_equipment = $_POST['details_of_equipment'];
    $budget = $_POST['budget'];
    $admin_contact = $_POST['admin_contact'];
    $admin_name = $_POST['admin_name'];
    $maintenance_name = $_POST['maintenance_name'];
    $maintenance_email = $_POST['maintenance_email'];
    $contact_number = $_POST['contact_number'];
    $request_ID = $_GET['request_ID'];

    $maintenance_query = "INSERT INTO maintenance_contact (request_ID, maintenance_name, maintenance_email, contact_number, admin_contact, admin_name) 
                         VALUES ('$request_ID', '$maintenance_name', '$maintenance_email', '$contact_number', '$admin_contact', '$admin_name')";
    $maintenance_result = $conn->query($maintenance_query);

    $budget_query = "INSERT INTO budget (request_ID, budget, equipment_name, details_of_equipment, equip_img) 
                     VALUES ('$request_ID', '$budget', '$equipment_name', '$details_of_equipment', '$equip_img')";
    $budget_result = $conn->query($budget_query);

    if($maintenance_result && $budget_result) {
        
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'pawtingkasan20@gmail.com'; 
            $mail->Password = 'ixgx velx feaw sgit';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('pawtingkasan20@gmail.com'); 
            $mail->addAddress($maintenance_email);

            $mail->isHTML(true);
            $mail->Subject = "Maintenance Request";
            $mail->Body = "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Maintenance Request</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f2f2f2;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            max-width: 600px;
                            margin: 20px auto;
                            padding: 20px;
                            background-color: #ffffff;
                            border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            text-align: center;
                        }
                        .header {
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            margin-bottom: 20px;
                        }
                        .logo {
                            width: auto;
                            height: 70px; 
                        }
                        .content {
                            text-align: left;
                        }
                        .footer {
                            margin-top: 20px;
                            text-align: left;
                        }
                        hr {
                            border: none;
                            border-top: 1px solid #ddd;
                            margin: 20px 0;
                        }
                        p {
                            font-size: 14px;
                            line-height: 1.6;
                            margin: 10px 0;
                        }
                        strong {
                            font-weight: bold;
                        }

                        .header-content {
                            flex-grow: 1;
                            text-align: center;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <img src='https://drive.google.com/uc?export=view&id=1pTJhLj_6Eqg1l-TwCTQP1q955iNratFX' alt='Logo Left' class='logo'>
                            <div class='header-content'>
                                <p>Western Mindanao State University <br> College of Medicine <br> National Road, Baliwasan, Zamboanga City</p>
                                <h2>Appointment Maintenance Request</h2>
                            </div>
                            <img src='https://drive.google.com/uc?export=view&id=1cMPyfzCR8XWfoJnvIeGlZjsnU_w9XFWW' alt='Logo Right' class='logo'>
                        </div>
                        <div class='content'>
                            <p><strong>Good day $maintenance_name,</strong></p>
                            <p>I am writing this maintenance request on behalf of College of Medicine at Western Mindanao State University to request equipment maintenance. The details of the request are as follows:</p>
                            <div>
                                <p><strong>Equipment:</strong> $equipment_name</p>
                                <p><strong>Issue:</strong> $details_of_equipment</p>
                                <p><strong>Budget:</strong> ₱$budget</p>
                                <p><strong>Appointment Date:</strong> $date_of_appointment</p>
                            </div>
                            <hr>
                            <p>We kindly request that you confirm this date and provide us with a time slot that works best for your team.</p>
                        </div>
                        <div class='footer'>
                            <div>
                                <p><strong>Sender:</strong> $admin_name</p>
                                <p><strong>School:</strong> Western Mindanao State University</p>
                                <p><strong>Contact Number:</strong> $admin_contact</p>
                            </div>
                            
                            <p>Thank you for your attention to this matter. We appreciate your prompt response and assistance.</p>
                            <p><strong>Sincerely,</strong></p>
                            <p>$admin_name</p>
                        </div>
                    </div>
                </body>
                </html>
            ";

            $equip_img = $row['equip_img'];
            if (!empty($equip_img)) {
                $mail->addAttachment("../uploads/$equip_img");
            }

            $mail->send();
            echo "Email sent successfully.";
        } catch (Exception $e) {
            echo "Failed to send email. Error: {$e->getMessage()}";
        }

        header("Location: ../admin panel/approveAppointment.php?request_ID={$request_ID}&id={$userID}");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Form submission error.";
}
?>
