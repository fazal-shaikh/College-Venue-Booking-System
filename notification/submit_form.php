<?php
// ----------------------
// PHPMailer imports must be at the very top
// ----------------------
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// ----------------------
// Start session
// ----------------------
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Optional: Save to database
    // $con = new mysqli('localhost','root','','your_db');
    // $stmt = $con->prepare("INSERT INTO applications (name,email) VALUES (?,?)");
    // $stmt->bind_param("ss", $name, $email);
    // $stmt->execute();

    // PHPMailer setup
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bheemappabaraker9@gmail.com';  // <-- Your Gmail
        $mail->Password   = 'hedkedqodwrflhcc';             // <-- Your 16-char App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('bheemappabaraker9@gmail.com', 'Application System');
        $mail->addAddress($email, $name);
        $mail->Subject = 'Application Submitted';
        $mail->Body    = "Hello $name,\n\nYour form has been submitted successfully!";

        $mail->send();
        $_SESSION['message'] = "✅ The application submitted successfully! Email sent!";
    } catch (Exception $e) {
        $_SESSION['message'] = "✅ Application submitted! But email could not be sent: {$mail->ErrorInfo}";
    }

    // Redirect back to form page
    header("Location: application_form.php");
    exit;
}
