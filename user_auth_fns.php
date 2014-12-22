<?php
function register($username, $email, $password){
    //регистрирует нового пользователя либо возвращает сообщение об ошибке
    
    //подключение к базе
    $db=new mysqli('localhost', 'admin', 'admin', 'bookonline');
    if (mysqli_connect_errno()) {
                    echo "<script>alert('Неудалось выполнить соединение с базой. Повторите попытку позднее.');</script>";
                    echo "<script>history.back()</script>";
                }
    $result=$db->query("select * from user where username = '".$username."'");
    if ($result->num_rows>0) {
        throw new Exception('Это имя пользователя уже занято<br/>'.
                            "<a href='register_form.php'>Назад</a>");
    }
    
    //если все впорядке сохранить запись в бд
    $result=$db->query("insert into user values('".$username."', '".$email."', '".$password."')");
    if (!$result) {
        throw new Exception('Невозможно сохранить в бд<br/>'.
                            "<a href='register_form.php'>Назад</a>");
    }
    return true;
}