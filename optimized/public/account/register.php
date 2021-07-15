<?php
    require_once "../../resource/opt/database.php";


    $errors[] ='';

    $student_number ='';
    $acc_password ='';
    $confirm_pass ='';
    $last_name ='';
    $first_name ='';
    $middle_name ='';
    $course ='';
    $year_of_enrollment ='';
    $date_created = date('Y-M-d');

//check if the information is posting
echo '<pre>';
var_dump($_POST);
echo '</pre>';

//make sure that the request method is 'post'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //apply validate script
  require_once "../../resource/register_form/validate.php";
//make sure that there are no errors
    if(empty($errors)){
//prepare the query and the variable
    $statement = $pdo->prepare("INSERT INTO student info (student_number, last_name, first_name, middle_name, course, year_of_enrollment, date_created, acc_password, confirm_pass) VALUES (:student_number, :acc_password, :last_name, :first_name, :middle_name, :course, :year_e, :date_c, :acc_password, :confirm_pass)");
//bind values to placeholders
$statement->bindValue(':student_number', $student_number);
$statement->bindValue(':acc_password', $acc_password);
$statement->bindValue(':confirm_pass', $confirm_pass);
$statement->bindValue(':last_name', $last_name);
$statement->bindValue(':first_name', $first_name);
$statement->bindValue(':middle_name', $middle_name);
$statement->bindValue(':course', $course);
$statement->bindValue(':year_e', $year_of_enrollment);
$statement->bindValue(':date_c', $date_created);


$statement->execute();
//go back to dashboard
header('Location: login.php');
    }
}

    require_once "../../resource/opt/header.php";


?>
<h1>REGISTER ACCOUNT</h1>
<?php
    include "../../resource/register_form/form.php";
?>
<br />
</body>
</html>