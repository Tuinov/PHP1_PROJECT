

<h2>КАТАЛОГ</h2>
        <?php foreach($goods as $value):?>
        <a href="?page=single&id=<?=$value['id']?>">
                <h3><?=$value['name']?></h3>
                <img src="gallery_img/small/<?=$value['href']?>" alt="photo">
            </a><?=$value['pop']?> &#10084

            <a href="?page=catalog&cartId=<?=$value['id']?>">купить</a>

            <p>price:<?=$value['price']?> </p> 
          
        <?php endforeach; ?>

<!-- <h3>Загрузить изображение</h3> 
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <input type="submit" name="load" value="Загрузить">
    </form>  -->

 