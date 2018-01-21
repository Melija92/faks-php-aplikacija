<?php
require_once 'head.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    $naziv = $_POST['naziv'];
    $kratica = $_POST['kratica'];
    $velicina = $_POST['velicina'];
    $zupan = $_POST['zupan'];

    $sql = 'INSERT INTO zupanije (naziv, kratica, velicina, zupan) VALUES
            (:naziv, :kratica, :velicina, :zupan)';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':naziv', $naziv);
    $stmt->bindParam(':kratica', $kratica);
    $stmt->bindParam(':velicina', $velicina);
    $stmt->bindParam(':zupan', $zupan);
    $stmt->execute();

    header('Location: index.php');
    die;
}
echo $head;
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 login-wrapper">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <form class="form" role="form" method="POST" action="add.php" autocomplete="off">
                <div class="form-group">
                <input type="hidden" name="id" />
                  <label for="naziv">Naziv</label>
                  <input type="text" class="form-control form-control-lg rounded-0" name="naziv" required="">
                </div>
                <div class="form-group">
                  <label for="kratica">Kratica</label>
                  <input type="text" name="kratica" class="form-control form-control-lg rounded-0">
                </div>
                <div class="form-group">
                  <label for="first-name">Velicina</label>
                  <input type="text" name="velicina" class="form-control form-control-lg rounded-0">
                </div>
                <div class="form-group">
                  <label for="last-name">Župan</label>
                  <input type="text" name="zupan" class="form-control form-control-lg rounded-0">
                </div>
                <button type="submit" class="btn btn-success float-right">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>