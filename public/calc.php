<?php
// var_dump($_GET);
// var_dump($_POST);
// var_dump($_REQUEST);

function sum($a, $b){
    
    return ($a + $b);
};

function minus($a, $b){
    return ($a - $b);
};

function multiply($a, $b){
    return ($a * $b);
};

function share($a, $b){
    return ($a / $b);
};

function mathOperation($arg1, $arg2, $operation){
    
    switch ($operation) {
        case '-':
        $result = minus($arg1, $arg2);
            break;
        case '+': 
        $result = sum($arg1, $arg2);
            break;
        case '*': 
        $result = multiply($arg1, $arg2);
            break;
        case '/': 
        $result = share($arg1, $arg2);
            break;
    }
    return $result;
};

$num1 = 'число1';
$num2 = 'число2';
   
if(!empty($_POST['select'])){
    $arg1 = $_POST['arg1'];
    $arg2 = $_POST['arg2'];
    $operation = $_POST['select'];
    echo mathOperation($arg1, $arg2, $operation);

    $num1 = $arg1;
    $num2 = $arg2;
    
}



?>
<!-- 
<h4>
1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, 
деление. Не забыть обработать деление на ноль! Выбор операции можно 
осуществлять с помощью тега <select>. Хорошо бы чтобы не только результат 
был выведен, но и исходные данные и выбранная операция тоже отобразились 
в полях ввода.
</h4><hr><br><br>
 -->

<form action="" method="post">
<input type="text" name="arg1" placeholder=<?=$num1?>>
    <select name="select"> 
        <option value="+">+</option> 
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="arg2" placeholder=<?=$num2?>>
    <input type="submit" value="=">
</form>

<!-- <h4>2. Создать калькулятор, который будет определять тип выбранной 
    пользователем операции, ориентируясь на нажатую кнопку. * сделайте его 
    через ajax
</h4> -->

   <!-- <input type="text" id="val1" value="">
   <button class='action'> + </button>
   <button class='action'> - </button>
   <button class='action'> * </button>
   <button class='action'> / </button>
   <input type="text" id="val2" value="">
   <button class='action'> = </button>
   <input type="text" id="val3" value=""><br> -->

