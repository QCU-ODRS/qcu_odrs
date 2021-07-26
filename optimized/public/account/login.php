<?php
    session_start();  
    $host = "localhost";  
    $username = "root";  
    $password = "xd4BgGSjYH3aws";  
    $database = "qcu_ords";  
    $message = "";  
    $status = 'student';

    $errors = [];
    try  
    {  
         $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password); 
         $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            // echo '<pre>';
            // var_dump($_GET);
            // echo '</pre>';
            // exit;
         if(isset($_POST["login"]))  
         {  
            // echo '<pre>';
            // var_dump($_GET);
            // echo '</pre>';
            // exit;
              if(empty($_POST["student_number"]) || empty($_POST["acc_pass"]))  
              {  
                   echo $message = '<label>All fields are required</label>';  
              }  
              else  
              {  
                    if($_POST['student_number'] == 'admin'){
                        $status = 'not_student';
                    }
                    
                   $query = "SELECT accounts.student_number, accounts.acc_pass, student_info.full_name FROM accounts JOIN student_info ON accounts.student_number = student_info.student_number WHERE accounts.student_number = :student_number";
                   $statement = $connect->prepare($query);
                   $statement->bindValue(':student_number',$_POST['student_number']);
                   $statement->execute();
                   $logs = $statement->fetchAll(PDO::FETCH_ASSOC);
                   $count = $statement->rowCount(); 
                   foreach($logs as $log){
                            // echo '<pre>';
                            // var_dump($log);
                            // echo '</pre>';
                            // exit;
                        if($count > 0)  
                        {       
                            if(password_verify($_POST['acc_pass'], $log['acc_pass'])){
                                $_SESSION['login'] === true;
                                $_SESSION["student_number"] = $_POST["student_number"];
                                $_SESSION['user'] = $log['full_name'];
                                if($status == 'student'){
                                    header("location:../student_view/student_dashboard.php");
                                    die();
                                }
                                elseif($status == 'not_student'){
                                    header("location:../registrar_view/dashboard.php");
                                    die();
                                }
                            }
                            
                        }
                        else  
                        {  
                                $errors[] = 'Invalid Student Number or Password';  
                        }
                    } 
              }
         }
         else{
             //echo 'no trigger';
         }  
    }  
    catch(PDOException $error)  
    {  
        $errors[] = $error->getMessage();  
    }  

    require_once "../../resource/opt1/header.php";
    ?>  
     <title>QCU ODRS</title>
  </head>
<body>
<div class = "bg"></div>
    
<!-- <h1 style="position: absolute; top: 275px; left: 750px;">LOGIN</h1> -->
<?php
    require_once "../../resource/login/form.php";

?>
</body>
</html>