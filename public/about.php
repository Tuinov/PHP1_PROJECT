<?php
include "../config/config.php";


$link = getDb();

$editName = '';
$editFeedback = '';
$button = 'отправить';
$buttonName = 'ok';

   if(isset($_GET['editId'])){
    $id = (int)$_GET['editId'];
    $result = mysqli_query($link, "SELECT * FROM feedback WHERE `feedback`.`id` = {$id}");
    $row = mysqli_fetch_assoc($result);
    $editName = $row['name'];
    $editFeedback = $row['feedback'];
    $button = 'Исправить';
    $buttonName = 'edit';
                  
    $id = (int)$_GET['id'];
}
if(isset($_POST['edit'])){
    
    $id = (int)$_GET['editId'];
   
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['feedback'])));
    // var_dump($name, $feedback, $id);
    // die;
    $result = mysqli_query($link, "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id}");
    header("Location: about.php?message=edit");
}  


if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    
mysqli_query($link, "DELETE FROM `feedback` WHERE `feedback`.`id` = {$id}");
    header("Location: about.php?message=delete");
}



if(isset($_POST['ok'])){
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($link, $_POST['feedback'])));
    //var_dump($name, $feedback);
    mysqli_query($link, "INSERT INTO `feedback` (`name`, `feedback`, `time`) VALUES ('{$name}', '{$feedback}', NULL)");
    header("Location: about.php?message=ok");
}

$result = mysqli_query($link, "SELECT * FROM feedback WHERE 1");

if(isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 'ok':
        $message = 'отзыв добавлен';
        break;
        case 'delete':
        $message = 'отзыв удалён';
        break;
        case 'edit':
        $message = 'отзыв отредактирован';
        break;
        default: $message = '';
    }
}


?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Отзывы</title>
</head>
<body>
<a href="index.php">Главная</a>
<h3>Отзывы </h3>
<h3><?=$message?></h3>

<?foreach ($result as $item):?>
<?=$item['name']?>: <?=$item['feedback']?><a href="?id=<?=$item['id']?>">[удалить]</a><br>
<a href="?editId=<?=$item['id']?>">[редактировать]</a><br> 
<?endforeach;?>

<br>
<form method="post" action="">
    <input type="text" placeholder="Имя" value="<?=$editName?>" name="name">
    <input type="text" placeholder="Отзыв" value="<?=$editFeedback?>" name="feedback">
    <input type="submit" name="<?=$buttonName?>" value="<?=$button?>">
</form>
    
</body>
</html>