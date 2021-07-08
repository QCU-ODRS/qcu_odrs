<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=qcu_ords', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id =$_POST['document_id'] ?? null;

if (!$id){
    header('Location: documents.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM documents WHERE document_id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: documents.php');

?>