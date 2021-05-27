<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$text = $_POST['text'];
	$upload_dir = 'uploads/';
	$file = 'files/' . $name. '.txt';
	$file_uploaded = false;
	$uploaded_file_name = 'uploadds/';

	if(array_key_exists('user_file', $_FILES)){
		$ext = strtolower(pathinfo($_FILES['user_file']['name'], PATHINFO_EXTENSION));
		if($ext != 'png' && $ext != 'jpg'){
			echo ('Неверное расширение файла');
			return 0;
		}
		$file_uploaded = true;
		$uploaded_file_name = $upload_dir . basename($_FILES['user_file']['name']);

		$tmp_name = $_FILES["user_file"]["tmp_name"];
        move_uploaded_file($tmp_name, $uploaded_file_name);
	}

	$content = "Имя: " . $name;
	$content .= "\nE-mail: " . $email;
	$content .= "\nСообщение:\n" . $text;
	if($file_uploaded){
		$content .= "\nПуть к файлу: " . $uploaded_file_name;
	}
	file_put_contents($file, $content);
	echo('Сообщение доставлено.');
?>