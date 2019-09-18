<?php 
class Mail{
    public function sendEmail($email,$username, $message){
        $headers='';
        
        $from = 'illusiondistributor@gmail.com';
        $body=$username.' Has iniciado sesión';
        $headers .= 'To: ' .$email. "\r\n";
        $headers .= 'From: ' .$from. "\r\n";

        mail($email,'Alerta',$body, $headers);
    }
}
?>