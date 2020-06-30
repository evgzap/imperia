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

$c = true;

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

function mail_to($message, $admin_email, $form_subject){
	$headers = "MIME-Version: 1.0" . PHP_EOL .
	"Content-Type: text/html; charset=utf-8" . PHP_EOL .
	'From: '.adopt($project_name).' <'."feedback@imperiaclean.ru".'>' . PHP_EOL .
	'Reply-To: '."imperia.clean07@gmail.com".'' . PHP_EOL;

	mail($admin_email, adopt($form_subject), $message, $headers );
}

if ($from == "Заявка") {
	$form_subject = "Заяка на звонок";
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
if($from == "Калькулятор"){
	$form_subject = "Заявка через калькулятор";
	foreach($json as $key => $value){
		if($key == "name")
			$key = "Имя";
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
		$message .= "
		" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
		<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
		<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	}
	$message = "<table style='width: 100%;'>$message</table>";
	mail_to($message, $admin_email, $form_subject);
}
?>