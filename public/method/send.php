<?
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../../imperiaclean.ru/src/Exception.php';
require '../../imperiaclean.ru/src/PHPMailer.php';
require '../../imperiaclean.ru/src/SMTP.php';





$json = file_get_contents("php://input");
$json = json_decode($json);

$name = trim($json->{"name"});
$city = trim($json->{"city"});
$telephone  = trim($json->{"telephone"});
$from = trim($json->{"from"});
$from_text = trim($json->{"text"});


$c = true;


function mail_to($message, $form_subject){
	$fp = fopen("file.txt", "w"); 

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';

	try{
		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    	$mail->isSMTP();                                            // Send using SMTP
    	$mail->Host       = 'ssl://smtp.jino.ru';                    // Set the SMTP server to send through
    	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    	$mail->Username   = 'feedback@imperiaclean.ru';                     // SMTP username
    	$mail->Password   = '1zap9unn9yy8';                               // SMTP password
    	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    	$mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		fwrite($fp, "123");
    	//Recipients
    	$mail->setFrom('feedback@imperiaclean.ru', 'Империя чистоты');
    	$mail->addAddress('zapunnyy36@gmail.com', 'Администратор Евгений');  
    	$mail->addAddress('imperia.clean07@gmail.com', 'Администратор Мария');    // Add a recipient
    	$mail->addReplyTo('imperia.clean07@gmail.com', 'Администратор Мария');

    	// Attachments
    	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// $mail->addAttachment('logo.png', 'logo.png');   // Optional name
		
		$mail->isHTML(true);
		$mail->Subject = $form_subject;
		$mail->Body = $message;
		$mail->AltBody = $message;

		$mail->send();
		}
		catch (Exception $e) {
			mail("zapunnyy36@gmail.com", "Ошибка в отправке письма", "{$mail->ErrorInfo}");
	}
}

if ($from == "Заявка") {
	$form_subject = "Заяка на звонок от " . $name . " Из ". $city;
	foreach($json as $key => $value){
		if($key == "name")
		{
			$key = "Имя";
		}
		if($key == "city")
			$key = "Город";
		if($key == "telephone")
			$key = "Телефон";
		if($key == "from")
			$key = "С какой формы";
		if($key == "text")
			$key = "Сообщение";
		$message .= "
		" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
		<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
		<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	}
	$message = "<table style='width: 100%;'>$message</table>";
	mail_to($message, $form_subject);

}
if($from == "Калькулятор"){
	$form_subject = "Заявка через калькулятор от ". $name. " Из ". $city;
	foreach($json as $key => $value){
		if($key == "name")
			$key = "Имя";
		if($key == "city")
			$key = "Город";
		if($key == "telephone")
			$key = "Телефон";
		if($key == "from")
			$key = "С какой формы";
		if($key == "text")
			$key = "Сообщение";
		if($key == "serv")
			$key = "Доп услуги";
		if($key == "total")
			$key = "Итого";
		if($key == "typeC")
			$key = "Тип уборки";
		if($key == "typeW")
			$key = "Мойка окна";
		if($key == "area")
			$key = "Площадь";
		if($key == "areaW")
			$key = "Площадь окна";
		$message .= "
		" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
		<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
		<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	}
	$message = "<table style='width: 100%;'>$message</table>";
	mail_to($message, $form_subject);
}

?>