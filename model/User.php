<?php
session_start();
class User {
	private $login;
	private $pass;
	private $pass2;
	private $email;

	function register($login, $pass, $password2, $email) {
		include '../config.php';

		$this->$login = $login;
		$this->$pass = $pass;
		$this->$pass2 = $password2;
		$this->$email = $email;

		$login = htmlspecialchars(trim($login));
		$pass = htmlspecialchars(trim($pass));
		$pass2 = htmlspecialchars(trim($password2));
		$email =  htmlspecialchars(trim($email));

		//sprawdzam czy login nie jest już w bazie
		$stmt = $pdo->prepare('SELECT LOGIN FROM users where LOGIN = :log');
		$stmt->bindValue(':log', $login, PDO::PARAM_STR);
		$stmt->execute();

		if(!$stmt->rowCount())
		{

			if($pass === $pass2) // sprawdzam czy hasła są takie same
			{
				$pass = sha1(md5($pass));
				$stmi = $pdo->prepare('INSERT INTO users (LOGIN, PASSWORD, EMAIL) VALUES (:log, :pass, :email)');
				$stmi->bindValue(':log', $login, PDO::PARAM_STR);
				$stmi->bindValue(':pass', $pass, PDO::PARAM_STR);
				$stmi->bindValue(':email', $email, PDO::PARAM_STR);
				$stmi->execute();

				$_SESSION['REGOK'] = 1;
				header('Location: ../log.php');

			} else {

				$_SESSION['REGBADPASS'] = 1;
				header('Location: ../log.php');
			}	

		} else {

			$_SESSION['REGBADLOG'] = 1;
			header('Location: ../log.php');
		}
	}

	function logIn($login, $pass) {
		include '../config.php';

		$this->$login = $login;
		$this->$pass = $pass;

		$login = htmlspecialchars(trim($login));
		$pass = htmlspecialchars(trim($pass));
		
		$stms = $pdo->prepare('SELECT LOGIN, PASSWORD FROM users WHERE BINARY LOGIN = :login');
		$stms->bindValue(':login', $login);
		$stms->execute();
		$ar = $stms->fetch(PDO::FETCH_ASSOC);

		$password2 = $ar['PASSWORD'];

		if($stms->rowCount()) {
			$pass = sha1(md5($pass));
			if($pass == $password2) {
				$_SESSION['LOGIN'] = $login;
				header('Location: ../controller/fillIn.php');
			} else {
				$_SESSION['PASSERR'] = 1;
				header('Location: ../log.php');
			}

		}  else {
			$_SESSION['ACCERR'] = 1;
			header('Location: ../log.php');
		}
	}

	function logOut() {
		session_destroy();
		header('Location: ../log.php');
	}
}