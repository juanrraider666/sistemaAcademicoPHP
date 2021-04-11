<?php


namespace App\Service\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class mailer extends configMailer
{
    private $mail;


    public function __construct()
    {
        parent::__construct();

        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $this->mail->isSMTP();                                            // Send using SMTP
        $this->mail->Host       = 'smtp.gmail.com';                // Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mail->Username   = $this->getMailFrom();                     // SMTP username
        $this->mail->Password   = $this->getPassword();                             // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = 587;

    }

    public function send(array $user, string $subject, string $nameTemplate)
    {
        $path = dirname(__FILE__ . "/", 4);
        $htmlContent = file_get_contents($path . "/assets/html/mail/$nameTemplate");

        try {
            //Recipients
            $this->mail->Debugoutput = '';
            $this->mail->SMTPDebug = false;
            $this->configParameters();
            $this->mail->addAddress($user['email'], $user['username']);     // Add a recipient

            // Content
            $this->mail->isHTML(true);                                  // Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $htmlContent;
            $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $this->mail->send();
           // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    private function configParameters()
    {
        $this->mail->setFrom($this->getMailFrom(), NAME_PROJECT);
    }
}