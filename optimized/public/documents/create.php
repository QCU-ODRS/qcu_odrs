<?php

require_once "../../opt/database.php";

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

$errors = [];

$title ='';
$requirements ='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once "../../opt/validate.php";

if(empty($errors)){
$statement = $pdo->prepare("INSERT INTO documents (document_name, requirements) VALUES (:title, :requirements)");

$statement->bindValue(':title', $title);
$statement->bindValue(':requirements', $requirements);
$statement->execute();
header('Location: documents.php');
    }
}

include_once "../../opt/header.php";
include_once "../../opt/nav.php"; 
?>


  <h1>ADD DOCUMENT</h1>
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
