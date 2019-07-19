<?php
class Sql {
	private $login;
	private $clientID;
	private $clientSecret;
	private $id;
	private $table;
	private $condition;

	function insert($login, $clientID, $clientSecret) {
		include '../config.php';
		
		$this->$login = $login;
		$this->$clientID = $clientID;
		$this->$clientSecret = $clientSecret;

		$stmi = $pdo->prepare("INSERT INTO alldata (CLIENTID, CLIENTSECRET, LOGIN) VALUES (:con0, :con1, :con2)");
		$stmi->bindValue(':con0', $clientID);
		$stmi->bindValue(':con1', $clientSecret);
		$stmi->bindValue(':con2', $login);
		$stmi->execute();

		header('Location: ../getData.php');
	}

	function selectInvoice($login, $id) {
		include '../config.php';

		$login = $_SESSION['LOGIN'];
		$id = $_GET['id'];
		$stms = $pdo->prepare('SELECT * FROM orders
			INNER JOIN ordersinvoice ON orders.ORDERID = ordersinvoice.ORDERID WHERE orders.ID = :id');
		// $stms->bindValue(':log', $login);
		$stms->bindValue(':id', $id);
		$stms->execute();
		$results = $stms->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	function select($login, $table, $condition) {
		include '../config.php';

		$this->$login = $login;
		$this->$table = $table;
		$this->$condition = $condition;

		$stms = $pdo->prepare("SELECT * FROM $table WHERE $condition");
		$stms->bindValue(':con', $login);
		$stms->execute();
		$dataResults = $stms->fetchAll(PDO::FETCH_ASSOC);
		return $dataResults;
	}

	function update($table, $id) {
		include '../config.php';

		$this->$table = $table;
		$this->$id = $id;

		$stmu = $pdo->prepare('UPDATE '.$table.' SET INVOICE = 1 WHERE ID = :id ');
		$stmu->bindValue(':id', $id);
		$stmu->execute();
	}
}