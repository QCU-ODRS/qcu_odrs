<?php
//PDO database connection
require_once "../../opt/database.php";

//check if data is posting
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

//get the reference
$id =$_GET['document_id'] ?? null;

//make sure id has value
if (!$id){
    header('Location: documents.php');
    exit;
}
//prepare query statement
$statement = $pdo->prepare('SELECT * FROM documents WHERE document_id = :id');
//bind value to placeholders
$statement->bindValue(':id', $id);
$statement->execute();
$document = $statement->fetch(PDO::FETCH_ASSOC);

//errors array
$errors = [];

//variables containing the reference
$title =$document['document_name'];
$requirements =$document['requirements'];

//check if request method is post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "../../opt/validate.php";
//make sure errors is empty
if(empty($errors)){
//prepare query statement
$statement = $pdo->prepare("UPDATE documents SET document_name = :title, requirements = :requirements WHERE document_id = :id");
//bind values to plcaeholders
$statement->bindValue(':title', $title);
$statement->bindValue(':requirements', $requirements);
$statement->bindValue(':id', $id);
$statement->execute();
//redirect
header('Location: documents.php');
    }
}
?>
<!-- refer header -->
<?php include_once "../../opt/header.php"; ?>
<!-- refer navigation bar -->
<?php include_once "../../opt/nav.php"; ?>
<!-- content -->
<h1>UPDATE DOCUMENT&nbsp;<b><?php echo $document['document_name'] ?></b></h1>
<!-- refer form -->
<?php include_once "../../opt/form.php"?>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>