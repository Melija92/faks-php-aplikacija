<?php
	session_start();
	require_once 'db.php';
	if(!isset($_SESSION['user'])){
		header('Location: login.php');
	}
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$naziv = $_POST['email'];
	$velicina = $_POST['velicina'];
	$brojStanovnika = $_POST['brojStanovnika']
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>dsucic app</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<style>
	
	</style>
</head>
<body>
                    <form class="form-horizontal" role="form" method="POST" action"login.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Email</label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>