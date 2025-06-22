<?php
include "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Dbh
{
    protected $host = "localhost";
    protected $user = "root";
    protected $pass = "";
    protected $dbname = "kindergarten";

    protected function connect()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        $pdo = new PDO($dsn, $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
class Mailer extends PHPMailer
{
    public function sendMail($request=null, $to,$name = null, $subject,$email = null, $body=null, $otp = null, $code = null)
    {
        $this->isSMTP();
        $this->Host = 'mail.yeahkenyan.com'; // Set the SMTP server to send through
        $this->SMTPAuth = true;
        $this->Username = 'learn@yeahkenyan.com';
        $this->Password = 'learn@yeahkenyan.com';
        $this->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->Port = 587;
        $this->CharSet = 'UTF-8';
        $this->isHTML(true);
        $this->SMTPDebug = 0; // Set to 2 for debugging output
        $this->Debugoutput = 'html'; // Output format for debugging

        $mailTemplate = file_get_contents('../mail-template.html');
        $mailTemplate = str_replace('{subject}', $subject. " - " . $name, $mailTemplate);
        $mailTemplate = str_replace('{message}', "Email: ".$email. "\n\n".$body, $mailTemplate);
        $mailTemplate = str_replace('{title}', 'Contact Form Submission', $mailTemplate);
        $mailTemplate = str_replace('{year}', date('Y'), $mailTemplate);

        $this->setFrom('learn@yeahkenyan.com', 'Yeah Kenyan Academy');
        $this->addAddress($to);
        $this->Subject = $subject;
        $this->Body = $mailTemplate;

        if (empty($body)) {
            error_log('Mailer Error: No message body provided.');
            return false;
        }

        if (!$this->send()) {
            error_log('Mailer Error: ' . $this->ErrorInfo);
            return false;
        }else{
            // Log successful email sending
            echo json_encode(["message" => "Hello $name. Email sent successfully to " . "Yeah Kenyan Academy"]);
        }

        return true;
    }
}
// send sample email
