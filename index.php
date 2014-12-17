<?
    include 'inc/head.inc.php';
?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>Book Online</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
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
            <li><a href="index.php" <?=$home?>>Главная</a></li>
            <li><a href="index.php?id=about" <?=$ab?>>Об авторе</a></li>
            <li><a href="index.php?id=services" <?=$srv?>>Сервисы</a></li>
            <li><a href="index.php?id=shop" <?=$magazine?>>Магазин</a></li>
            <li><a href="index.php?id=contacts" <?=$contac?>>Контакты</a></li>
        </ul>
    </header>
<div class="clear"></div>
<div id="content">
        <?include 'inc/routing.inc.php';?>
</div>
    <div id="clients">
        <h3>Наши клиенты</h3>
        <img src="img/our_client.png"/>
    </div><div class="clear"></div>
    <div id="footer">
        <div id="logo_footer">
            <span>Book Online</span>
            <p>Книги — это инструмент насаждения мудрости.</p>
            <p>&copy;<?=date('Y')?> | <a href="index.php?id=faq">Все права защищены</a></p>
        </div>
        <div id="links">
            <span class="links_header">Ссылки по теме</span><div class="clear"></div>
            <ul>
                <a href="index.php"<?=$home?>><li>Главная</li></a>
                <a href="index.php?id=about" <?=$ab?>><li>Об авторе</li></a>
                <a href="index.php?id=services" <?=$srv?>><li>Сервисы</li></a>
                <a href="index.php?id=shop" <?=$magazine?>><li>Магазин</li></a>
                <a href="index.php?id=contacts" <?=$contac?>><li>Контакты<li></a>
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





            