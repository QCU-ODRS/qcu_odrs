<?php
    require_once "database.php";

    $search = $_GET['search'] ?? '';
    if($search) {
        $statement = $pdo->prepare('SELECT * FROM documents_request');
    }
?>

<table class="fixed-header">
    <thead>
        <tr class="bg-dark" style="color: white;">
            <th>Request Number</th>
            <th>Date Requested</th>
            <th>Requester's Name</th>
            <th>Document Requested</th>
            <th>File Viewer</th>
            <th>Action</th>
        </tr>   
    </thead>
    <tbody>
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