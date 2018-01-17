<?php
	session_start();
	require_once 'db.php';
	if(!isset($_SESSION['user'])){
		header('Location: login.php');
	}
	
	$sql = 'SELECT id, Naziv, Velicina, BrojStanovnika FROM gradovi';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$gradovi = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<title>dsucic Aplikacija</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<h3>Tablica unesenih gradova</h3>

	<div class="container content-wrapper">
		<table class="table table-striped">
			<thead>
			<tr>
				<th></th>
				<th>Naziv</th>
				<th>Veličina</th>
				<th>Broj stanovnika</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($gradovi as $grad): ?>
			<tr>
				<th scope="row"><?= $grad['id'] ?></th>
				<td><?= $grad['Naziv'] ?></td>
				<td><?= $grad['Velicina'] ?></td>
				<td><?= $grad['BrojStanovnika'] ?></td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>