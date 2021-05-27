<?php
	$upload_dir = 'uploads/';
	$file = 'files/file.csv';

	if(array_key_exists('user_file', $_FILES)){
		$ext = strtolower(pathinfo($_FILES['user_file']['name'], PATHINFO_EXTENSION));
		if($ext != 'csv'){
			echo ('Неверное расширение файла');
			return 0;
		}
		$tmp_name = $_FILES["user_file"]["tmp_name"];
        move_uploaded_file($tmp_name, $file);
	}

	echo('Файл загружен.');
?>