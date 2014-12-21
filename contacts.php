<?php
    require_once 'output_fns.php';
    do_html_header('contacts');
?>
    <h3><span>Обратная связь</span></h3>
<?php
function checkForm($str){
	$swear = array('blya' => 'бля', 
					'suka' => 'сук',
					'pid' => 'пид');
	$str = trim(str_replace($swear, "***", $str));
	return $str;
}
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		//Обрабатываем получениые данные
		$username = checkForm($_POST['username']);
		$feedback = checkForm($_POST['feedback']);
		$email = checkForm($_POST['email']);

		//Проверяем корректность e-mail
		if (!preg_match('/[a-zA-Z0-9_\.]+@[a-zA-Z0-9_\.]+\.[a-zA-Z0-9_\.]/i', $email)) {
			echo "<p>Введите e-mail правильно</p>";
			echo "<a href='contacts.php'>Назад</a>";
		}else{
			//Постоянная информация
			$toaddress = "jadged@yandex.ru";
			$subject = "Отзыв с веб-сайта";
			$mailcontent =  "Имя клиента: $username \n".
							"E-mail клиента: $email \n".
							"Отзыв клиента: \n$feedback";
			$fromaddress = "From: k.k.zhukov@gmail.com";
			
			//Отправка письма
			$send = mail($toaddress, $subject, $mailcontent, $fromaddress);
			if ($send) {
				echo "<p>Ваш отзыв отправлен, Спасибо!</p>";
				echo "<a href='index.php'>На главную</a>";
			}else{
				echo "<p>Произошла ошибка, пожалуйста попробуйте заново!</p>";
				echo "<br/><a href='contacts.php'>Назад</a>";
			}
		}
	}else{
		echo <<<LABEL
		<form action="" method="post">
			<label>
				Ваше имя:<br/>
				<input type="text" name="username" placeholder="Костя" class="forms"><br/>
			</label><br/>
			<label>
				Адрес e-mail:<br/>
				<input type="text" name="email" placeholder="mail@example.com" class="forms"><br/>
			</label><br/>
			<label>
				Ваш отзыв:<br/>
				<textarea name="feedback" rows="10" cols="50" placeholder="Введите отзыв"></textarea><br/>
			</label><br/>
			<input type="submit" class="buttons"> 
		</form>
LABEL;
	}
    do_html_footer();




