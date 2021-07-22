<?php
//showing request records
session_start();


    require_once "../../resource/opt2/database.php";
    include_once "../../resource/opt2/header.php";
    
$view = 'view.php?request_number=';
$status = 'PENDING';
$search = $_GET['search'] ?? '';
if($search) {
  $statement = $pdo->prepare("SELECT document_request.request_number, document_request.request_date, student_info.student_number, student_info.last_name, documents.document_name FROM document_request INNER JOIN student_info ON document_request.student_number = student_info.student_number JOIN documents ON document_request.document_id = documents.document_id WHERE document_request.request_status = :stat AND (student_info.student_number LIKE :student_number OR student_info.full_name LIKE :full_name OR documents.document_name LIKE :document_name) ORDER BY document_request.request_number DESC");
  $statement->bindValue(':stat', $status);
  $statement->bindValue(':document_name', "%$search%");
  $statement->bindValue(':student_number', "%$search%");
  $statement->bindValue(':full_name', "%$search%");
} else {
  $statement = $pdo->prepare("SELECT document_request.request_number, document_request.request_date, student_info.student_number, student_info.last_name, documents.document_name FROM document_request INNER JOIN student_info ON document_request.student_number = student_info.student_number JOIN documents ON document_request.document_id = documents.document_id WHERE document_request.request_status = :stat ORDER BY document_request.request_number DESC");
}
$statement->bindValue(':stat', $status);
$statement->execute();
$requests = $statement->fetchAll(PDO::FETCH_ASSOC);

//use code for debugging
// echo '<pre>';
// var_dump($requests);
// echo '</pre>';
?>
    <!-- <style>
    <?php
        //include "../../resource/CssJs/style.css";
      ?>
    </style> -->
    <title>Pending List</title>
</head>
<body>
<?php include_once "../../resource/opt2/nav.php"; ?> 
<h1 style="position: absolute; left: 40px; top: 180px;">PENDING REQUESTS</h1>

<form class="form">
  <div class="input-group mb-3">
    <input type="text" class="form-control searchbar" style="position: absolute; left: 40px; top: 175px; width: 1726px; color: #000000; filter: drop-shadow(0px 5px 2px rgba(0, 0, 0, 0.25)); color: #000000;" placeholder="Search Pending Requests" name="search" value="<?php echo $search?>">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary btnsearch" style="position: absolute; top: 175px; margin-left: 1767px; width: 100px; filter: drop-shadow(5px 5px 2px rgba(0, 0, 0, 0.25)); color: #000000;" type="submit">Search</button>
    </div>
</div>

<?php
  include_once "../../resource/opt2/request_view_table.php";

?>

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
