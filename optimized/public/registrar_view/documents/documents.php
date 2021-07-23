<?php
//this is the view of listed documents
session_start();



//PDO database connection
require_once "../../../resource/opt/database.php";

//search algorithm
$search = $_GET['search'] ?? '';
if($search) {
  $statement = $pdo->prepare('SELECT * FROM documents WHERE document_name LIKE :title ORDER BY document_id ASC');
  $statement->bindValue(':title', "%$search%");
} else {
  $statement = $pdo->prepare('SELECT * FROM documents ORDER BY document_name ASC');
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
<title>Documents</title>
  </head>
  <body>
<!-- refer navigation bar -->
<?php include_once "../../../resource/opt/nav.php"; ?>

<!-- content -->
  <h1 style="position: absolute; left: 40px; top: 175px;">DOCUMENTS</h1>

<!-- add document button -->
<p>
  <a href="create.php" class="btn btn-success" style="position: absolute; left: 1735px; top: 175px;">Add Document </a>
</p>


<!-- search field -->
<form>
  <div class="input-group mb-3">
    <input type="text" class="form-control searchbar" style="position: absolute; left: 40px; top: 155px; width: 1726px; color: #000000; filter: drop-shadow(0px 5px 2px rgba(0, 0, 0, 0.25)); color: #000000;" placeholder="Search Documents" name="search" value="<?php echo $search?>">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary btnsearch" style="position: absolute; top: 155px; margin-left: 1767px; width: 100px; filter: drop-shadow(5px 5px 2px rgba(0, 0, 0, 0.25)); color: #000000;" type="submit">Search</button>
    </div>
</div>

<!-- table view -->
</form>
<!-- <table class="table" > -->
<table>
  <thead class="table-dark">
    <tr class="bg-dark" style="color: white;">
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
