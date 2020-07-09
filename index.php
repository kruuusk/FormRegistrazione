<!DOCTYPE html>
<html>
<head>
	<title>form</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		$conn= mysqli_connect("localhost","root","");
		mysqli_select_db($conn, "andrea");
		if (isset($_POST["cognome"]) and isset($_POST["nome"]) and isset($_POST["indirizzo"]) and isset($_POST["citta"]) and isset($_POST["data"])) {
				if ($conn) {
					echo "LA CONNESSIONE FUNZIONA";
					$sql="INSERT INTO utenti (cognome, nome, indirizzo, data_nascita, citta_id) VALUES ('" . $_POST["cognome"] . "','" . $_POST["nome"] . "','" . $_POST["indirizzo"] . "','" . $_POST["data"] . "'," . $_POST["citta"] . ")";
					mysqli_query ($conn, $sql);
				}
				else 
					die ("ERRORE DI CONNESSIONE: " . mysqli_connect_error());
		}
	?>
	<form action="index.php" method="post">
		<label>COGNOME: <input type="text" name="cognome"></label>
		<br>
		<label>NOME: <input type="text" name="nome"></label>
		<br>
		<label>INDIRIZZO: <input type="text" name="indirizzo"></label>
		<br>
		<label>DATA DI NASCITA: <input type="date" name="data"></label>
		<br>
		<label>CITTA':
			<select name="citta">
		<?php 
			$sql="SELECT * FROM citta;";
			$apu= mysqli_query ($conn, $sql);
				while($a= mysqli_fetch_array($apu)){
		?>
					<option value="<?=$a['id'];?>">
							<?=$a['nome_citta'];?>
					</option>
		<?php 

					//echo $a['id'] ." ". $a['nome_citta'];
				}
		?> 
			</select>	
		</label>
		<br>
		<input type="submit" value="REGISTRA">
	</form>
</body>
</html>