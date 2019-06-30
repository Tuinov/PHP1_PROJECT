<?php
for ($i = 0; $i < count($orders); $i++) {
    echo '<br>' . 'заказ №' . $orders[$i]['id'] . '<br>';
    $session =  $orders[$i]['session_id'];

    $link = getDb();

    $result = mysqli_query($link, "SELECT * FROM cart WHERE session_id='{$session}'");
    while($row = mysqli_fetch_assoc($result)) {
        echo $row['name'] .$row['price'] . '<br>';
        
    }
    echo '<a href="">обработать заказ</a>';
}
