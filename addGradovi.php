<?php
	require_once 'head.php';
	require_once 'header.php';
	echo $header;

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $naziv = $_POST['naziv'];
    $broj_stanovnika = $_POST['broj_stanovnika'];
    $zupanija_id = $_POST['zupanija_id'];

    $sql = 'INSERT INTO gradovi (naziv, broj_stanovnika, zupanija_id) VALUES
            (:naziv, :broj_stanovnika, :zupanija_id)';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':naziv', $naziv);
    $stmt->bindParam(':broj_stanovnika', $broj_stanovnika);
    $stmt->bindParam(':zupanija_id', $zupanija_id);
    $stmt->execute();

    header('Location: gradovi.php');
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
						<div style="margin-bottom: 30px;"></div>
						<a href="gradovi.php"><button type="button" class="btn btn-info">Povratak na listu</button></a>
                            <form style="margin-top: 30px;" class="form" role="form" method="POST" action="addGradovi.php" autocomplete="off">
                                <div class="form-group">
                                    <input type="hidden" name="id" />
                                    <label for="naziv">Naziv</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="naziv" required="">
                                </div>
                                <div class="form-group">
                                    <label for="broj_stanovnika">Broj stanovnika</label>
                                    <input type="text" name="broj_stanovnika" class="form-control form-control-lg rounded-0">
                                </div>
                                <div class="form-group">
                                    <label for="zupanija_id">Županija</label>
                                    <input type="number" name="zupanija_id" class="form-control form-control-lg rounded-0">
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