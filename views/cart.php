<?php

if (isset($_GET['order'])) {
    $session = session_id();
    $nameUser = $_GET['name'];
    $email = $_GET['mail'];
    $tel = $_GET['tel'];

    $link = getDb();

    // $result = mysqli_query($link, "INSERT INTO `orders` (`id`, `session_id`, `name`, `email`, `tel`, `status`) VALUES (NULL, 'rvte5tvr5vv', 'вася', 'афцфцвф', '891111111', 'новый')");

    mysqli_query($link, "INSERT INTO `orders` (`session_id`, `name`, `email`, `tel`, `status`) 
    VALUES ('{$session}', '{$nameUser}', '{$email}', '{$tel}', 'новый')");
}
?>
<h2>корзина</h2>
<?php foreach($result as $value):?>
        
            <p><?=$value['name']?> шт:<?=$value['quantity']?></p>
                 
            price:<?=$value['price']*$value['quantity']?>
            <a href="?page=cart&deleteId=<?=$value['id']?>">[x]Удалить</a>
          
<?php endforeach; ?>
Сумма покупок: <?=$totalCart?>

<form>
    <input type='text' name='name' placeholder='имя'>
	<input type='text' name='email' placeholder='почта'>
	<input type='text' name='tel' placeholder='телефон'>
    <input type='submit' name='order'>
	
</form>
<!-- 
<br><a href="?page=cart&order">Оформить заказ</a> -->
