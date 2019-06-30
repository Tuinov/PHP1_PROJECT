<?php
function prepareVariables($page) {
    $params = [];

    switch ($page) {
        case 'index':
        break;
        case 'single':
       
        $id = (int)$_GET['id'];

        // увеличивает просмотры на 1
        likeUp($id);

        $params = [
            'row' => getSinglle($id, 'gallery')
        ];
        break;

        case 'admin':
        $params = [
            'orders' => getOrders()
        ];
        break;
        
        case 'catalog':
        $params = [
            'goods' => getGoods('gallery')
        ];
        break;
        
        case 'cart':
        
        $params = [
            'result' => getCart('cart'),
            'totalCart' => totalCart()
        ];
        break;
       

        case 'gallery':
        $params = [
            'catalog' => ["Чай", "Печенье", "Вафли"]
        ];
    }
    return $params;
}