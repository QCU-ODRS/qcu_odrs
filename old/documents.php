<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=qcu_ords', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search = $_GET['search'] ?? '';
if($search) {
  $statement = $pdo->prepare('SELECT * FROM documents WHERE document_name LIKE :title ORDER BY document_id ASC');
  $statement->bindValue(':title', "%$search%");
} else {
  $statement = $pdo->prepare('SELECT * FROM documents ORDER BY document_id ASC');
}
$statement->execute();
$documents = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($documents);
// echo '</pre>';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>QCU ORDS</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <!-- Navbar content -->
  <a class="navbar-brand" href="dashboard.php">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="documents.php">Document List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Logout</a>
      </li>
    </ul>
  </div>
</nav>

  <h1>DOCUMENTS</h1>
<p>
  <a href="create.php" class="btn btn-success">Add Document </a>
</p>

<form>
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search Documents" name="search" value="<?php echo $search?>">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</div>
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
