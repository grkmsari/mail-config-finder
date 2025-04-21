<?php
header('Content-Type: application/json');

// Autoload PHPMailer
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$response = ['success' => false, 'message' => 'Unknown error occurred.'];

try {
    // Form verilerini al
    $host       = $_POST['host'] ?? '';
    $port       = $_POST['port'] ?? 587;
    $username   = $_POST['username'] ?? '';
    $password   = $_POST['password'] ?? '';
    $encryption = $_POST['encryption'] ?? 'tls';
    $to         = $_POST['to'] ?? '';
    $subject    = $_POST['subject'] ?? 'SMTP Test';
    $message    = $_POST['message'] ?? 'This is a test email from Mail Config Finder.';

    // Basit validasyon
    if (!$host || !$username || !$password || !$to) {
        throw new Exception("Please fill all required fields.");
    }

    // PHPMailer başlat
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = $host;
    $mail->SMTPAuth   = true;
    $mail->Username   = $username;
    $mail->Password   = $password;
    $mail->Port       = (int)$port;

    // Şifreleme türü kontrolü
    if ($encryption === 'tls') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    } elseif ($encryption === 'ssl') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    } elseif ($encryption === 'none') {
        $mail->SMTPSecure = false;
        $mail->SMTPAutoTLS = false;
    }

    $mail->setFrom($username, 'Mail Config Finder');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();

    $response['success'] = true;
    $response['message'] = "✅ Mail sent successfully!";
} catch (Exception $e) {
    $response['message'] = "❌ Error: " . $e->getMessage();
}

echo json_encode($response);
