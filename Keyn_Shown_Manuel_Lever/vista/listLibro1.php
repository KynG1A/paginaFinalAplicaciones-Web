<?PHP
echo"NOSIRVE";
	$pais = $_POST['pais'];
	if($_POST['pais']){
		$link = new mysqli('localhost','test','12345678','biblioteca');
		$sql = "SELECT * FROM libros where categoria = '$pais'";
		$result = $link->query($sql);
		$arr='';
		while ($fil = $result->fetch_assoc())$arr.=','.$fil['nombreLibro'];		
	}
	echo $arr;//Retorno la Info Solicitada
	mysqli_close($link);
/*
tabla ciudades
	VARCHAR (30) nombre
	INT (4) id (PK)
	INT (4) id_pais
*/
?>
