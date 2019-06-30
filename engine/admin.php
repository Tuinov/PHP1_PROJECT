<?php
function getOrders() {
    
    $link = getDb();
    $result = mysqli_query($link, "SELECT * FROM orders WHERE 1");
    while($row = mysqli_fetch_assoc($result)) {
        $goods[]  = $row;   
    }
    return $goods;
}

// function getAllOrders (getOrders()) {

// }