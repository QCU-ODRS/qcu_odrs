<?php
//a function that updates status



//PDO database connection
require_once "../../resource/opt2/database.php";

//store post value
$id = $_POST['request_number'] ?? null;
$status = 'PROCESSING';
echo '<pre>';
echo var_dump($_POST);
echo '</pre>';

//make sure id has value
if (!$id){
    header('Location: in_process_list.php');
    exit;
}
//prepare statement
$statement = $pdo->prepare('UPDATE document_request SET remarks = :stat WHERE request_number = :id');
//bind value to placeholder
$statement->bindValue(':stat', $status);
$statement->bindValue(':id', $id);
$statement->execute();
//redirect
header('Location: in_process_list.php');

?>