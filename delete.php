<?php
require('config.php');
$id = $_GET['id'];

$sql = 'DELETE from billet WHERE id_billet=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
    header("location: index.php");
}