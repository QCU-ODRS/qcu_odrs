<?php
//a function that deletes a document
session_start();


//PDO database connection
require_once "../../opt/database.php";

//store post value
$id =$_POST['document_id'] ?? null;

//make sure id has value
if (!$id){
    header('Location: documents.php');
    exit;
}
//prepare statement
$statement = $pdo->prepare('DELETE FROM documents WHERE document_id = :id');
//bind value to placeholder
$statement->bindValue(':id', $id);
$statement->execute();
//redirect
header('Location: documents.php');

?>