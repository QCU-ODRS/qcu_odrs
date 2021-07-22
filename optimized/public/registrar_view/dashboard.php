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
    <body>
        <?php
            require_once("../../resource/opt/tab_filter.php");
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
            // require("../../resource/opt/archivedlist_table.php");
        ?>

        <script src="../../resource/CssJs/script.js"></script>
    </body>
</html>