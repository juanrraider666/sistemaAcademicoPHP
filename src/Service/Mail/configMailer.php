<?php


namespace App\Service\Mail;


class configMailer
{
    /**
     * @var string
     */
    private $password;
    private $mailFrom;

    public function __construct()
    {
        $this->mailFrom = MAIL_CONFIG['email'];
        $this->password = MAIL_CONFIG['password'];
    }


    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


    /**
     * @return mixed
     */
    public function getMailFrom()
    {
        return $this->mailFrom;
    }


}