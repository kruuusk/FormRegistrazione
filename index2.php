<?php 
	$conn= mysqli_connect("localhost","root","");
		mysqli_select_db($conn, "andrea");
	?>
<!DOCTYPE html>
<html>
<head>
	<title>cancellare utenti</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		if (isset($_GET["elimina"])) {
			$sql="DELETE FROM utenti WHERE id=". $_GET["id"] .";";
			mysqli_query($conn, $sql);
			echo "UTENTE ELIMINATO";
		}
		if (isset($_GET["modifica"])) {
			
			echo "MODIFICA";
	?>
			<form action="index2.php">
				<label>COGNOME:<input type="text" name="cognome" placeholder="<?= $_GET["cognome"]?>"></label>
				<br>
				<label>NOME:<input type="text" name="nome" placeholder="<?= $_GET["nome"]?>"></label>
				<br>
				<input type="hidden" name="id" value="<?= $_GET["id"] ?>">
					<input type="submit" name="cambia" value="modifica">
			</form>
	<?php 
		}
		if (isset($_GET["cambia"])) {
			$sql="UPDATE utenti SET cognome='".$_GET["cognome"]."', nome = '".$_GET["nome"]."' WHERE utenti.id=".$_GET["id"].";";
			mysqli_query($conn, $sql);
			echo "UTENTE MODIFICATO";
		}
	?>
		<table style="border-collapse: collapse; font-size: 20px;">
			<tr>
				<td>NOME</td>
				<td>COGNOME</td>
				<td>ELIMINA</td>
			</tr>
	<?php
		$sql= "SELECT * FROM utenti;";
		$result= mysqli_query($conn, $sql);
			while ($row= mysqli_fetch_array($result)) {
				//echo $row["cognome"] ." ". $row["nome"];
	?>
				<tr>
					<td><?= $row["nome"] ?></td>
					<td><?= $row["cognome"] ?></td>
					<td>
						<a href="index2.php?elimina=ok&id=<?= $row["id"] ?>">
							<img src="cestino.jpg" style="width: 15px; height: 15px;">
						</a>
						<a href="index2.php?modifica=ok&id=<?= $row["id"] ?>&nome=<?= $row["nome"] ?>&cognome=<?= $row["cognome"] ?>">
							<img src="edit.jpg" style="width: 15px; height: 15px;">
						</a>
					</td>
				</tr>
	<?php
			}
	?>
		</table>
</body>
</html>