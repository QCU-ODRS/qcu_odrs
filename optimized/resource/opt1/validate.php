<?php
$document_id = $_POST['document_id'];

if ($document_id === 'default') {
    $errors[] = 'Document Name is required';
}
if (!is_dir('../../resource/files')){
    mkdir('../../resource/files');
}
?>