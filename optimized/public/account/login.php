<?php
    session_start();  
    $host = "localhost";  
    $username = "root";  
    $password = "";  
    $database = "qcu_ords";  
    $message = "";  
    $status = 'student';

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
                   $query = "SELECT * FROM accounts WHERE student_number = :student_number AND acc_pass = :acc_pass";  
                   $statement = $connect->prepare($query);
                   $statement->bindValue(':student_number',$_POST['student_number']);
                   $statement->bindValue(':acc_pass',$_POST['acc_pass']);
                   $statement->execute();
                //    $log = $statement->fetchAll(PDO::FETCH_ASSOC); 
                   $count = $statement->rowCount(); 
                    // echo '<pre>';
                    // var_dump($log);
                    // echo '</pre>';
                    // exit;
                   if($count > 0)  
                   {  
                        $_SESSION['login'] === true;
                        $_SESSION["student_number"] = $_POST["student_number"];
                        if($status == 'student'){
                            header("location:../student_view/student_dashboard.php");
                            die();
                        }
                        elseif($status == 'not_student'){
                            header("location:../registrar_view/dashboard.php");
                            die();
                        }
                        
                   }  
                   else  
                   {  
                        echo $message = '<label>Wrong Data</label>';  
                   }  
              }
         }
         else{
             echo 'no trigger';
         }  
    }  
    catch(PDOException $error)  
    {  
        echo $message = $error->getMessage();  
    }  

    require_once "../../resource/opt1/header.php";
    ?>  
 
    
    
<h1>LOGIN</h1>
<?php
    require_once "../../resource/login/form.php";

?>