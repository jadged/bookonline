<?php
    require_once 'output_fns.php';
    do_html_header('shop');
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
		$isbn = strip_tags(trim($_POST['isbn']));
		$author = strip_tags(trim($_POST['author']));
                $title = strip_tags(trim($_POST['title']));
                $price = strip_tags(trim($_POST['price']));

		if (!$isbn || !$author || !$title || !$price) {
                    echo "Вы заполнили не все поля.<br/>".
                                      "Вернитесь назад и повторите ввод.<br/>".
                                      "<a href='addbook.php'>Назад</a>";
                    exit;
                }
                
                if (!get_magic_quotes_gpc()) {
                    $isbn =  addslashes($isbn);
                    $author = addslashes($author);
                    $title =  addslashes($title);
                    $price = addslashes($price);
                }
                
                @ $db = new mysqli('localhost', 'admin', 'admin', 'bookonline');
                
                if (mysqli_connect_errno()) {
                    echo "<script>alert('Неудалось выполнить соединение с базой. Повторите попытку позднее.');</script>";
                    echo "<script>history.back()</script>";
                }
                
                $query = "insert into books values"
                        . "('".$isbn."', '".$author."', '".$title."', '".$price."')";
                $result = $db->query($query);
                
                if ($result) {
                    echo 'Книга добавлена в базу данных!<br/>';
                    echo '<a href="addbook.php">Добавить</a> новую книгу<br/>';
                    echo '<a href="shop.php">Вернуться</a> в магазин<br/>';
                }else{
                    echo 'Ошибка. Книга не занесена. ';
                    echo "<a href='addbook.php'>Повторить</a>";
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
                                    <td><input type="text" name="isbn" class="forms"/></td>
                                </tr>
                                <tr>
                                    <td>Автор: </td>
                                    <td><input type="text" name="author" class="forms"/></td>
                                </tr>
                                <tr>
                                    <td>Название: </td>
                                    <td><input type="text" name="title" class="forms"/></td>
                                </tr>
                                <tr>
                                    <td>Цена, тг</td>
                                    <td><input type="text" name="price" class="forms"/></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="buttons"/></td>
                                    <td><a href="shop.php"><input type="button" value="Назад" class="buttons"/></a></td>
                                </tr>
                            </table>
			</form>
EOD;
	}
    do_html_footer();

