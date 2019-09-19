<?php 
class Mail{
    public function sendEmail($email,$username, $message){
        $headers='';
        
        $from = 'illusiondistributor@gmail.com';
        $body= $username.' Has iniciado sesión';
        $headers .= 'To: ' .$email. "\r\n";
        $headers .= 'From: ' .$from. "\r\n";

        mail($email,'Alerta',$body, $headers);
    }
    public function sendCodeVerification($email,$message){
        $headers='';
        $from = 'illusiondistributor@gmail.com';
        $body= $message;

        $headers .= 'To: ' .$email. "\r\n";
        $headers .= 'From: ' .$from. "\r\n";

        mail($email,'Codigo de verificación',$body, $headers);
    }
}
?>