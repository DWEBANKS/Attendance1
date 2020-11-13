<?php
    require 'vendor/autoload.php';

    class SendEmail{

        public static function SendMail($to,$subject,$content){
            $key = 'SG._MusLLG2SM6px9VXbxvJlw.xtsWjBIO2AQ_6Ow2-IprEyPCOxRXpaoI2xXxyaRbwpE';

            $email = new\SendGrid\Mail\Mail();
            $email ->setFrom("dowenebanks30@gmail.com", "Dowen Ebanks");
            $email ->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);

            $sendgrid = new\SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Eception $e){
                echo 'Email exception caught: '. $e->getMessage()."\n";
                return false;
            }
        }
    }
?>