<?php
    require_once 'output_fns.php';
    do_html_header('reg');
?>
<h3 align="center"><span>Регистрация</span></h3>
<style type="text/css">
    .forms{
        width:400px;
        height:50px;
        font-family: 'Calibri';
        font-size:20px;
        margin: 10px 0;
    }
    .buttons{
        width:200px;
    }
    td{
        border: none;
    }
    table{
        border: none;
        margin:0 auto;
    }
</style>
<form action="register_new.php" method="post">
        <table>
            <tr>
                <td><input type="text" name="username" placeholder="Имя пользователя" class="forms"></td>
            </tr>
            <tr>
                <td><input type="text" name="email" placeholder="E-mail" class="forms"></td>
            </tr>
            <tr>
                <td><input type="password" name="passwd" placeholder="Пароль" class="forms"></td>
            </tr>
            <tr>
                <td><input type="password" name="passwd2" placeholder="Пароль еще раз" class="forms"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Зарегистрироваться" class="buttons"><a href="index.php">
                    <input type="button" value="Отмена" class="buttons" style="float:right;"/></a>
                </td>
            </tr>
        </table>
    </form>
<?php
    do_html_footer();