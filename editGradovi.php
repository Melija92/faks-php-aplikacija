<?php
	require_once 'head.php';
	require_once 'header.php';
	echo $header;

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
	$naziv = $_POST['naziv'];
    $broj_stanovnika = $_POST['broj_stanovnika'];
    $zupanija_id = $_POST['zupanija_id'];

    $sql = 'UPDATE gradovi SET naziv = :naziv,
    broj_stanovnika = :broj_stanovnika, zupanija_id = :zupanija_id
    WHERE id = :id';

    $stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id);
    $stmt->bindParam(':naziv', $naziv);
    $stmt->bindParam(':broj_stanovnika', $broj_stanovnika);
    $stmt->bindParam(':zupanija_id', $zupanija_id);
    $stmt->execute();

    header('Location: gradovi.php');
    die;
}
echo $head;

if(!isset($_GET['id'])) {
  die('Nije pronađen id grada');
}

$id = $_GET['id'];

$sql = 'SELECT id, naziv, broj_stanovnika, zupanija_id FROM gradovi WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$grad = $stmt->fetch();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 login-wrapper">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div style="margin-bottom: 30px;"></div>
                            <a href="gradovi.php"><button type="button" class="btn btn-info">Povratak na listu</button></a>
                            <form style="margin-top: 30px;" class="form" role="form" method="POST" action="editGradovi.php" autocomplete="off">
                                <div class="form-group">
                                    <input type="hidden" value="<?= $grad['id'] ?>" name="id" />
                                    <label for="naziv">Naziv</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="naziv" value="<?= $grad['naziv'] ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="kratica">Broj stanovnika</label>
                                    <input type="text" name="broj_stanovnika" class="form-control form-control-lg rounded-0" value="<?= $grad['broj_stanovnika'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="velicina">Županija</label>
                                    <input type="text" name="zupanija_id" value="<?= $grad['zupanija_id'] ?>" class="form-control form-control-lg rounded-0">
                                </div>
                                <button type="submit" class="btn btn-default btn-lg">Spremi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>