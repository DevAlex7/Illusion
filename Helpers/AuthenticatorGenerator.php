<?php 

    require_once('GoogleAuthenticator.php'); 

    class Authenticator {
        public static function getImageQR(){
            $authenticator = new PHPGangsta_GoogleAuthenticator();
            $code_secret = $authenticator->createSecret();
            $titulo = 'Googleauthenticator'; 

            $url_qr_code = $authenticator->getQRCodeGoogleUrl($titulo, $code_secret);

            $imageQR = "<img src='".$url_qr_code."'/>\n";
            return array(
                'Qr' => $imageQR,
                'secret' => $code_secret
            );
            
        }
    }
    
?>