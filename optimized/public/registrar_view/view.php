<?php
// user click table row 
session_start();



require_once "../../resource/opt2/database.php";
include_once "../../resource/opt2/header.php";

// echo '<pre>';
// echo var_dump($_GET);
// echo '</pre>';

$request_get = $_GET['request_number'];

$statement = $pdo->prepare("SELECT document_request.request_number, document_request.request_date, student_info.student_number, student_info.full_name, student_info.course, student_info.year_of_enrollment, documents.document_name, documents.requirements,document_request.purpose, document_request.details, document_request.remarks, document_request.upfile, document_request.upfile_name FROM document_request INNER JOIN student_info ON document_request.student_number = student_info.student_number JOIN documents ON document_request.document_id = documents.document_id WHERE document_request.request_number = :request_get");
$statement->bindValue(':request_get', $request_get);
$statement->execute();
$requests = $statement->fetchAll(PDO::FETCH_ASSOC);


?>
    <title>Request Details</title>
  </head>
  <body>
<?php include_once "../../resource/opt2/nav.php";?>
<h1>DETAILS<?php echo ' OF REQUEST#'.$request_get?></h1>

<table class="table" style="position: absolute; width: 1825px; left: 40px; top: 300px; filter: drop-shadow(10px 10px 2px rgba(0, 0, 0, 0.25)); background-color: #87CEEB; text-align: center; background-color: #87CEEB;">
  <thead class="table-dark">
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Student Number</th>
      <th scope="col">Full Name</th>
      <th scope="col">Course</th>
      <th scope="col">Year of Admission</th>
      <th scope="col">Document Name</th>
      <th scope="col">Requirements</th>
      <th scope="col">Purpose</th>
      <th scope="col">Details</th>
      <th scope="col">Remarks</th>
      <th scope="col">Attachments</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($requests as $i => $request): ?>
      <tr>
        <td><?php echo $request['request_date']?></td>
        <td><?php echo $request['student_number']?></td>
        <td><?php echo $request['full_name']?></td>
        <td><?php echo $request['course']?></td>
        <td><?php echo $request['year_of_enrollment']?></td>
        <td><?php echo $request['document_name']?></td>
        <td><?php echo $request['requirements']?></td>
        <td><?php echo $request['purpose']?></td>
        <td><?php echo $request['details']?></td>
        <td>
            <?php
                if($request['remarks'] == NULL){
                    echo '<i>No Remarks</i>';
                }
                else{
                    echo $request['remarks'];
                }
                
            ?>
        </td>
        <td>
        <?php
            if($request['upfile'] != NULL && $request['upfile_name'] != NULL): 
                $arr_name = explode(' ', $request['upfile_name']);
                for($j = 0; $j < count($arr_name); $j++):
        ?>
                <a href="<?php echo $request['upfile'].'/'.$arr_name[$j]; ?>" target="_blank"><?php echo $arr_name[$j]?></a><br>
                <?php endfor;
                 else: ?>
                     <i>No Attachments</i>
                <?php
                endif ?>
        </td>
        <td>
        <form method="post"  action="approve.php">
          <input type="hidden" name="request_number" value="<?php echo $request['request_number'] ?>" />
          <button type="submit" class="btn btn-sm btn-outline-success">Approve</button>
        </form>
        <br>
        <a onclick="return confirm('Are you sure?')" href="reject.php?request_number=<?php echo $request['request_number'] ?>"  class="btn btn-sm btn-outline-danger">Reject</a>
        </td>
        </tr>
    <?php endforeach ?>

  </tbody>
</table>
</body>
</html>