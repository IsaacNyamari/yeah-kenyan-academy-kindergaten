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
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        return $conn;
    }
}
class Mailer extends PHPMailer
{
    public function sendMail($request = null, $to, $name = null, $subject, $email = null, $body = null, $otp = null, $code = null)
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
        $mailTemplate = str_replace('{subject}', $subject . " - " . $name, $mailTemplate);
        $mailTemplate = str_replace('{message}', "Email: " . $email . "\n\n" . $body, $mailTemplate);
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
        } else {
            // Log successful email sending
            echo json_encode(["message" => "Hello $name. Email sent successfully to " . "Yeah Kenyan Academy"]);
        }

        return true;
    }
}
class User extends Dbh
{
    public function viewUsers($user_id = null, $table)
    {
        $conn = $this->connect();
        $sql = "SELECT * from `$table`";
        $stmt = mysqli_prepare($conn, $sql);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                $user_details = mysqli_fetch_all($result, 1);
                return $user_details;
            }
        }
    }
    public function timeTables()
    {
        $conn = $this->connect();
        $sql = "SELECT * from `time-tables`";
        $stmt = mysqli_prepare($conn, $sql);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                $time_tables_details = mysqli_fetch_all($result, 1);
                return $time_tables_details;
            }
        }
    }
}


$timetable = json_encode(
    [
        "class" => "form 1",
        "subject" => "Mathematics",
        "time" => "08:00- 09:00",
        "teacher"=>"Isaac Nyamari"
    ]
);
