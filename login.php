<?php
	session_start();
	require_once 'db.php';
	
	if(isset($_SESSION['user'])){
		header('Location: index.php');
	}
	
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql = 'SELECT id, email, password, first_name, last_name, is_active FROM users WHERE email = :email';
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	
	$user = $stmt->fetch();
	
	if(!password_verify($password, $user['password'])){
		die('Korisnicko ime ili lozinka nije ispravno uneseno');
	}
	
	$_SESSION['user'] = $user;
	
	header('Location:index.php');
	die;
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
	<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top:50px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Dobrodošli!</div>
                <div class="panel-body">
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
                </div>
                <div class="panel-footer">
                    Prijavi se u aplikaciju</div>
            </div>
        </div>
    </div>
</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>