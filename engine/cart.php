<?php
// получение всех товаров из таблицы $table
function getCart($table) {
    
    $link = getDb();
    $session = session_id();
    $result = mysqli_query($link, "SELECT * FROM $table WHERE session_id='{$session}'");
    while($row = mysqli_fetch_assoc($result)) {
        $goods[]  = $row;   
    }
    return $goods;
}

// колличество товаров в корзине для данного пользователя
function quantityCart() {
    $link = getDb();
    $session = session_id();
    $result = mysqli_query($link, "SELECT  SUM(quantity) FROM cart WHERE session_id='{$session}'");
    $sum = mysqli_fetch_assoc($result);
   
    return $sum['SUM(quantity)'];
}
// сумма товаров в корзине для данного пользователя
function totalCart() {
    $link = getDb();
    $session = session_id();
    $result = mysqli_query($link, "SELECT  SUM(price) FROM cart WHERE session_id='{$session}'");
    $sum = mysqli_fetch_assoc($result);
   
    return $sum['SUM(price)'];
}

// удаление из корзины
if(isset($_GET['deleteId'])) {
    $delId = $_GET['deleteId'];
    // var_dump($delId);
    $link = mysqli_connect('localhost', 'root', '', 'geekbrains');
    $result = mysqli_query($link, "DELETE FROM `cart` WHERE `cart`.`id` = '{$delId}'");
    
}