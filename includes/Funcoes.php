<?php
include("Conexao.php");
function confirma($id, $nome) {
	global $conn;
	$id = escape($id);
	$nome = escape($nome);

	$query = "UPDATE teste SET status = '1' WHERE id = ? AND nome = ?";
	$prepare = mysqli_prepare($conn,$query);
	mysqli_stmt_bind_param($prepare,'is', $id,$nome);
	if(mysqli_stmt_execute($prepare)) {
		return true;
	}else{
		return false;
	}
}


function testa($id, $nome) {
	global $conn;
	$id = escape($id);
	$nome = escape($nome);

	$query = "select * from teste WHERE id = ? AND nome = ? AND status = '1'";
	$prepare = mysqli_prepare($conn,$query);
	mysqli_stmt_bind_param($prepare,'is', $id,$nome);
	if(mysqli_stmt_execute($prepare)) {
		$resultado = mysqli_stmt_get_result($prepare);
		if(mysqli_num_rows($resultado) > 0) {
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}










?>
