<?php
	session_start();
	require_once 'db.php';
	
	if(isset($_SESSION['korisnik'])){
		header('Location: index.php');
	}
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql = 'SELECT id, email, zaporka, ime, prezime FROM korisnici WHERE email = :email';
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	
	$korisnik = $stmt->fetch();
	
	if(!password_verify($password, $korisnik['zaporka'])){
		die('Korisnicko ime ili lozinka nije ispravno uneseno');
	}
	
	$_SESSION['korisnik'] = $korisnik;
	
	header('Location:index.php');
	die;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login u app</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="jumbotron">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top:50px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Dobrodošli na dsucic aplikaciju!</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action"login.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" placeholder="Upiši email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Zaporka</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" placeholder="Upiši zaporku" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm">
                                Prijava</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-footer">
                    Prijavi se u aplikaciju</div>
            </div>
        </div>
    </div>
</div>
</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>