<?php
$document_id = $_POST['document_id'];
$purpose = $_POST['purpose'];

if ($document_id === 'default') {
    $errors[] = 'Document Name is required';
}
if (!$purpose) {
    $errors[] = 'Purpose is required';
}
if (!is_dir('../../resource/files')){
    mkdir('../../resource/files');
}
?>