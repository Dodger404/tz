<?
	require_once 'db.php';

	$db = new db();


	// вывод данных из базы

	$userData = $db->getDb("SELECT * From tz_uzers WHERE tz_status = ?", ["1"]);


	// удаление пользователя

	if (!empty(trim($_POST['id']))) {

		if($db->deliteDb("UPDATE tz_uzers SET tz_status = ? WHERE tz_id = ?", ["0", $_POST['id']])){

			echo json_encode(array('status' => 1));

			$db->disconnect(); // отключение от базы

			exit;

		}

		else {

			echo json_encode(array('status' => 0));

			exit;

		}

	}


	// добавление нового пользователя

	if($_POST['check'] == 1){

		if (!empty(trim($_POST['login'])) && !empty(trim($_POST['pass'])) && !empty(trim($_POST['email']))) {

			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

				if($db->insertDb("INSERT INTO tz_uzers(tz_login, tz_pass, tz_email) VALUE (?, ?, ?)", [$_POST['login'], $_POST['pass'], $_POST['email']])){

					echo json_encode(array('status' => 1));

					$db->disconnect(); // отключение от базы

					exit;

				} else {

					echo json_encode(array('status' => 0));

					exit;

				}
			
			} else {

				echo json_encode(array('status' => 0));

				exit;

			}

		}	else {

			echo json_encode(array('status' => 0));

			exit;

		}

	}

	$db->disconnect(); // отключение от базы

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Панель управления пользователями</title>
	<link rel="stylesheet" href="style.css">
	<script src="jquery.min.js"></script>
	<script src="script.js"></script>
</head>
<body>
	<div class="main_face">
		<div class="main_face_list">
			<? if(isset($userData) && !empty($userData)) :
				foreach($userData as $data) :?>
					<div class="users_list" data-id="<?=$data['tz_id'];?>">
						<div class="users_list_login">
							Логин пользователя: <?=$data['tz_login'];?>
						</div>
						<div class="users_list_pass">
							Пароль пользователя: <?=$data['tz_pass'];?>
						</div>
						<div class="users_list_email">
							Почта пользователя: <?=$data['tz_email'];?>
						</div>
						<div class="delite">
							<button>Удалить</button>
						</div>
					</div>
				<? endforeach ?>
			<? else : ?>
				<div class="users_none">
					К сожалению, ещё не было создано ни одного пользователя, вы моежете стать первым!
				</div>
			<? endif ?>
		</div>
		<div class="button_add">
			<button class="add_user">Добавить нового пользователя</button>
		</div>
	</div>
	<div class="hide_face none">
		<div class="user_list">
			<div class="users_list_login">
				<span class="color_white">Логин пользователя:</span> <br>
				<input type="text" class="add_users_list_login" placeholder="Введите логин">
			</div>
			<div class="users_list_pass">
				<span class="color_white">Пароль пользователя:</span> <br>
				<input type="password" class="add_users_list_pass" placeholder="Введите пароль">
			</div>
			<div class="users_list_email">
				<span class="color_white">Почта пользователя:</span> <br>
				<input type="email" class="add_users_list_email" placeholder="Введите почту">
			</div>
		</div>
		<div class="buttons">
			<div class="button_add-inModal">
				<button class="add">Добавить</button>
			</div>
			<div class="close">
				<button class="close-modal">Отмена</button>
			</div>
		</div>
	</div>
</body>
</html>