<?php 

    require_once 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to, $from, $content)
            $key = '';
            
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email)
            }


    }

?>