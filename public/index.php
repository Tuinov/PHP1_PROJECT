<?php
session_start();
include "../config/config.php";

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

if (isset($_GET['order'])) {
    $session = session_id();
    $nameUser = $_GET['name'];
    $email = $_GET['email'];
    $tel = $_GET['tel'];

    $link = getDb();

    // $result = mysqli_query($link, "INSERT INTO `orders` (`id`, `session_id`, `name`, `email`, `tel`, `status`) VALUES (NULL, 'rvte5tvr5vv', 'вася', 'афцфцвф', '891111111', 'новый')");

    mysqli_query($link, "INSERT INTO `orders` (`session_id`, `name`, `email`, `tel`, `status`) 
    VALUES ('{$session}', '{$nameUser}', '{$email}', '{$tel}', 'новый')");
    session_regenerate_id();
    echo '<h1> СПАСИБО ЗА ВАШ ЗАКАЗ</h1>';
}

// подготовка 
$params = prepareVariables($page);

echo render($page, $params);
