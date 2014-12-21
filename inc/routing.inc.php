<?php
$id = strip_tags(trim($_GET['id']));
switch ($id){
    case 'about':
        include 'inc/about.inc.php';
        break;
    case 'services':
        include 'inc/services.inc.php';
        break;
    case 'shop':
        include 'inc/shop.inc.php';
        break;
    case 'addbook':
        include 'inc/addBook.inc.php';
        break; 
    case 'contacts':
        include 'inc/contacts.inc.php';
        break;
    case 'post_bmw':
        include 'posts/post_bmw.php';
        break;
    case 'land_rover':
        include 'posts/post_land_rover.php';
        break;  
    case 'nds':
        include 'posts/post_nds.php';
        break;   
    default:
        include 'inc/index.inc.php';
}