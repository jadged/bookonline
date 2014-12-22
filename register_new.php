<?php
require_once 'output_fns.php';
require_once 'bookmark_fns.php';

//создать короткие имена переменных
$email=$_POST['email'];
$username=$_POST['username'];
$passwd=$_POST['passwd'];
$passwd2=$_POST['passwd2'];

//Запускаем сеанс
session_start();

try{
    //проверить заполнены ли поля формы
    if(!filled_out($_POST)){
        throw new Exception('Вы не заполнили корректно форму.<br/> Пожалуйста вернитесь назад и заполните снова<br/>'.
                            "<a href='register_form.php'>Назад</a>");
    }
    
    //недопустимый адрес почты
    if(!valid_email($email)){
        throw new Exception('Недопустимый адрес электронной почты.<br/> Пожалуйста вернитесь назад и заполните снова<br/>'.
                            "<a href='register_form.php'>Назад</a>");
    }
    
    //проверить совпадение паролей
    if ($passwd!=$passwd2) {
        throw new Exception('Пароли не совпадают<br/>'.
                            "<a href='register_form.php'>Назад</a>");
    }
    //проверить допустимость длины пароля
    if ((strlen($passwd) <6) || (strlen($passwd) >16)) {
        throw new Exception('Пароль должен содержать от 6 до 16 символов.<br/> Пожалуйста вернитесь назад и заполните снова<br/>'.
                            "<a href='register_form.php'>Назад</a>");
    }
    
    //попытка регистрации
    register($username, $email, $passwd);
    
    //зарегистрировать переменную сеанса
    $_SESSION['valid_user']=$username;
    
    do_html_header('reg');
    echo 'Успешная регистрация';
    do_html_footer();
} catch (Exception $ex) {
do_html_header('reg');
echo $ex->getMessage();
do_html_footer();
}
