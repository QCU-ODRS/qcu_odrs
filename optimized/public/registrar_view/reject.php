<?php

// user click table row -> action: reject




require_once "../../resource/opt2/database.php";

$id =$_GET['request_number'] ?? null;
$remarks = '';
$status = 'RESUBMIT';
// echo '<pre>';
// var_dump($_GET);
// echo '</pre>';
// exit;
if (!$id){
    header('Location: pending_list.php');
    exit;
}
$query = $pdo->prepare('SELECT remarks FROM document_request WHERE request_number = :id');
//bind value to placeholders
$query->bindValue(':id', $id);
$query->execute();
$requests = $query->fetch(PDO::FETCH_ASSOC);

$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty($errors)){
    $statement = $pdo->prepare("UPDATE document_request SET remarks = :remarks, request_status = :stat WHERE request_number = :id");

    $statement->bindValue(':stat', $status);
    $statement->bindValue(':remarks', $remarks);
    $statement->bindValue(':id', $id);
    $statement->execute();

    header('Location: pending_list.php');
    }
}
?>

<?php include_once "../../resource/opt2/header.php"; ?>
<?php include_once "../../resource/opt2/nav.php"; ?>

<h1>REJECT&nbsp;<b><?php echo $id ?></b></h1>
<form action ="" method="post">
    <div class="form-group">
        <label>Remarks</label>
        <textarea class="form-control" name="remarks" placeholder="Please leave a remark" value="<?php if(!$requests['remarks']) {
            echo $requests['remarks']; 
        }    
        ?>"></textarea>
        
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>






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