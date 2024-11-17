# Single Email Testing Sender

## Description

The **Single Email Testing Sender** plugin allows you to send a test email directly from your WordPress dashboard. This functionality is particularly useful for testing email configurations and sending quick notifications to verify that your SMTP settings are correctly configured.

## Features

- Specify a "From" email address.
- Specify a "To" email address.
- Enter a subject for the email.
- Write the body of the email.
- Send emails using your configured SMTP settings.

## Installation

1. Download the ZIP file for the plugin from the following link: https://github.com/mayurjobanputra/single-email-tester-wordpress/blob/main/single-email-testing-sender.zip
2. In your WordPress admin dashboard, navigate to **Plugins > Add New > Upload Plugin**.
3. Choose the downloaded ZIP file and click **Install Now**.
4. Once installed, activate the plugin through the 'Plugins' menu.

**Note:** It is recommended to install and configure the [WP Mail SMTP](https://en-ca.wordpress.org/plugins/wp-mail-smtp/) plugin or another SMTP plugin to send emails correctly. Ensure that your DNS settings are configured according to your email provider's requirements.

## Usage

1. Go to **Single Email Sender** in your WordPress admin dashboard.
2. Fill in the "From", "To", "Subject", and "Body" fields. 
   - **Important:** Use only the configured domain for the "From" email address to avoid issues with email delivery.
3. Click **Send Email** to send the test email.

## Requirements

- WordPress version 4.0 or later.
- WP Mail SMTP plugin configured with your email service.

## Contributing

Contributions are welcome! If you'd like to contribute to this project, please fork the repository and submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Author

- **Mayur Jobanputra**
- [GitHub Profile](https://github.com/mayurjobanputra)
