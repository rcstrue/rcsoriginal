<?php
// Contact PHP Script

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate user input (Improved)
    $name = htmlspecialchars(trim($_POST['userName']), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($_POST['userEmail']), FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']), ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars(trim($_POST['content']), ENT_QUOTES, 'UTF-8');

    // Check for errors (More Robust)
    $errors = [];
    if (empty($name)) {
        $errors['name'] = 'Please enter your name.';
    }
    if (empty($email)) {
        $errors['email'] = 'Please enter an email address.';
    } elseif ($email === false) {  // Check for *actual* validation failure
        $errors['email'] = 'Please enter a *valid* email address.';
    }
    if (empty($subject)) {
        $errors['subject'] = 'Please enter a subject.';
    }
    if (empty($message)) {
        $errors['message'] = 'Please enter a message.';
    }

    // If no errors, send the email
    if (empty($errors)) {
        $to = 'rcstruefacilities@yahoo.com'; // Your email address
        $headers = [
            'From' => $email,      // User's email
            'Reply-To' => $email,  // User's email
        ];

        // Correct mail() usage (headers as a string)
        $sent = mail($to, $subject, $message, implode("\r\n", $headers));

        // Return a JSON response (Better for AJAX)
        header('Content-Type: application/json');
        if ($sent) {
            echo json_encode(['status' => 'success', 'message' => 'Thank You for contacting us, We will be reach you shortly, or you can directly contact us on 0261-2215264']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error sending email.']);
        }
    } else {
        // Return JSON errors
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'errors' => $errors]);
    }
} else {
    // Return JSON for invalid request
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>