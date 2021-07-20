<?php
$student_number = $_POST['student_number'];
$document_id = $_POST['document_id'];

if (!$student_number) {
    $errors[] = 'Student Number is required';
}
if ($document_id === 'default') {
    $errors[] = 'Document Name is required';
}
if (!is_dir('../../resource/files')){
    mkdir('../../resource/files');
}
?>