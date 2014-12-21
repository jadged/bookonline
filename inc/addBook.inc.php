<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
		$isbn = strip_tags(trim($_POST['isbn']));
		$author = strip_tags(trim($_POST['author']));
                $title = strip_tags(trim($_POST['title']));
                $price = strip_tags(trim($_POST['price']));

		if (!$isbn || !$author || !$title || !$price) {
                    echo "Вы заполнили не все поля.<br/>".
                                      "Вернитесь назад и повторите ввод.<br/>".
                                      "<a href='index.php?id=addbook'>Назад</a>";
                    exit;
                }
                
                if (!get_magic_quotes_gpc()) {
                    $isbn =  addslashes($isbn);
                    $author = addslashes($author);
                    $title =  addslashes($title);
                    $price = addslashes($price);
                }
                
                @ $db = new mysqli('localhost', 'admin', 'admin', 'shop');
                
                if (mysqli_connect_errno()) {
                    echo "<script>alert('Неудалось выполнить соединение с базой. Повторите попытку позднее.');</script>";
                    echo "<script>history.back()</script>";
                }
                
                $query = "insert into books values"
                        . "('".$isbn."', '".$author."', '".$title."', '".$price."')";
                $result = $db->query($query);
                
                if ($result) {
                    echo 'Книга добавлена в базу данных!<br/>';
                    echo '<a href="index.php?id=addbook">Добавить</a> новую книгу<br/>';
                    echo '<a href="index.php?id=shop">Вернуться</a> в магазин<br/>';
                }else{
                    echo 'Ошибка. Книга не занесена. ';
                    echo "<a href='index.php?id=addbook'>Повторить</a>";
                }
                $db->close();
	}else{
            echo <<<EOD
		<h3><span>Онлайн магазин</span></h3>
			<form action="" method="post">
                            <table>
                                <caption>Добавление новой книги:</caption>
                                <tr>
                                    <td>ISBN: </td>
                                    <td><input type="text" name="isbn"/></td>
                                </tr>
                                <tr>
                                    <td>Автор: </td>
                                    <td><input type="text" name="author"/></td>
                                </tr>
                                <tr>
                                    <td>Название: </td>
                                    <td><input type="text" name="title"/></td>
                                </tr>
                                <tr>
                                    <td>Цена, тг</td>
                                    <td><input type="text" name="price"/></td>
                                </tr>
                                <tr>
                                    <td><input type="submit"/></td>
                                    <td><a href="index.php?id=shop"><input type="button" value="Назад"/></a></td>
                                </tr>
                            </table>
			</form>
EOD;
	}
