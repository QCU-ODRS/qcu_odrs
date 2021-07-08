<?php
$student_number = $_POST['student_number'];
$document_id = $_POST['document_id'];

if (!$student_number) {
    $errors[] = 'Student Number is required';
}
if ($document_id != 0) {
    $errors[] = 'Document Name is required';
}
?>