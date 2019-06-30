<?php
echo '<h2>ТОВАР: ' . $row['name'] . ' цена: ' . $row['price'] . '</h2>';
echo '<h2>ОПИСАНИЕ: ' . $row['description'] . '</h2>';

echo '<img src="gallery_img/big/' . $row['href'] . '">';
echo '<h2>Просмотров: ' . $row['pop'] . '</h2>';