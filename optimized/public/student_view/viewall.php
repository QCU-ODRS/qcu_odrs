<?php

session_start();

    require_once "../../resource/opt1/database.php";
    require_once "../../resource/opt1/header.php";


    
    $request_get = $_GET['request_number'];

    

    $statement = $pdo->prepare("SELECT document_request.request_number, document_request.request_date, student_info.student_number, student_info.full_name, student_info.course, student_info.year_of_enrollment, documents.document_name, documents.requirements, document_request.purpose, document_request.details, document_request.remarks, document_request.upfile, document_request.upfile_name, document_request.date_approved, document_request.date_released FROM document_request INNER JOIN student_info ON document_request.student_number = student_info.student_number JOIN documents ON document_request.document_id = documents.document_id WHERE document_request.request_number = :request_get");
    $statement->bindValue(':request_get', $request_get);
    $statement->execute();
    $requests = $statement->fetchAll(PDO::FETCH_ASSOC);

    // echo '<pre>';
    // echo var_dump($requests);
    // echo '</pre>';
?>
<title>Request Details</title>
  </head>
  <body>
<?php require_once "../../resource/opt1/nav.php";?>
<!-- content -->
<h1>REQUEST DETAILS</h1>
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Student Number</th>
      <th scope="col">Full Name</th>
      <th scope="col">Course</th>
      <th scope="col">Year of Admission</th>
      <th scope="col">Document</th>
      <th scope="col">Requirements</th>
      <th scope="col">Purpose</th>
      <th scope="col">Details</th>
      <th scope="col">Remarks</th>
      <th scope="col">Attachments</th>
      <th scope="col">Date Approved</th>
      <th scope="col">Date of Release</th>
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
                <a href="<?php echo $request['upfile'].'/'.$arr_name[$j] ?>" target="_blank"><?php echo $arr_name[$j]?></a><br>
                <?php endfor;
                 else: ?>
                     <i>No Attachments</i>
            <?php
            endif ?>
        </td>
            
        <td><?php echo $request['date_approved']?></td>
        <td><?php echo $request['date_released']?></td>
        </tr>
    <?php endforeach ?>

  </tbody>
</table>
  </body>
</html>