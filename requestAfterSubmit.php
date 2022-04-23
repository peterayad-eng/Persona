<?php
    require_once "connect.php";	

    $robotest = $_POST['verifyingcode'];
    $lang = $_POST['lang'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($robotest){
        $log = "3101\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_POST['name']." \tA robot has tried to send mail that contain orgname: '". $_POST['orgname']."',  Mobile: '". $_POST['mobile']."', Mail: '".$_POST['mail']."', Service: '".$_POST['ser']."', Type: '".$_POST['type']."', and Verifying Code: '".$robotest."' \n";
        file_put_contents('./Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
        if($lang == 'ar'){
            header("location: ar/index?serror=2/#application");
            exit;
        }else{
            header("location: index?serror=2/#application");
            exit;
        }
    }else if(!isset($_POST['name']) || empty($_POST['name']) || !isset($_POST['orgname']) || empty($_POST['orgname']) || !isset($_POST['mobile']) || empty($_POST['mobile']) || !isset($_POST['ser']) || empty($_POST['ser']) || !isset($_POST['mail']) || empty($_POST['mail']) || !isset($_POST['type']) || empty($_POST['type'])){
        $log = "3102\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_POST['name']." \tSomeone has tried to send mail that that contain orgname: '". $_POST['orgname']."',  Mobile: '". $_POST['mobile']."', Mail: '".$_POST['mail']."', Service: '".$_POST['ser']."', Type: '".$_POST['type']."' \n";
        file_put_contents('./Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
        if($lang == 'ar'){
            header("location: ar/index?serror=2/#application");
            exit;
        }else{
            header("location: index?serror=2/#application");
            exit;
        }
    }else if($_POST['type'] != 'Website' && $_POST['type'] != 'Webapp'){
        $log = "3102\tWarning \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_POST['name']." \tSomeone has tried to send mail that that contain orgname: '". $_POST['orgname']."',  Mobile: '". $_POST['mobile']."', Mail: '".$_POST['mail']."', Service: '".$_POST['ser']."', Type: '".$_POST['type']."' \n";
        file_put_contents('./Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
        if($lang == 'ar'){
            header("location: ar/index?serror=2/#application");
            exit;
        }else{
            header("location: index?serror=2/#application");
            exit;
        }
    }else{
	  	if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) === false){
            $email = test_input($_POST['mail']);
        }else{
            $log = "4102\tError \t".$ip." \t".date('Y-m-d H:i:s')." \t".$_POST['name']." \tThe user has inserted an invalid email address '". $_POST['mail']."' \n";
            file_put_contents('./Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            if($lang == 'ar') {
                header("location: ar/index?serror=3/#application");
                exit;
            }else{
                header("location: index?serror=3/#application");
                exit;
            }
        }
        
        $name = test_input(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
        $orgname = test_input(filter_var($_POST['orgname'], FILTER_SANITIZE_STRING));
        $mobile = test_input(filter_var($_POST['mobile'], FILTER_SANITIZE_STRING));
        $ser = test_input(filter_var($_POST['ser'], FILTER_SANITIZE_STRING));
        $req = test_input(filter_var($_POST['type'], FILTER_SANITIZE_STRING));
        $message = '<p>'.$req.' request: </p> <p style="padding-left:5em"> Name: '.$name.'<br> Organization Name: '.$orgname.'<br> E-Mail: '.$email.'<br> Mobile No.: '.$mobile.'<br> Request: '.$ser.'</p>';
        
        $body = '<html>'; 
        $body .= '<body style="font-family:Verdana, Verdana, Geneva, sans-serif; font-size:12px; color:#666666;">';
        $body = $message; 
        $body .= '</body>'; 
        $body .= '</html>';

        $sending_mail = 'info@persona-eg.com';
        $cipher = "aes-256-cbc";
        
        $connec = new con();

        $select_sql = $connec->query('SELECT * FROM mail WHERE username= ?', $sending_mail)->fetchArray();
        $c = base64_decode($select_sql['c']);
        $h = $select_sql['username'].$select_sql['id'];
        
        $pass = openssl_decrypt($select_sql['pass'], $cipher, $h, $options=0, $c);

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.persona-eg.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = TRUE;                                   //Enable SMTP authentication
        $mail->Username   = $sending_mail;                     //SMTP username
        $mail->Password   = $pass;                               //SMTP password
        $mail->SMTPSecure = 'ssl';             //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        $mail->isHTML(true);
        $mail->AddAddress($sending_mail, 'Persona');
        $mail->SetFrom($sending_mail, $name);
        $mail->Subject = 'New Request';
        $mail->Body = $body;
        
        $connec->close();
    
        if(!$mail->Send()) {
            $log = "4101\tError \t".$ip." \t".date('Y-m-d H:i:s')." \t".$name." \tAn email could not be sent with content orgname: '". $_POST['orgname']."',  Mobile: '". $_POST['mobile']."', Mail: '".$_POST['mail']."', Service: '".$_POST['ser']."', Type: '".$_POST['type']."' \n";
            file_put_contents('./Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            var_dump($mail);
            if($lang == 'ar'){
                header("location: ar/index?serror=2/#application");
                exit;
            }else{
                header("location: index?serror=2/#application");
                exit;
            }
        } else {
            $log = "2101\tInformation \t".$ip." \t".date('Y-m-d H:i:s')." \t".$name." \tAn email has been sent successfully with content orgname: '". $_POST['orgname']."',  Mobile: '". $_POST['mobile']."', Mail: '".$_POST['mail']."', Service: '".$_POST['ser']."', Type: '".$_POST['type']."' \n";
            file_put_contents('./Logs/Web_log_'.date("Y").'.log', $log, FILE_APPEND);
            if($lang == 'ar') {
                header("location: ar/index?serror=1/#application");
                exit;
            }else{
                header("location: index?serror=1/#application");
                exit;
            }
        }
    }
?>