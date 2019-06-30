<?php
// Если нажата кнопка купить - прилетает id товара. по нему запрашивается товар из 
// бд  и записывается в корзину
if(isset($_GET['cartId'])) {
   
    $session = session_id();
    $idProduct = $_GET['cartId'];
    $link = getDb();
    $result = mysqli_query($link, "SELECT * FROM gallery WHERE id={$idProduct}");
    $goods = mysqli_fetch_assoc($result);
    
    $name = $goods['name'];
    $price = $goods['price'];

    $result = mysqli_query($link, "INSERT INTO `cart` (`id_product`, `name`, `price`, `quantity`, `session_id`) 
    VALUES ('{$idProduct}', '{$name}', '{$price}', '1', '{$session}')");
    
}

// получает все товары
function getGoods($table) {
   
    $link = getDb();
    $result = mysqli_query($link, "SELECT * FROM $table WHERE 1");
    while($row = mysqli_fetch_assoc($result)) {
        $goods[]  = $row; 
    }
    return $goods;
}

// увеличивает просмотры на 1
function likeUp($id) {
    $link = getDb();
    mysqli_query($link, "UPDATE gallery SET pop = pop+ 1 WHERE id={$id}");
}
// получает 1 товар
function getSinglle($id, $table) {
    $link = getDb();
    $result = mysqli_query($link, "SELECT * FROM $table WHERE id={$id}");
    $param = mysqli_fetch_assoc($result);
    return $param;
}