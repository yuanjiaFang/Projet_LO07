<?php 
	function connexion() {
		include("params.inc.php");
		$id = mysqli_connect($host, $user, $password, $dbname);
		mysqli_set_charset($id, 'utf8');
		if (!$id) {
			die('Erreur de connexion à la base : [' . mysqli_connect_errno() . '] ' . mysqli_connect_error());
		}

		return $id;
	}
?>