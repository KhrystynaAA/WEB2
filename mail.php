<?php
/*
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';

    $mail = nem PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('uk', 'PHPMailer/language/');
    $mail->IsHtml(true);
    
    $recepient = "ambroziak0424@gmail.com";

    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];

    $subject = "Hello";
    //$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

    $mail->setFrom = $email;
    $mail->addAddreaa = $recepient;
    $mail->Subject = $subject;
    $mail->Body = $message;

    if(!$mail->send()){
        $help = 'error';
    }else{
        $help = 'ok';
    }
    $response = ['mess' => $help];

    header('Content-type: application/json');
    echo json_encode($response);
    //$success = mail("ambroziak0424@gmail.com", $subject, $message, $headers));
?>*/

$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;

	$project_name = trim($_POST["project_name"]);
	$admin_email  = trim($_POST["admin_email"]);
	$form_subject = trim($_POST["form_subject"]);

	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "project_name" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
			</tr>
			";
		}
	}


$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
'Reply-To: '.$admin_email.'' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );

echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";