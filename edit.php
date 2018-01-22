<?php
	require_once 'head.php';
	require_once 'header.php';
	echo $header;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    $id = $_POST['id'];
	$naziv = $_POST['naziv'];
    $kratica = $_POST['kratica'];
    $velicina = $_POST['velicina'];
    $zupan = $_POST['zupan'];

    $sql = 'UPDATE zupanije SET naziv = :naziv,
    kratica = :kratica, velicina = :velicina, zupan = :zupan
    WHERE id = :id';

    $stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id);
    $stmt->bindParam(':naziv', $naziv);
    $stmt->bindParam(':kratica', $kratica);
    $stmt->bindParam(':velicina', $velicina);
    $stmt->bindParam(':zupan', $zupan);
    $stmt->execute();

    header('Location: index.php');
    die;
}
echo $head;

if(!isset($_GET['id'])) {
  die('Nije pronađen id županije');
}

$id = $_GET['id'];

$sql = 'SELECT id, naziv, kratica, velicina, zupan FROM zupanije WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$zupanija = $stmt->fetch();
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 login-wrapper">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
			<div style="margin-bottom: 30px;" ></div>
			<a href="index.php"><button type="button" class="btn btn-info">Povratak</button></a>
              <form style="margin-top: 30px;" class="form" role="form" method="POST" action="edit.php" autocomplete="off">
                <div class="form-group">
                <input type="hidden" value="<?= $zupanija['id'] ?>" name="id" />
                  <label for="naziv">Naziv</label>
                  <input type="text" class="form-control form-control-lg rounded-0" name="naziv" value="<?= $zupanija['naziv'] ?>" required="">
                </div>
                <div class="form-group">
                  <label for="kratica">Kratica</label>
                  <input type="text" name="kratica" class="form-control form-control-lg rounded-0" value="<?= $zupanija['kratica'] ?>">
                </div>
                <div class="form-group">
                  <label for="velicina">Veličina</label>
                  <input type="text" name="velicina" value="<?= $zupanija['velicina'] ?>" class="form-control form-control-lg rounded-0">
                </div>
                <div class="form-group">
                  <label for="zupan">Župan</label>
                  <input type="text" name="zupan" value="<?= $zupanija['zupan'] ?>" class="form-control form-control-lg rounded-0">
                </div>
                <button type="submit" class="btn btn-success float-right btn-lg">Spremi</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>