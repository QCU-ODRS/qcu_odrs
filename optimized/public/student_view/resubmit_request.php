<?php

session_start();

    require_once "../../resource/opt1/database.php";
    include_once "../../resource/opt1/header.php";
$student_number = $_SESSION['student_number'];
$search = $_GET['search'] ?? '';
if($search) {
  $statement = $pdo->prepare("SELECT document_request.request_number, document_request.request_date, student_info.student_number, student_info.last_name, documents.document_name, documents.requirements, document_request.remarks FROM document_request INNER JOIN student_info ON document_request.student_number = student_info.student_number JOIN documents ON document_request.document_id = documents.document_id WHERE (documents.document_name LIKE :document_name) AND document_request.request_status LIKE 'RESUBMIT' AND student_info.student_number = :student_number ORDER BY document_request.request_number DESC");
  $statement->bindValue(':document_name', "%$search%");
  $statement->bindValue(':student_number', $student_number);
} else {
  $statement = $pdo->prepare("SELECT document_request.request_number, document_request.request_date, student_info.student_number, student_info.last_name, documents.document_name, documents.requirements, document_request.remarks FROM document_request INNER JOIN student_info ON document_request.student_number = student_info.student_number JOIN documents ON document_request.document_id = documents.document_id WHERE document_request.request_status LIKE 'RESUBMIT' AND student_info.student_number = :student_number ORDER BY document_request.request_number DESC");
  $statement->bindValue(':student_number', $student_number);
}
$statement->execute();
$requests = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($requests);
// echo '</pre>';
?>
<title>Resubmit Request</title>
  </head>
  <body>
<?php include_once "../../resource/opt1/nav.php"; ?>
<h1>RESUBMIT REQUESTS</h1>
<p>
  <a href="create.php" class="btn btn-success">Add Request</a>
</p>

<form>
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Search Pending Requests" name="search" value="<?php echo $search?>">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
</div>

</form>
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Student Number</th>
      <th scope="col">Last Name</th>
      <th scope="col">Document</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($requests as $i => $request): ?>
      <tr>
        <th scope="row"><?php echo $i + 1 ?></th>
        <td><?php echo $request['request_date']?></td>
        <td><?php echo $request['student_number']?></td>
        <td><?php echo $request['full_name']?></td>
        <td><?php echo $request['document_name']?></td>
        <td>
        <form>
        <a href="resubmit_view.php?request_number=<?php echo $request['request_number'] ?>"  class="btn btn-sm btn-outline-primary">View Details</a>
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
