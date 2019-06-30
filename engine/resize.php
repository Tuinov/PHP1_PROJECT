<?php
// создаёт уменьшенную копию и загружает его в $save
function create_thumbnail($path, $save) {
    $info = getimagesize($path);

    $width = $info[0];
    $height = $info[1];

    $percent = 0.5;

    $newWidth = $width * $percent;
    $newHeight = $height * $percent;
   
    //imagecreatetruecolor — Создание нового полноцветного изображения
    $thumb = imagecreatetruecolor($newWidth, $newHeight);
    //imagecreatefromjpeg — Создает новое изображение из файла или URL

    //В зависимости от расширения картинки вызываем соответствующую функцию
	if ($info['mime'] == 'image/png') {
		$src = imagecreatefrompng($path); //создаём новое изображение из файла
	} else if ($info['mime'] == 'image/jpeg') {
		$src = imagecreatefromjpeg($path);
	} else if ($info['mime'] == 'image/gif') {
 		$src = imagecreatefromgif($path);
	} else {
		return false;
    }
    
    //imagecopyresized — Копирование и изменение размера части изображения
    imagecopyresampled($thumb, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    imagejpeg($thumb, $save);
};