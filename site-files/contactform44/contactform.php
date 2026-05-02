<?php
if (!empty($_POST["send"])) {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST["userName"]));
    $email = filter_var(trim($_POST["userEmail"]), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $content = htmlspecialchars(trim($_POST["content"]));

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email address.";
        $type = "error";
    } else {
        $toEmail = "realcareservices@yahoo.com";
        $mailHeaders = "From: " . $name . " <" . $email . ">\r\n";
        $mailHeaders .= "Reply-To: " . $email . "\r\n";
        $mailHeaders .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($toEmail, $subject, $content, $mailHeaders)) {
            $message = "Your contact information has been received successfully.";
            $type = "success";
        } else {
            $message = "Failed to send your message. Please try again later.";
            $type = "error";
        }
    }
}

require_once "contact-view.php";
?>
