<?php
    function do_html_header($title){
        switch ($title){
            case 'about':$about="class='select'";
                         $title="Об авторе";
                break;
            case 'services':$srv="class='select'";
                            $title="Сервисы";
                break;
            case 'shop':$shop="class='select'";
                        $title="Онлайн магазин";
                break;
            case 'contacts':$contacts="class='select'";
                            $title="Обратная связь";
                break;
            case 'reg': $title="Регистрация";
                break;
            default : $index="class='select'";
                      $title="Книжный магазин|Book online";
        }
?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title><?=$title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>
</head>
<body lang="ru">
<div id="wrap">
    <header>
        <img src="img/logo_site.png"/><span>Book Online</span>
        <div id="search">
            <input type="text" name="s" id="search_field"/>
            <input type="submit" value="" id="go"/>
        </div>
        <ul>
            <li><a href="index.php" <?=$index?>>Главная</a></li>
            <li><a href="about.php" <?=$about?>>Об авторе</a></li>
            <li><a href="services.php" <?=$srv?>>Сервисы</a></li>
            <li><a href="shop.php" <?=$shop?>>Магазин</a></li>
            <li><a href="contacts.php" <?=$contacts?>>Контакты</a></li>
        </ul>
    </header>
<div class="clear"></div>
<div id="content">
    <?php
}

function do_html_footer(){
    ?>
    </div>
    <div id="clients">
        <h3>Наши клиенты</h3>
        <img src="img/our_client.png"/>
    </div><div class="clear"></div>
    <div id="footer">
        <div id="logo_footer">
            <span>Book Online</span>
            <p>Книги — это инструмент насаждения мудрости.</p>
            <p>&copy;<?=date('Y')?> | <a href="#">Все права защищены</a></p>
        </div>
        <div id="links">
            <span class="links_header">Ссылки по теме</span><div class="clear"></div>
            <ul>
                <a href="index.php" <?=$index?>><li>Главная</li></a>
                <a href="about.php" <?=$about?>><li>Об авторе</li></a>
                <a href="services.php" <?=$srv?>><li>Сервисы</li></a>
                <a href="shop.php" <?=$shop?>><li>Магазин</li></a>
                <a href="contacts.php" <?=$contacts?>><li>Контакты<li></a>
            </ul>
            <ul>
                <a href="#"><li>Войти</li></a>
                <a href="#"> <li>Форум</li></a>
                <a href="#"><li>FAQ</li></a>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
<?php
}