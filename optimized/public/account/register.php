<?php
    require_once "../../resource/opt/database.php";


    $errors = [];

    $student_number ='';
    $acc_password ='';
    $confirm_pass ='';
    $last_name ='';
    $first_name ='';
    $middle_name ='';
    $course ='';
    $year_of_enrollment ='';
    $date_created = date('Y-M-d');
    $check = [];
    

//make sure that the request method is 'post'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //apply validate script
    require_once "../../resource/register_form/validate.php";
    //check if the information is posting
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // exit;
    $student_number = $_POST['student_number'];
    $q = $pdo->prepare("SELECT * FROM accounts WHERE student_number = :student_number");
    $q->bindValue(':student_number', $student_number);
    $q->execute();
    $check = $q->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // var_dump($check);
    // echo '</pre>';
    // exit;
    if(empty($check)){
        // echo '<pre>';
        // var_dump($check);
        // echo '</pre>';
        // exit;
        $query = $pdo->prepare("SELECT * FROM student_info WHERE student_number = :student_number");
        $query->bindValue(':student_number', $student_number);
        $query->execute();
        $requests = $query->fetchAll(PDO::FETCH_ASSOC);
        $input = $_POST;
        $request = [];
        
        if(!empty($requests)){
            foreach($requests as $req){
            
        
        // echo '<pre>';
        // var_dump($request);
        // echo '</pre>';
        // exit;
                if($input['student_number'] == $req['student_number']){    
                    if($input['last_name'] == $req['last_name']){    
                        if(empty($errors)){
                            // echo '<pre>';
                            // var_dump($_POST);
                            // echo '</pre>';
                            // exit;
                            $date_created = $input['date_created'];
                            $hash = password_hash($acc_password, PASSWORD_DEFAULT);
                            //prepare the query and the variable
                            $statement = $pdo->prepare("INSERT INTO accounts (student_number, acc_pass, date_created) VALUES (:student_number, :acc_password, :date_created)");
                            //bind values to placeholders
                            $statement->bindValue(':student_number', $student_number);
                            $statement->bindValue(':acc_password', $hash);
                            $statement->bindValue(':date_created', $date_created);
                            $statement->execute();
                            //go back to dashboard
                            header('Location: login.php');
                        }
                    }
                    else
                    {
                    $errors[] = 'Records does not match';
                    }
                }
            }
        }
        else
        {
            $errors[] = 'Student record not found';
        }

    }
    else
    {
        $errors[] = 'Account already exists';
    }
    
}    


//make sure that there are no errors
    

    require_once "../../resource/opt/header.php";


?>
    <title>Register</title>
  </head>
  <body>
<h1>REGISTER ACCOUNT</h1>

<?php
    include "../../resource/register_form/form.php";
?>
<br />
</body>
</html>