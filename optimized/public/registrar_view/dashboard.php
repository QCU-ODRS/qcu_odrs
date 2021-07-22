<?php
//registrar landing page
session_start();

require_once "../../resource/opt2/database.php";
require_once "../../resource/opt2/header.php";
require_once "../../resource/opt2/nav.php";

$view = 'details.php?request_number=';
$search = $_GET['search'] ?? '';
if($search) {
  $statement = $pdo->prepare("SELECT document_request.request_number, document_request.request_date, student_info.student_number, student_info.last_name, documents.document_name FROM document_request INNER JOIN student_info ON document_request.student_number = student_info.student_number JOIN documents ON document_request.document_id = documents.document_id WHERE document_request.request_status IN ('RESUBMIT','PENDING','PROCESSING','RELEASE') AND (student_info.student_number LIKE :student_number OR student_info.full_name LIKE :full_name OR documents.document_name LIKE :document_name) ORDER BY document_request.request_number DESC");
  $statement->bindValue(':stat', $status);
  $statement->bindValue(':document_name', "%$search%");
  $statement->bindValue(':student_number', "%$search%");
  $statement->bindValue(':full_name', "%$search%");
} else {
  $statement = $pdo->prepare("SELECT document_request.request_number, document_request.request_date, student_info.student_number, student_info.last_name, documents.document_name FROM document_request INNER JOIN student_info ON document_request.student_number = student_info.student_number JOIN documents ON document_request.document_id = documents.document_id WHERE document_request.request_status IN ('RESUBMIT','PENDING','PROCESSING','RELEASE') ORDER BY document_request.request_number DESC");
}
$statement->execute();
$requests = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
    <!-- <style>
      <?php
        //require_once "../../resource/CssJs/style.css";
      ?>
    </style> -->
    <title>Dashboard</title>
</head>
    <body style="background-color: #F7F7FF;">
        <form>
        <div class="input-group mb-3">
            <input type="text" class="form-control searchbar" style="position: absolute; left: 40px; top: 175px; width: 1726px; color: #000000; filter: drop-shadow(0px 5px 2px rgba(0, 0, 0, 0.25)); color: #000000;" placeholder="Search Request List">
            <div class="input-group-append">
            <button class="btn btn-outline-secondary btnsearch" style="position: absolute; top: 175px; margin-left: 1767px; width: 100px; filter: drop-shadow(5px 5px 2px rgba(0, 0, 0, 0.25)); color: #000000;" type="submit">Search</button>
            </div>
        </div>

    <body>
        <h1 style="position: absolute; left: 40px; top: 180px;">DETAILS OF REQUEST #</h1>
        <?php
            //require_once("../../resource/opt/tab_filter.php");
            include_once "../../resource/opt2/request_view_table.php";
        ?>
        <hr>
        <?php
            // require("../../resource/opt/requestlist_table.php");
        ?>
        <?php
           // require("pending_list.php");
        ?>
        <?php
            // require("../../resource/opt/in-processlist_table.php");
        ?>
        <?php
            //include "view.php"
        ?>
    </body>
</html>