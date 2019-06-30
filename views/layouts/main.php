<?php
session_start();
$allow = false;

// var_dump(session_id());

if (is_auth()) {
    $allow = true;
    $user = get_user();
}

function get_db() {
    static $db = '';
    if (empty($db)) {
        $db = mysqli_connect('localhost', 'root', '', 'geekbrains');
    }
    return $db;
}

if (isset($_GET['logout'])) {
    session_destroy();
    setcookie("hash");
    header("Location: /");
}

if (isset($_GET['send'])) {
    $login = $_GET['login'];
    $pass = $_GET['pass'];

    if (!auth($login, $pass)) {
        Die('Не верный логин пароль');
    } else {
        if (isset($_GET['save'])) {
            $hash = uniqid(rand(), true);
            $db = get_db();
            $id = mysqli_real_escape_string($db, strip_tags(stripslashes($_SESSION['id'])));
            $sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}";
            $result = mysqli_query($db, $sql);
            setcookie("hash", $hash, time() + 36000);
        }
        $allow = true;
        $user = get_user();
    }

}

function auth($login, $pass)
{
    $db = get_db();
    $login = mysqli_real_escape_string($db, strip_tags(stripslashes($login)));
    $result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
    $row = mysqli_fetch_assoc($result);
    if (password_verify($pass, $row['pass'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        return true;
    }
    return false;
}

function is_auth() {
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        $db = get_db();
        $sql = "SELECT * FROM `users` WHERE `hash`='{$hash}'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
        }

    }
    return isset($_SESSION['login']) ? true : false;
}

function get_user()
{
    return is_auth() ? $_SESSION['login'] : 'guest';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
</head>
<body>

<?if (!$allow):?>
Войдите:
<form>
	<input type='text' name='login' placeholder='Логин'>
	<input type='password' name='pass' placeholder='Пароль'>
	Save? <input type='checkbox' name='save'>
	<input type='submit' name='send'>
</form>

<?else:?> Добро пожаловать, <?=$user?> <a href='?logout'>выход</a><br>
<?endif?>

<a href="?page=index">Главная</a>
<a href="?page=catalog">Каталог</a>
<a href="?page=gallery">Галерея</a><br>
<a href="?page=cart">Корзина(<?=$quantityAll?>)</a><br>
<a href="about.php">Отзывы</a><br>
<?php if ($allow): ?>
<a href="?page=admin">Админка</a><br>
<?php endif; ?>
<a href="calc.php">Калькулятор</a>
<?=$content?>
</body>
</html>