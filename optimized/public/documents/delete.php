<?php

require_once "../../opt/database.php";

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