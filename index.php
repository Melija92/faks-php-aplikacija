<?php
	require_once 'head.php';

	if(!isset($_SESSION['korisnik'])){
		header('Location: login.php');
	}
	echo $head;

	$sql = 'SELECT id, naziv, kratica, velicina, zupan FROM zupanije';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$zupanije = $stmt->fetchAll();
?>
    <div class="container content-wrapper">
	<a href="add.php"><button type="button" class="btn btn-default">Dodaj županiju</button></a>
        <table class="table table-bordered" style="margin-top: 30px;">
            <thead>
                <tr>
                    <th>Broj</th>
                    <th>Naziv</th>
                    <th>Kratica</th>
                    <th>Veličina</th>
                    <th>Župan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($zupanije as $zupanija): ?>
                <tr>
                    <th scope="row"><?= $zupanija['id'] ?></th>
                    <td><?= $zupanija['naziv'] ?></td>
                    <td><?= $zupanija['kratica'] ?></td>
                    <td><?= $zupanija['velicina'] ?></td>
                    <td><?= $zupanija['zupan'] ?></td>
                    <td>
					<center>
                        <a href="edit.php?id=<?= $zupanija['id'] ?>"><img class="img-thumbnail" src='editing.png' /></a>
                        <a href="delete.php?id=<?= $zupanija['id'] ?>"><img class="img-thumbnail" src='brisanje.png' /></a>
                    </center>
					</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>