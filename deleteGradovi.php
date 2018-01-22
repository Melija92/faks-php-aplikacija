<?php
require_once 'head.php';
if(!isset($_GET['id'])) {
  die('Ne postoji id');
}

$id = (int)$_GET['id'];

$sql = 'DELETE FROM gradovi WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: gradovi.php');
die();
