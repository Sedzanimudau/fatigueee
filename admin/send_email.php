<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient = "support@inspectyourasset.com"; // Change this to your email address
    $subject = "New Support Email";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $headers = "From: $email";

    // Handle attachments
    $attachment = $_FILES["attachment"]["tmp_name"];
    if (!empty($attachment)) {
        $filename = $_FILES["attachment"]["name"];
        $file_content = file_get_contents($attachment);
        $file_encoded = base64_encode($file_content);
        $boundary = "boundary" . md5(time()); // Generate a unique boundary
        $headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
        $message = "--$boundary\r\nContent-Type: text/plain; charset=\"iso-8859-1\"\r\nContent-Transfer-Encoding: 7bit\r\n\r\n$message\r\n\r\n";
        $message .= "--$boundary\r\nContent-Type: application/octet-stream; name=\"$filename\"\r\nContent-Transfer-Encoding: base64\r\nContent-Disposition: attachment; filename=\"$filename\"\r\n\r\n$file_encoded\r\n\r\n";
        $message .= "--$boundary--";
    }

    if (mail($recipient, $subject, $message, $headers)) {
        echo "Email sent successfully!";
        header("Location: support.php"); // Redirect to success page
        exit;
    } else {
        echo "Email could not be sent.";
    }
}
?>
