<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validation
    $errors = [];

    if (empty($name) || strlen($name) < 4) {
        $errors[] = "❌ Please enter your name.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "❌ Please enter a valid email address.";
    }

    if (empty($subject) || strlen($subject) < 4) {
        $errors[] = "❌ Please enter a subject.";
    }

    if (empty($message) || strlen($message) < 8) {
        $errors[] = "❌ Please enter a message with at least 8 characters.";
    }

    if (!empty($errors)) {
        echo '<div class="error-box">';
        foreach ($errors as $error) {
            echo '<p class="error-text">' . $error . '</p>';
        }
        echo '</div>';
        exit;
    }

    // If no errors, return success message
    echo '<div class="success-box">✅ Your message has been sent successfully!</div>';
}
?>
