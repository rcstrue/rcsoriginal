<?php
// Contact PHP Script

header('Content-Type: application/json');

// Allow only POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ✅ Safe input handling (NO warnings)
    $name = htmlspecialchars(trim($_POST['userName'] ?? ''), ENT_QUOTES, 'UTF-8');
    $emailRaw = trim($_POST['userEmail'] ?? '');
    $email = filter_var($emailRaw, FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject'] ?? ''), ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars(trim($_POST['content'] ?? ''), ENT_QUOTES, 'UTF-8');

    // ✅ Validation
    $errors = [];

    if (empty($name)) {
        $errors['name'] = 'Please enter your name.';
    }

    if (empty($emailRaw)) {
        $errors['email'] = 'Please enter an email address.';
    } elseif ($email === false) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    if (empty($subject)) {
        $errors['subject'] = 'Please enter a subject.';
    }

    if (empty($message)) {
        $errors['message'] = 'Please enter a message.';
    }

    // ✅ If no errors → send email
    if (empty($errors)) {

        $to = 'rcstruefacilities@yahoo.com';

        // ✅ Proper headers
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // ✅ Email body (better format)
        $body = "You have received a new message:\n\n";
        $body .= "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Subject: $subject\n\n";
        $body .= "Message:\n$message\n";

        // ✅ Send mail
        if (mail($to, $subject, $body, $headers)) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Thank you for contacting us. We will reach you shortly.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Error sending email. Please try again later.'
            ]);
        }

    } else {
        // ✅ Return validation errors
        echo json_encode([
            'status' => 'error',
            'errors' => $errors
        ]);
    }

} else {
    // ❌ Invalid request method
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.'
    ]);
}
?>