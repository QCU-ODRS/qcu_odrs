<?php
$title = $_POST['title'];
$requirements = $_POST['requirements'];



if (!$title) {
    $errors[] = 'Title is required';
}
if (!$requirements) {
    $errors[] = 'Requirement is required';
}
?>