<?php
$student_number = $_POST['student_number'];
$acc_password = $_POST['acc_password'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$course = $_POST['course'];
$year_of_enrollment = $_POST['year_of_enrollment'];

if (!$student_number) {
    $errors[] = 'Student Number is required';
}
if (!$last_name) {
    $errors[] = 'Last Name is required';
}
if (!$first_name) {
    $errors[] = 'First Name is required';
}
if (!$middle_name) {
    $errors[] = 'Middle Name is required';
}
if ($course != 'default') {
    $errors[] = 'Course is required';
}
if (!$year_of_enrollment) {
    $errors[] = 'Year of Admission is required';
}
// if (!$password) {
//     $errors[] = 'Password is Required';
// }
// if ($acc_password != $confirm_pass) {
//     $errors[] = 'Passwords must match';
// }
?>