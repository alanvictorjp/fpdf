<?php
        global $conn;
        $conn = mysqli_connect('localhost', 'alan', 'teste', 'teste');

	function dump($dados) {
		echo "<pre>";
		print_r($dados);
		echo "</pre>";
	}

	function escape($data) {
		global $conn;
		mysqli_query($conn, "SET NAMES 'utf8'");
		mysqli_query($conn, 'SET character_set_connection=utf8');
		mysqli_query($conn, 'SET character_set_client=utf8');
		mysqli_query($conn, 'SET character_set_results=utf8');
        	return mysqli_real_escape_string($conn, $data);
	};

?>
