<?php

class Utilities
{
    public static function ConvertDate($date)
    {
        $dt = strtotime($date);
        return date('d M Y', $dt);

    }

    public static function sendMail($to, $subject, $body)
    {
        $headers = array(
            'Organization'=>'saral gyan',
            'MIME-Version'=>'1.0',
            'Content-type'=>'text/html',
             'X-Priority' => '3',
            'X-Mailer' => 'PHP/' . phpversion()
        );
        $mail = mail($to, $subject, $body, $headers);
        return $mail;
    }

    public static function getMail($from, $subject, $body)
    {
        $headers = array(
            'Organization'=>'saral gyan',
            'MIME-Version'=>'MIME-Version:1.0',
            'Content-type'=>'text/html',
            'charset'>'iso-8859-1',
            'From' => "{$from}",
            'Reply-To' => "{$from}",
            'X-Priority' => '3',
            'X-Mailer' => 'PHP/' . phpversion()
        );
        $mail = mail("info@scholarmaterials.com", $subject, $body, $headers);
        return $mail;
    }
}