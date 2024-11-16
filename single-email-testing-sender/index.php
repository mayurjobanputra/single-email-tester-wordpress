<?php
/*
Plugin Name: Single Email Testing Sender
Plugin URI: http://yourwebsite.com/
Description: A simple plugin to send a single email for testing purposes.
Version: 1.0
Author: Your Name
Author URI: http://yourwebsite.com/
*/

// Add a menu item to the WordPress admin
function set_single_email_menu() {
    add_menu_page('Single Email Sender', 'Single Email Sender', 'manage_options', 'single-email-sender', 'single_email_form');
}

add_action('admin_menu', 'set_single_email_menu');

// Create the form to send email
function single_email_form() {
    ?>
    <h2>Send a Single Test Email</h2>
    <form method="post" action="">
        <p>
            <label for="from_email">From:</label>
            <input type="email" name="from_email" id="from_email" required>
        </p>
        <p>
            <label for="to_email">To:</label>
            <input type="email" name="to_email" id="to_email" required>
        </p>
        <p>
            <label for="email_subject">Subject:</label>
            <input type="text" name="email_subject" id="email_subject" required>
        </p>
        <p>
            <label for="email_body">Body:</label>
            <textarea name="email_body" id="email_body" required></textarea>
        </p>
        <p>
            <input type="submit" name="send_email" value="Send Email">
        </p>
    </form>
    <?php
    send_single_email();
}

// Handle the email sending
function send_single_email() {
    if (isset($_POST['send_email'])) {
        $to = sanitize_email($_POST['to_email']);
        $subject = sanitize_text_field($_POST['email_subject']);
        $body = sanitize_textarea_field($_POST['email_body']);
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . sanitize_email($_POST['from_email']));

        if (wp_mail($to, $subject, $body, $headers)) {
            echo '<div>Message sent successfully!</div>';
        } else {
            echo '<div>Failed to send the message.</div>';
        }
    }
}

?>
