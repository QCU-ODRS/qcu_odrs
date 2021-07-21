<?php
    require_once "database.php";

    $search = $_GET['search'] ?? '';
    if($search) {
        $statement = $pdo->prepare('SELECT * FROM document_request WHERE request_status="pending" LIKE :title ORDER BY request_number ASC');
        $statement->bindValue(':title', "%$search%");
    } else {
        $statement = $pdo->prepare('SELECT * FROM document_request ORDER BY request_number ASC');
    }
    $statement->execute();
    $pending_request = $statement->fetch(PDO::FETCH_ASSOC);
?>

<table class="fixed-header">
    <thead>
        <tr class="bg-dark" style="color: white;">
            <th scope="col">Request Number</th>
            <th scope="col">Date Requested</th>
            <th scope="col">Student Number</th>
            <th scope="col">Document Requested</th>
            <th scope="col">Action</th>
        </tr>   
    </thead>
    <tbody>
        <?php
            foreach ($pending_request as $i => $request);
        ?>
        <tr>
            <th scope="row">
                <?php
                    echo $i + 1
                ?>
            </th>
            <td>
                <?php
                    echo $request['request_number'];
                ?>
            </td>
            <td>
                <?php
                    echo $request['request_date'];
                ?>
            </td>
            <td>
                <?php
                    echo $request['student_number'];
                ?>
            </td>
            <td>
                <?php
                    echo $request['request_number'];
                    echo 'ikaw na bahala dito sa part na ito? :) ';
                ?>
            </td>
            <td>
                <?php
                    echo $request['request_number'];
                    echo 'ikaw na bahala dito sa part na ito? :) ';
                ?>
            </td>
        </tr>
        <tr>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
        </tr>
        <tr>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
        </tr>
        <tr>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
        </tr>
        <tr>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
        </tr>
        <tr>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
        </tr>
        <tr>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
        </tr>
        <tr>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
        </tr>
        <tr>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
        </tr>
        <tr>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
            <td>asd</td>
        </tr>
    </tbody> 
</table>