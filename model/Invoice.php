<?php 

class Invoice {
	private $sellDate;
	private $numberInv;
	private $buyer;

	function __construct($sellDate, $numberInv, $buyer) {
		include '../config.php';

		$this->$sellDate = $sellDate;
		$this->$numberInv = $numberInv;
		$this->$buyer = $buyer;
		$dateNow = date('Y-m-d');

		$stmi = $pdo->prepare("INSERT INTO invoice(SELLDATE, DATE, NUMBER, BUYER_NAME) VALUES (:sellDate, :dateNow, :numberInv, :buyer)");
		$stmi->bindValue(':sellDate', $sellDate);
		$stmi->bindValue(':dateNow', $dateNow);
		$stmi->bindValue(':numberInv', $numberInv);
		$stmi->bindValue(':buyer', $buyer);
		$stmi->execute();
	}
}