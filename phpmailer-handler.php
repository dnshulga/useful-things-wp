<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	// Файлы phpmailer
	require 'phpmailer/class.phpmailer.php';
	
	// Переменные
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$job = $_POST['job'];

	// Настройки
	$mail = new PHPMailer;
	$mail->setFrom('noreply@valion.ua', 'Valion'); // Ваш Email
	$mail->addAddress('recrut@valion.ua'); // Email получателя
	$mail->CharSet = 'UTF-8';
	
	// Прикрепление файлов
	if(is_array($_FILES)) {
		$mail->AddAttachment($_FILES['userfile']['tmp_name'], $_FILES['userfile']['name']); 
	}
	// Письмо
	$mail->isHTML(true); 
	$mail->Subject = 'Заявка на вакансию'; // Заголовок письма
	$mail->Body = 'Имя '.$name . '<br/>Телефон '.$phone . '<br/>Вакансия '. $job; // Текст письма

	// Результат
	if(!$mail->send()) {
 		echo 'Ошибка: ' . $mail->ErrorInfo;
	} else {
 		echo 'Отправлено успешно';
	}
}
else {
	http_response_code(403);
    echo "Попробуйте еще раз";
}
?>