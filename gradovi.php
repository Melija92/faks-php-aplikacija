<?php
	require_once 'head.php';
	require_once 'header.php';

	if(!isset($_SESSION['korisnik'])){
		header('Location: login.php');
	}
	echo $head;
	echo $header;

	$sql = 'SELECT gr.id, gr.naziv, gr.broj_stanovnika, zu.naziv as `nazivZupanije` FROM gradovi gr INNER JOIN zupanije zu ON gr.zupanija_id = zu.id';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$gradovi = $stmt->fetchAll();
?>
<div class="container">
<div class="jumbotron">
 <div class="row">
  <div class="col-md-6"><img class="img-thumbnail" src='gradovi.jpg' ></div>
  <div class="col-md-6"><p>Važno je znati broj stanovnika na nekom području, ne samo radi izračunavanja demografskog stanja, već i radi ekonomskih, političkih, zdravstvenih i inih prilika na određenom teritoriju.</p>

<p>Hrvatska spada u male države, što je vidljivo prema Popisu stanovništa iz 2001. godine kada je izbrojeno 4.437.460, stanovnika (rezultati objavljeni na web stranicama Državnog zavoda za statistiku - www.dzs.hr). </p>
<p>Prema popisu iz 2001. Hrvatska se nalazi na 117. mjestu po broju stanovnika na Zemlji. Kako je površina Republike Hrvatske iznosi 56.594 km2 tako njena gustoća naseljenosti iznosi 78,48 stan/km2, što Hrvatsku svrstava po sredini ljestvice na Zemlji.</p>
</div>
</div> 
 <div class="row" style="margin-top: 20px;">
  <div class="col-md-2"><a href="addGradovi.php"><button type="button" class="btn btn-default">Dodaj grad</button></a></div>
  <div class="col-md-2"><a href="index.php"><button type="button" class="btn btn-default">Pregled županija</button></a></div>
  <div class="col-md-8"></div>
</div> 
</div>
    <div class="container content-wrapper">
	
        <table class="table table-bordered" style="margin-top: 30px;">
            <thead>
                <tr>
                    <th>Broj</th>
					<th>Naziv</th>
                    <th>Broj stanovnika</th>
					<th>Županija</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($gradovi as $grad): ?>
                <tr>
                    <th scope="row"><?= $grad['id'] ?></th>
                    <td><?= $grad['naziv'] ?></td>
                    <td><?= $grad['broj_stanovnika'] ?></td>
					<td><?= $grad['nazivZupanije'] ?></td>
                    <td>
					<center>
                        <a href="editGradovi.php?id=<?= $grad['id'] ?>"><img class="img-thumbnail" src='editing.png' /></a>
                        <a href="deleteGradovi.php?id=<?= $grad['id'] ?>"><img class="img-thumbnail" src='brisanje.png' /></a>
                    </center>
					</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
	
</div>