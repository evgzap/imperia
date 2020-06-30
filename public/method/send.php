<?
$json = file_get_contents("php://input");
$json = json_decode($json);

$name = trim($json->{"name"});
$telephone  = trim($json->{"telephone"});
$from = trim($json->{"from"});
$from_text = trim($json->{"text"});

$project_name = "Империя чистоты";
$admin_email = "zapunnyy36@gmail.com";
$email = "imperia.clean07@gmail.com";
$form_subject = "Обратная связь";

$c = true;

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

function mail_to($message, $admin_email, $form_subject){
	$headers = "MIME-Version: 1.0" . PHP_EOL .
	"Content-Type: text/html; charset=utf-8" . PHP_EOL .
	'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .
	'Reply-To: '.$admin_email.'' . PHP_EOL;

	mail($admin_email, adopt($form_subject), $message, $headers );
}

if ($from == "Заявка") {
	foreach($json as $key => $value){
		if($key == "name")
			$key = "Имя";
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
	mail_to($message, $admin_email, $form_subject);
	mail_to($message, $email, $form_subject);

}

?>