<?php
//a function that updates status



//PDO database connection
require_once "../../resource/opt1/database.php";

//store post value
$id = $_GET['request_number'] ?? null;
$status = 'CANCELLED';
$fn_date = date('Y-m-d');

echo '<pre>';
echo var_dump($_POST);
echo '</pre>';

//make sure id has value
if (!$id){
    header('Location: pending_request.php');
    exit;
}
//prepare statement
$statement = $pdo->prepare('UPDATE document_request SET request_status = :stat, date_finished = :a_date WHERE request_number = :id');
//bind value to placeholder
$statement->bindValue(':stat', $status);
$statement->bindValue(':a_date', $fn_date);
$statement->bindValue(':id', $id);
$statement->execute();
//redirect
header('Location: pending_request.php');

?>