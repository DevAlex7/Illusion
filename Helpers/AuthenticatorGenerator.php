<?php 
    session_start();
    require_once('GoogleAuthenticator.php');
    require_once('../Helpers/validator.php');
    require_once('../Backend/Instance/instance.php');
    require_once('../Backend/Models/Employees.php');

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

        public static function generateQR(){
                        
            $user = new Employee;
            $user->username($_SESSION['authUser']);
            
            $user->checkUsername();

            $authenticator = new PHPGangsta_GoogleAuthenticator();

            $code_secret = $user->getKey();

            $titulo = $user->getEmail(); 

            $url_qr_code = $authenticator->getQRCodeGoogleUrl($titulo, $code_secret);

            $imageQR = "<img src='".$url_qr_code."'/>\n";

            return array(
                'Qr' => $imageQR,
                'secret' => $code_secret,
                'key' => $user->getKey()
            );
                
        }
    }
    
?>