<?php
//PDO database connection
require_once "../../../resource/opt/database.php";

//search algorithm
$search = $_GET['search'] ?? '';
if($search) {
  $statement = $pdo->prepare('SELECT * FROM documents WHERE document_name LIKE :title ORDER BY document_id ASC');
  $statement->bindValue(':title', "%$search%");
} else {
  $statement = $pdo->prepare('SELECT * FROM documents ORDER BY document_id ASC');
}
$statement->execute();
$documents = $statement->fetchAll(PDO::FETCH_ASSOC);

//check if fetching
// echo '<pre>';
// var_dump($documents);
// echo '</pre>';
?>



<!-- refer header -->
<?php include_once "../../../resource/opt/header.php"; ?>
<!-- refer navigation bar -->
<?php include_once "../../../resource/opt/nav.php"; ?>

<!-- content -->
  <h1>DOCUMENTS</h1>

<!-- add document button -->
<p>
  <a href="create.php" class="btn btn-success">Add Document </a>
</p>


<!-- search field -->
<form>
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search Documents" name="search" value="<?php echo $search?>">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</div>

<!-- table view -->
</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Requirements</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($documents as $i => $document): ?>
      <tr>
        <th scope="row"><?php echo $i + 1 ?></th>
        <td><?php echo $document['document_name']?></td>
        <td><?php echo $document['requirements']?></td>
        <td>
        <a href="update.php?document_id=<?php echo $document['document_id'] ?>"  class="btn btn-sm btn-outline-primary">Edit</a>
        <form style="display: inline-block" method="post"  action="delete.php">
          <input type="hidden" name="document_id" value="<?php echo $document['document_id'] ?>" />
          <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
        </form>
        </td>
        
      </tr>
    <?php endforeach ?>
  </tbody>
</table>







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
