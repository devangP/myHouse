<?php

Yii::import('application.extensions.phpmailer.JPhpMailer');

class Email {

    public static function send($address, $subject, $message) {
        // prepare
        $mail = new JPhpMailer;

        $mail->IsSMTP(); // telling the class to use SMTP   
        // get the smtp config
        $smtp = Yii::app()->params['smtp'];

        $mail->Host = $smtp['host'];
        $mail->Username = $smtp['username'];
        $mail->Password = $smtp['password'];
        $mail->SetFrom($smtp['from_email'], $smtp['from_name']);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        foreach ($address as $add) {
            //adding email to addresss
            $mail->AddAddress($add);
        }

        return $mail->Send();
    }

}