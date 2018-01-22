<?php
	require_once 'head.php';
	require_once 'header.php';

	if(!isset($_SESSION['korisnik'])){
		header('Location: login.php');
	}
	echo $head;
	echo $header;
	

	$sql = 'SELECT id, naziv, kratica, velicina, zupan FROM zupanije';
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$zupanije = $stmt->fetchAll();
?>
<div class="container">
<div class="jumbotron">
    <div class="row">
        <div class="col-md-6"><img class="img-thumbnail" src='zupanija.png'></div>
        <div class="col-md-6">
            Županije obavljaju poslove od područnog (regionalog) značaja, a koji nisu Ustavom i zakonima dodijeljenim državnim tijelima. Djelokrug županija može biti izvorni (samoupravni) te povjereni (poslove državne uprave).

            Županija u svom samoupravnom djelokrugu obavlja poslove koji se odnose na:
            <ul>
                <li>obrazovanje,</li>
                <li>zdravstvo,</li>
                <li>prostorno i urbanističko planiranje,</li>
                <li>gospodarski razvoj,</li>
                <li>promet i prometnu infrastrukturu,</li>
                <li>održavanje javnih cesta,</li>
                <li>planiranje i razvoj mreže obrazovnih, zdravstvenih, socijalnih i kulturnih ustanova,</li>
                <li>izdavanje građevinskih i lokacijskih dozvola, drugih akata vezanih uz gradnju te provedbu dokumenata prostornog uređenja za područje županije izvan područja velikoga grada,</li>
                <li>te ostale poslove sukladno posebnim zakonima.</li>
            </ul>
            Odlukom predstavničkog tijela jedinice lokalne samouprave (odnosno općine ili grada) u skladu s njezinim statutom i statutom županije, mogu se pojedini poslovi iz samoupravnog djelokruga općine ili grada prenijeti na županiju.

            Povjereni poslovi su poslovi državne uprave koji se obavljaju županije, a odre­đuju se zakonom.
			</div>
			</div>
    </div>
    <div class="container content-wrapper">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-2"><a href="add.php"><button type="button" class="btn btn-default">Dodaj županiju</button></a></div>
            <div class="col-md-2"><a href="gradovi.php"><button type="button" class="btn btn-default">Pregled gradova</button></a></div>
            <div class="col-md-8"></div>
        </div>
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
</div>
