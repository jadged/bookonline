<?php
$title = '';
switch ($_GET['id']){
    case 'about':
        $title = 'О мне';
        $ab ="class='select'";
        break;
    case 'services':
        $title = 'Сервисы';
        $srv ="class='select'";
        break;
    case 'shop':
        $title = 'Магазин';
        $magazine ="class='select'";
        break;
    case 'addbook':
        $title = 'Добавить новую книгу';
        $magazine ="class='select'";
        break;
    case 'contacts':
        $title = 'Контакты';
        $contac ="class='select'";
        break;
    case 'post_bmw':
        $title = 'Вирус BMW';
        break;
    case 'land_rover':
        $title = 'Land Rover Defender';
        break;  
    case 'nds':
        $title = 'НДС для авто отменят';
        break;  
    default:
        $title = 'Online Book|Все книги';
        $home ="class='select'";
}
?>