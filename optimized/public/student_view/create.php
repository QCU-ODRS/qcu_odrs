<?php
//Student Creates Requests with validation of 1
session_start();


//error array for blank fields validation
$errors = [];
//empty variable placeholders for empty fields
$student_number = $_SESSION['student_number'];
$document_id = '';
$purpose ='';
$details ='';
$upfile = '';
$upfile_name = '';
$request_date = '';
$request_status = '';

//SQL database connection
$conn = new mysqli('localhost','root', '', 'qcu_ords',3306);
$sql ="SELECT document_name, document_id FROM documents ORDER BY document_id DESC";

//fetching records from database
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)){
    $rows[] = $row;
}
//PDO database connection
require_once "../../resource/opt1/database.php";

//check if the information is posting
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

//make sure that the request method is 'post'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //empty variable placeholders for empty fields
  $document_id = $_POST['document_id'];
  $request_date = date('Y-m-d');
  $request_status = 'PENDING';
  //apply validate script
  require_once "../../resource/opt1/validate.php";

  $statement = $pdo->prepare("SELECT * FROM document_request WHERE student_number = :student_number AND document_id = :document_id AND request_status IN ('RESUBMIT','PENDING','PROCESSING','RELEASE')");
    //bind values to placeholders
  $statement->bindValue(':student_number', $student_number);
  $statement->bindValue(':document_id', $document_id);
  $records = $statement->fetchAll(PDO::FETCH_ASSOC);
  $count = $statement->rowCount();
  if($count > 0){
      if(empty($errors)){
      $upfiles = $_FILES['upfile'] ?? null;
      $file_dir = '';
      //check if the information is posting
      // echo '<pre>';
      // var_dump($_FILES);
      // echo '</pre>';
      //exit;
      if ($upfiles){
        $file_dir = '../../resource/files/'.random_string(8);
        // echo random_string(8);
        // exit;
        if (!is_dir($file_dir)){
          mkdir($file_dir);
        }
        $upfile = $file_dir;
        if (count($upfiles['name']) > 1){
          $name_arr = [];
          $tmp_arr = [];
          
          foreach($upfiles['name'] as $key => $up_file) {
            
            $name_arr[$key] = $up_file;
          }
          foreach ($upfiles['tmp_name'] as $key => $up_file){
            $tmp_arr[$key] = $up_file;
            //echo $up_file;
          }
          // foreach($tmp_arr as $name){
          //   echo $name;
          // }
          
          for($j = 0; $j < count($upfiles['name']); $j++){
            move_uploaded_file($tmp_arr[$j], $file_dir.'/'.$name_arr[$j]);
            $upfile_name .= $name_arr[$j]." ";
          }
          //echo $upfile;
          }
          else{
            $upfile_name = null;
          }
      }
      
      //prepare the query and the variable
      $statement = $pdo->prepare("INSERT INTO document_request (student_number, document_id, purpose, details, request_date, request_status, upfile, upfile_name) VALUES (:student_number, :document_id, :purpose, :details, :request_date, :request_status, :upfile, :upfile_name)");
      //bind values to placeholders
      $statement->bindValue(':student_number', $student_number);
      $statement->bindValue(':document_id', $document_id);
      $statement->bindValue(':purpose', $purpose);
      $statement->bindValue(':details', $details);
      $statement->bindValue(':request_date', $request_date);
      $statement->bindValue(':request_status', $request_status);
      $statement->bindValue(':upfile', $upfile);
      $statement->bindValue(':upfile_name', $upfile_name);
      $statement->execute();
      //go back to dashboard
      header('Location: pending_request.php');
    }
  }
  else{
    $errors[] = "A similar Document Request is still active";
  }

  
  
}

function random_string($n){
  $characters ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str = '';
  for($i = 0; $i < $n; $i++){
    $index = rand(0, strlen($characters) - 1);
    $str .= $characters[$index];
  }
  return $str;
}
//refer header
require_once "../../resource/opt1/header.php";


?>
<title>New Request</title>
  </head>
  <body>

<?php //refer navigation bar
require_once "../../resource/opt1/nav.php";
?>


<!-- contents -->
<h1>NEW REQUEST</h1>
<hr>
  <h4>Reminders:</h4>
  <p>Please select a document and attach files, if needed. Please attach image files and document files only. If want to request two (2) or more same documents with different details, please indicate in the "Details" field. Please indicate if you are RA11261 – “FIRST TIME JOBSEEKERS ASSISTANCE ACT” Beneficiary and attach Barangay Certification (First Time Jobseekers Act- RA 11261), and Oath of Undertaking</p>
  <hr>
  <h4>Requirements</h4>
  <table>
    <tr>
      <th>Document</th>
      <th>Requirement</th>
    </tr>
    <tr>
      <td><b>TOR / Diploma</b></td>
      <td>Year Graduated and complete address</td>
    </tr>
    <tr>
      <td><b>TOR (Under Graduate)</b></td>
      <td>Last Academic Year Attended and complete address</td>
    </tr>
    <tr>
      <td><b>Grade Slip</b></td>
      <td>Academic Year and Semester</td>
    </tr>
    <tr>
      <td><b>Other Certifications</b></td>
      <td>Office requesting the document (e.g., DSWD, CHED)</td>
    </tr>
    <tr>
      <td><b>Authentication / Certified True Copy</b></td>
      <td>Send a clear copy of the document and bring the Original Copy upon claiming</td>
    </tr>
  </table>
  <hr>
<!-- refer form -->
<?php include_once "../../resource/opt1/form.php"; ?>
<!-- document records (options) fetched from the database -->
        <?php foreach ($rows as $row):
         echo '<option value="'.$row['document_id'].'">'.$row['document_name'].'</option>';
        endforeach; ?> 
    </select>
    </div>
    <div class="form-group">
      <label>Purpose</label>
      <input type="text" class="form-control" name ="purpose" placeholder="Enter Purpose" value="<?php echo $purpose ?>">
    </div>
    <div class="form-group">
      <label>Details</label>
      <textarea class="form-control" name = "details" placeholder="Enter Details and Indications"><?php echo $details ?></textarea>
    </div>
    <label>File/s</label>
    <div>
    
    <input type="file" name="upfile[]" id="upfile" class="btn btn btn-outline-dark btn-sm" multiple="multiple">
    
    </div>
    
    <br />
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  
  </body>
</html>
