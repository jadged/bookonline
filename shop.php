<?php
    require_once 'output_fns.php';
    do_html_header('shop');
    
if($_SERVER['REQUEST_METHOD']=="POST"){
		$searchtype = strip_tags(trim($_POST['searchtype']));
		$searchterm = strip_tags(trim($_POST['searchterm']));
                
                if (!get_magic_quotes_gpc()) {
                    $searchtype =  addslashes($searchtype);
                    $searchterm = addslashes($searchterm);
                }
                
                @ $db = new mysqli('localhost', 'admin', 'admin', 'bookonline');
                if (mysqli_connect_errno()) {
                    echo "<script>alert('Неудалось выполнить соединение с базой. Повторите попытку позднее.');</script>";
                    echo "<script>history.back()</script>";
                }
                
                $query = "select * from books where ".$searchtype." like '%".$searchterm."%'";
                $result = $db->query($query);
                $num_results = $result->num_rows;
                echo "<p>Найдено книг: ".$num_results."</p><hr id='hrline'/>";
                
                for($i=0;$i<$num_results;$i++){
                    $row = $result->fetch_assoc();
                    echo "<p>".($i+1).". Название: ";
                    echo htmlspecialchars(stripslashes($row['title']));
                    echo "<br/>Автор: ";
                    echo stripslashes($row['author']);
                    echo "<br/>ISBN: ";
                    echo stripslashes($row['isbn']);
                    echo "<br/>Цена: ";
                    echo stripslashes($row['price']);
                    echo " тг</p><hr id='hrline'/>";
                }
                echo '<a href="shop.php">Искать заново</a>';
                $result->free();
                $db->close();
	}else{
            echo <<<EOD
		<h3><span>Онлайн магазин</span></h3>
			<form action="" method="post">
                            <table>
                                <caption>Задайте параметры для поиска или нажмите на кнопку 'Найти' для отображения полного каталога книг</caption>
                                <tr>
                                    <td>Выберите тип поиска: </td>
                                    <td><select name="searchtype">
                                            <option value="title">По названию</option>
                                            <option value="author">По автору</option>
                                            <option value="isbn">По ISBN</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Введите информацию для поиска: </td>
                                    <td><input type="text" name="searchterm" size="40" class="forms"/></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="submit" value="Найти" class="buttons"/></td>
                                    <td><a href="addbook.php" style="text-decoration:none"><input type="button" value="Добавить книгу" class="buttons"></a></td>
                                </tr>
                            </table>
			</form>
EOD;
	}
    do_html_footer();
	
