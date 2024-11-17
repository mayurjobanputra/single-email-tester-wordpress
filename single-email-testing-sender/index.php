<?php
/*
Plugin Name: Single Email Testing Sender
Plugin URI: https://github.com/mayurjobanputra/single-email-tester-wordpress/
Description: A simple plugin to send a single email for testing purposes.
Version: 1.0
Author: Mayur Jobanputra
Author URI: https://github.com/mayurjobanputra
*/

// Add a menu item to the WordPress admin
function set_single_email_menu() {
    add_menu_page('Single Email Sender', 'Single Email Sender', 'manage_options', 'single-email-sender', 'single_email_form');
}
add_action('admin_menu', 'set_single_email_menu');

// Enqueue custom admin styles
function single_email_enqueue_styles() {
    wp_enqueue_style('single-email-styles', plugin_dir_url(__FILE__) . 'css/style.css');
}
add_action('admin_enqueue_scripts', 'single_email_enqueue_styles');

// Create the form to send email
function single_email_form() {
    ?>
    <div class="wrap single-email-sender">
        <h2>Send a Single Test Email</h2>
        <p>
            To use this plugin, you should first install and configure the 
            <a href="https://en-ca.wordpress.org/plugins/wp-mail-smtp/" target="_blank">WP Mail SMTP</a> plugin 
            or another SMTP plugin of your choice. Make sure to also modify your DNS settings as required by your email provider.
        </p>
        <p>
            I personally use Brevo to send emails through their SMTP server, as I'm accustomed to it.
            <strong>Note:</strong> It is recommended to use only the configured domain for the "From" email address to avoid issues with email delivery.
        </p>
        <form method="post" action="">
            <p>
                <label for="from_email">From:</label>
                <input type="email" name="from_email" id="from_email" placeholder="you@yourdomain.com" required>
            </p>
            <p>
                <label for="to_email">To:</label>
                <input type="email" name="to_email" id="to_email" placeholder="recipient@example.com" required>
            </p>
            <p>
                <label for="email_subject">Subject:</label>
                <input type="text" name="email_subject" id="email_subject" placeholder="Email Subject" required>
            </p>
            <p>
                <label for="email_body">Body:</label>
                <textarea name="email_body" id="email_body" rows="8" placeholder="Type your message here..." required></textarea>
            </p>
            <p>
                <input type="submit" name="send_email" value="Send Email">
            </p>
        </form>
    </div>
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
            echo '<div class="success-message">Message sent successfully!</div>';
        } else {
            echo '<div class="error-message">Failed to send the message.</div>';
        }
    }
}
?>
